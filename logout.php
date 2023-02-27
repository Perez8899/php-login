<?php
  session_start();//se inicia sesion

  session_unset();//eliminar o quitar la sesion

  session_destroy();//destruir

  header('Location: /php-login');
?>
