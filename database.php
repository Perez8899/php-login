<?php

  define('user', 'root');
  define('password', '');
  define('host', 'localhost');
  define('database', 'php_login_database');


try {
  $conn = new PDO("mysql:host=".host.";dbname=".database, user, password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
