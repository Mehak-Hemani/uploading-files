<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>FILE UPLOADING</title>
</head>

<body>
    <main>
        <div class="container mt-5">
            <h2>Add Product</h2>
            <?php
            require_once "connection/connection.php";

            $id = $_GET["id"];
            echo $id;
            $sql="SELECT * FROM products WHERE id=$id";
            $result = mysqli_query($connection,$sql );
            if($result){
            if (mysqli_num_rows($result)==1) {
                $fetch = mysqli_fetch_assoc($result);
                $title = $fetch['product_name'];
                $price = $fetch['product_price'];
                $quantity = $fetch['product_quantity'];
                $image = $fetch['product_image'];
            ?>

                <form action="update-product.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" class="form-control" id="productName" placeholder="Enter product name" name="product_title" value="<?= $id ?>">
                    <div class="mb-3">
                        <label for="productName" class="form-label" style="font-weight: 700;">Product Name</label>
                        <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="product_title" value="<?= $title ?>">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label" style="font-weight: 700;">Price</label>
                        <input type="number" class="form-control" id="price" placeholder="Enter price" name="product_price" value="<?= $price ?>">

                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label" style="font-weight: 700;">Quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" name="product_quantity" value="<? $quanitity ?>">
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label" style="font-weight: 700;">Category</label>
                        <select class="form-select" id="category" name="product_category">
                            <option selected>Select a category</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="accessories">Accessories</option>
                            <option value="home">Home</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label" style="font-weight: 700;">Choose Image</label>
                        <input type="file" class="form-control" id="image" name="product_image" value="<? $image ?>">
                        <img src="uploads/<?= $image ?>" width="100" alt="">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
        </div>

    <?php
            }else{
                echo"NO PRODUCT";
            }
            } else {
                echo mysqli_error($connection);
            }
    ?>
    </main>
</body>

</html>