<?php
require "connection.php";

try {
    if($_POST['userName'] !== "" && isset($_FILES['fileImg'])){
        $userName = $_POST['userName'];
        $imgFile = $_FILES['fileImg'];
        
        $folderPath = "images/";

        move_uploaded_file($imgFile['tmp_name'],$folderPath.$imgFile['name']);
        $imgPath = $folderPath.$imgFile['name'];

        $sql = $connection -> prepare("INSERT INTO fileupload (img,name) values ('$imgPath','$userName')");
        $sql -> execute();
    }
}catch (PDOException $e){
    die("insert error".$e->getMessage());
}

    $getAllImgs = $connection -> prepare("SELECT * FROM fileupload");
    $getAllImgs -> execute();
    $getImages = $getAllImgs -> fetchAll();

    require "img.html";
