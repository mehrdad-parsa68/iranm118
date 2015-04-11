<?php
session_start();
  $_SESSION['MM_ID']=NULL;
  unset($_SESSION['MM_ID']);
  header("Location: index.php");
?>