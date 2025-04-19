<?php

class App {
    private Database $__db;
    private Route $__routes;
    private array $__params = [];
    private string $__action = 'index';
    private mixed $__controller = '';
    static public App $app;

    public function __construct() {
        global $routes, $config;
        self::$app = $this;

        $this->__routes = new Route();

        $this->__controller = !empty($routes['default_controller'])
            ? $routes['default_controller']
            : 'Home';

        if (class_exists('DB')) {
            $dbObject = new DB();
            $this->__db = $dbObject->db;
        }

        $this->handleUrl();
    }

    public function getUrl(): string {
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

        if ($scriptName !== '/') {
            $url = str_replace($scriptName, '', $url);
        }

        return rtrim($url, '/');
    }

    public function handleUrl(): void {
        $url = $this->__routes->handleRoute($this->getUrl());
        $urlArr = array_values(array_filter(explode('/', $url)));
        $urlCheck = '';

        if (!empty($urlArr)) {
            foreach ($urlArr as $key => $item) {
                $urlCheck .= $item . '/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr) - 1] = ucfirst(end($fileArr));
                $fileCheck = implode('/', $fileArr);

                if (!empty($urlArr[$key - 1])) {
                    unset($urlArr[$key - 1]);
                }

                $controllerPath = "app/controllers/$fileCheck.php";
                if (file_exists($controllerPath)) {
                    $urlCheck = $fileCheck;
                    break;
                }
            }

            $urlArr = array_values($urlArr);
        }

        // Set controller name
        $this->__controller = !empty($urlArr[0])
            ? ucfirst($urlArr[0])
            : ucfirst($this->__controller);

        if (empty($urlCheck)) {
            $urlCheck = $this->__controller;
        }

        $controllerFilePath = "app/controllers/$urlCheck.php";
        if (file_exists($controllerFilePath)) {
            require_once $controllerFilePath;

            if (class_exists($this->__controller)) {
                unset($urlArr[0]);

                $this->__controller = !empty($this->__db)
                    ? new $this->__controller($this->__db)
                    : new $this->__controller();
            } else {
                $this->loadError();
                return;
            }
        } else {
            $this->loadError();
            return;
        }

        // Set action
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        // Set params
        $this->__params = array_values($urlArr);

        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadError();
        }
    }

    public function loadError(string $name = '404', array $data = []): void {
        extract($data);
        // require_once "errors/$name.php";
    }
}
