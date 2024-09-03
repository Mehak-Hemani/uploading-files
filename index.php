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
        <main style="padding:2rem 0;">
            <div class="container">

                <div class="add-product">
                    <a href="add-product.php" class="btn btn-dark my-4" style="color: white;">
                        Add Products
                    </a>

                </div>
            </div>
            <div class="container d-flex justify-content-center" style="gap: 2rem;">

                <?php

                require_once "connection/connection.php";

                $result = mysqli_query($connection, "SELECT * FROM products");

                if (mysqli_num_rows($result) > 0) {
                    $allproducts = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    // echo $allproducts;

                    foreach ($allproducts as $product) {
                        echo ' <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="uploads/' . $product['image'] . '" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Product Title: ' . $product['product_name'] . '</h5>
                        <!-- <p class="card-text">Product Quantity:</p>
                        <p class="card-text">Product Price:</p> -->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="font-weight: 700;">Product Quantity: ' . $product['quantity'] . '</li>
                        <li class="list-group-item" style="font-weight: 700;">Product Price: ' . $product['price'] . '</li>
                    </ul>
                    <div class="card-body">
                        <a href="edit.php?=' . $product["id"] . '" class="card-link btn btn-primary my-4">Edit</a>
                        <a href="delete.php?id=' . $product["id"] . '" class="card-link btn btn-danger my-4">Delete</a>
                    </div> 
                </div>';
                    }
                } else {
                    echo 'error';
                }

                ?>

            </div>
        </main>
    </body>

    </html>