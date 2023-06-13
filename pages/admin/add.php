<?php
    require_once 'conn.php';

    $image = $_POST['image'];
    $title = $_POST['title'];
    $info = $_POST['info'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (image, title, info, price)
    VALUES ('$image', '$title', '$info', '$price')";
    $conn->exec($sql);
    
    header("location: producten.php")
?>