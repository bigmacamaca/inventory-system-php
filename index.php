<!DOCTYPE html>
<html>
    <head>
        <title>Product Inventory System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/flatly/bootstrap.min.css" rel="stylesheet"></link>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>

    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ccc;
        }
        
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        
        .card-text {
            font-size: 1rem;
            line-height: 1.5;
            color: #555;
            margin-bottom: 1rem;
        }
    </style>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #54BAB9;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://cdn-icons-png.flaticon.com/512/5759/5759267.png" width="30" height="30">
                    Product Inventory System
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="add_product.php">Add Product</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br>
        <!-- Product Display -->
        <div class="container">
            <div class="row row-cols-md-3 g-4">
                <?php
                require 'config.php';
                $data = mysqli_query($conn, "SELECT *, DATE_FORMAT(expiry_date, '%M %e, %Y') AS expiry_date FROM product;");
                ?>
                <?php foreach ($data as $data1) : ?>
                    <div class='col-md-3'>
                        <div class='card h-100'>
                            <img src="./image/<?php echo $data1['image']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class='card-body flex-grow-1'>
                                <h5 class='card-title text-truncate'><?php echo $data1['name']; ?></h5>
                                    <p class='card-text'>Unit: <?php echo $data1['unit']; ?></p>
                                    <p class='card-text'>Price: ₱<?php echo $data1['price']; ?></p>
                                    <p class='card-text'>Stock: <?php echo $data1['stock']; ?></p>
                                    <p class='card-text'>Cost: ₱<?php echo $data1['cost']; ?></p>
                                    <p class='card-text'>Expiry Date: <?php echo $data1['expiry_date']; ?></p>
                                    <a class='btn btn-primary mt-auto' href="modify_product.php?id=<?php echo $data1['id']; ?>" role='button'>Edit</a>
                                    <a class='btn btn-danger mt-auto' onclick="deleteProduct(<?php echo $data1['id']; ?>)" role='button'>Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
    <script>

        function deleteProduct(id) {
            console.log("delete function called!");
            event.preventDefault();
                var method = "DEL";
                var idVal = id;
                console.log(method);
                $.ajax({
                    type: 'POST',

                    url: "functions.php",

                    data: {method:method, idval: id},
                    
                    success: function(data) {
                        console.log(data);
                        alert("Product Deleted!");

                    },
                    error: function() {
                        console.log("Error: Product not Deleted");
                    }
            });
        };

    </script>
</html>