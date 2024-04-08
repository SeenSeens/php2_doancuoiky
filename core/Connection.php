<?php
class Connection {
    private static $instance = null;
    private $connection;
    public function __construct( $config ) {
        echo $config['pass'];
        try {
            $this->connection = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['db'], $config['user'], $config['pass']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $mess = $e->getMessage();
            App::$app->loadError( 'database', [ 'message' => $mess ] );
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