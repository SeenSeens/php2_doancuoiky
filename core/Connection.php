<?php
class Connection {
    private static $instance = null;
    private $connection;
    public function __construct( $config ) {
        try {
            $host = $config['host'] ?? 'localhost';
            $db = $config['db'] ?? '';
            $user = $config['user'] ?? 'root';
            $pass = $config['pass'] ?? '';
            $this->connection = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $mess = $e->getMessage();
            //App::$app->loadError( 'database', [ 'message' => $mess ] );
            // Kiểm tra nếu `App::$app` đã tồn tại
            if (class_exists('App') && property_exists('App', 'app') && App::$app) {
                App::$app->loadError('database', ['message' => $message]);
            }
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance( $config ) {
        if (!self::$instance) {
            $connection = new Connection( $config );
            self::$instance = $connection->getConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    // Method to close the PDO connection to the database
    public function closeConnection() {
        $this->connection = null;
    }

}

?>