<?php
class Database {
    private $__conn;
    protected $db;
    use QueryBuilder;
    // Kết nối database
    public function __construct() {
        global $db_config;
        $this->__conn = Connection::getInstance( $db_config );
    }

    public function insertData( $table, $data ) {
        if ( !empty($data) ) {
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fieldStr .= $key . ',';
                $valueStr .= "'" . $value . "',";
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table( $fieldStr ) VALUES ( $valueStr )";

            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
        return false;
    }

    public function updateData( $table, $data, $condition = '' ) {
        if (!empty($data)) {
            $updateStr = '';
            foreach ($data as $key=>$value) {
                $updateStr .= "$key = '$value' ,";
            }

            $updateStr = rtrim( $updateStr, ',');
            if ( !empty($condition) ) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            }else{
                $sql = "UPDATE $table SET $updateStr";
            }

            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
        return false;
    }

    public function deleteData($table, $condition = '') {
        if ( !empty($condition) ) {
            $sql = "DELETE FROM $table WHERE $condition";
        } else {
            $sql = "DELETE FROM $table ";
        }
        $status = $this->query($sql);
        if ($status) {
            return true;
        }
        return false;
    }


    // Hàm truy vấn câu lệnh SQL
    public function query( $sql ) {
        try {
            if ($this->__conn === null) {
                throw new Exception('Database connection is null.');
            }

            $statement = $this->__conn->prepare($sql);
            $statement->execute();
            return $statement;
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            $data['message'] = $mess;
            App::$app->loadError( 'database', $data );
            die($mess);
        }
    }

    // Trả về id mới nhất sau khi đã insert
    function lastInsertId() {
        return $this->__conn->lastInsertId();
    }
}