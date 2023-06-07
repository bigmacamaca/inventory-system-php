<?php
require 'config.php';

if(isset($_POST["method"])){
    echo nl2br ("function accessed!");
  if($_POST["method"] == "ADD"){
    echo nl2br ("ADD accessed!");
    insert();
  }
  else if($_POST["method"] == "EDIT"){
    echo nl2br ("EDIT accessed!");
    edit();
  }
  else if($_POST["method"] == "DEL"){
    echo nl2br ("DEL accessed!");
    delete();
  }
}

function insert(){
    global $conn;

    $name = $_POST["name"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $expiryDate = $_POST["expiryDate"];
    $cost = $price * $stock;

    $image = $_FILES["picture"]["name"];
    $tempname = $_FILES["picture"]["tmp_name"];
    $folder = "./image/" . $image;

    $query = "INSERT INTO product (`name`,`unit`,`price`,`expiry_date`,`stock`,`cost`,`image`) VALUES('$name', '$unit', '$price', '$expiryDate', '$stock', '$cost', '$image')";
    mysqli_query($conn, $query);

    if (move_uploaded_file($tempname, $folder)) {
        echo "image upload success!";
    }
    else {
        echo "image upload failed!";
    }

    echo 'Product Added!';
}

function edit(){
    global $conn;

    $id = $_POST["id"];
    $name = $_POST["name"];
    $unit = $_POST["unit"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $expiryDate = $_POST["expiryDate"];
    $cost = $price * $stock;

    $image1 = $_POST["picture"];

    //Check if there was an image upload
    if ($image1 == "" || NULL) {
        $image = $_FILES["picture"]["name"];
        $tempname = $_FILES["picture"]["tmp_name"];
        $folder = "./image/" . $image;
    
        $query = "UPDATE `product` SET `name` = '$name', `unit` = '$unit', `price` = '$price', `stock` = '$stock', `expiry_date` = '$expiryDate', `cost` = '$cost', `image` = '$image' WHERE `id` = '$id'";
        mysqli_query($conn, $query);
    
        if (move_uploaded_file($tempname, $folder)) {
            echo "image replace success!";
        }
        else {
            echo "image replace failed!";
        }
        
        echo "Product Updated!";
    }
    else {

        $query = "UPDATE `product` SET `name` = '$name', `unit` = '$unit', `price` = '$price', `stock` = '$stock', `expiry_date` = '$expiryDate', `cost` = '$cost' WHERE `id` = '$id'";
        mysqli_query($conn, $query);

        echo "Product Updated! No changes to image";
    }

}

function delete(){
    global $conn;

    $id = $_POST["idval"];

    $query = "DELETE FROM product WHERE id = $id";
    mysqli_query($conn, $query);
    echo "Product Deleted!";
}
?>