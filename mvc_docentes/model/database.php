<?php
class Database{
    public static function StartUp(){
        $pdo = new PDO('mysql:host=localhost; dbname=labo_mvc; charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>