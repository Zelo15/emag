<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tinderstart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <nav id="navbar-example2" class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">Tinder</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="render('home.php')">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="render('regilogin.php')">Register or Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="render('newGirl.php')">Add new girl</a>
    </li>   
</nav>
