<?php
  include 'database/Database.php';
  // include 'classes/Customer.php';

  spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
  });

  $db = new Database();
  $crd = new Crud();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD in PHP</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <div class="main_wrapper clear">
        <div class="wrapper clear">
            <div class="box clear">
              <div class="topbar clear">
                <h2>CRUD using OOP PHP</h2>
              </div>
