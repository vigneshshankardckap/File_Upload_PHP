<?php

try{
   $connection = new PDO("mysql:host=localhost;dbname=fileHandling","admin","welcome");
}
catch (PDOException $e){
    die("connection error".$e->getMessage());
}