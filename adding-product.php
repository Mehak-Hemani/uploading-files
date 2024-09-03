<?php
// require_once("connection/connection.php");

require_once "connection/connection.php";

echo "<pre>";

print_r($_POST);

print_r($_FILES);

if(empty($_POST['product_title'])){
    $errormessage = "Product Title Is Requried";
    header("Location: add-product.php?product_title&error=$errormessage");
    exit();
}
elseif(empty($_POST['product_price'])){
    $errormessage = "Product Price Is Requried";
    header("Location: add-product.php?product_price&error=$errormessage");
    exit();
}
elseif(empty($_POST['product_quantity'])){
    $errormessage = "Product Quantity Is Requried";
    header("Location: add-product.php?product_quantity&error=$errormessage");
    exit();
}
elseif(empty($_POST['product_category'])){
    $errormessage = "Product Category Is Requried";
    header("Location: add-product.php?product_category&error=$errormessage");
    exit();
}

$title = $_POST["product_title"];
$price = $_POST ["product_price"];
$quantity = $_POST['product_quantity'];
$Category = $_POST['product_Category'];

$image_name = $_FILES["product_image"]['name'];
$image_type = $_FILES["product_image"]['type'];
$image_tmp_name = $_FILES["product_image"]['tmp_name'];

// echo $image_type;

// echo "<br>";

$image_ext = explode("/", $image_type)[1];

// echo $image_ext ;

$accept_img_type = ["png", "jpg", "Jpeg", "svg", "gif"];

if(!in_array($image_ext, $accept_img_type)){
    $errormassage = "Select png, jpg, jpeg, svg, and gif only";
    header("Location: add-product.php?image&error=$errormassage");
    exit();
};

$image_name= "img_".uniqid().".".$image_ext;

if(move_uploaded_file($image_tmp_name,"uploads/".$image_name)){
    $sql="INSERT INTO products (product_name, price, quantity, image, category) VALUE ('$title', $price, $quantity, '$image_name', '$Category')";

    if(mysqli_query($connection, $sql)){
        
        header("Location: index.php");

    }else{
        mysqli_error($connection);
    }
}else{
    echo "Error in uploading";
}
