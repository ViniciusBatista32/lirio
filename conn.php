<?php
class Conexao{

  private static $instance;

  public static function getConn(){
    if(!isset(self::$instance)){
      self::$instance = new \PDO('mysql:host=127.0.0.1:3306;dbnme=lirio;charset=utf8','root','');
    }
    return self::$instance;
  }
}
