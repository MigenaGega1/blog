

<?php
session_start();

if(!isset($_SESSION['authuser_id'])){
  $_SESSION['msg']="You must log in first";

  header('Location: http://localhost:3000/login_form.php');
  exit;
}

class Config {
  private static $connection = null;
  public static function getConnection() {
      if (!self::$connection) {
          self::$connection =  mysqli_connect('localhost', 'root', '', 'registertask');
      }

      return self::$connection;
  }

  private static $authUser = null;
  public static function getAuthUser() {
      if (!self::$authUser) {
          $authUserId = $_SESSION['authuser_id'];
          $query = "select * from users where id = '$authUserId'";
          $result = mysqli_query(self::getConnection(), $query);

          if (!$result) {
            session_destroy();
            header('Location: http://localhost:3000/login_form.php');
            exit;
          }
    
          self::$authUser = mysqli_fetch_array($result);
      }
      return self::$authUser;
  }
 
  
}
?>