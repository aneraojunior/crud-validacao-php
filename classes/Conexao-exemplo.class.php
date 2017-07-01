<?php
abstract class Conexao
{
    private static $conn;

    private function setConn()
    {
        return
            is_null(self::$conn) ?
                self::$conn=new PDO('mysql:host=localhost;dbname=table_name', 'user', 'password') :
                self::$conn;
    }

    public function getConn()
    {
        return $this->setConn();
    }
}