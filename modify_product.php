<!DOCTYPE html>
<html>
    <head>
        <title>Modify Product</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/flatly/bootstrap.min.css" rel="stylesheet"></link>
    </head>
    
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

        <div class='container'>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form id="modifyProductForm" method="POST" novalidate style="border: 1px solid #ccc; padding: 20px; border-radius: 10px; margin-top: 50px;" enctype="multipart/form-data">
                        <?php
                            require 'config.php';
                            $id = $_GET["id"];
                            $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product WHERE id = $id"));
                        ?>
                        <input type="hidden" id="id" value="<?php echo $data['id']; ?>">
                        <h3 class="text-center mb-4">Modify Product</h3>
                        <div class="mb-3">
                            <label for="InputName" class="form-label">Name: </label>
                            <input class="form-control" id="name" type="text" name="name" value="<?php echo $data['name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="InputDescription" class="form-label">Unit: </label>
                            <input class="form-control" id="unit" type="text" name="unit" value="<?php echo $data['unit']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="PreviewCoverImage" class="form-label">Current Product Image Preview: </label>
                            <img src="./image/<?php echo $data['image']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                        </div>
                        <div class="mb-3">
                            <label for="InputCoverImage" class="form-label">Product Image: </label>
                            <input class="form-control" id="picture" type="file" name="picture">
                        </div>
                        <div class="mb-3">
                            <label for="InputPrice" class="form-label">Price: </label>
                            <input class="form-control" id="price" type="number" step=any name="price" value="<?php echo $data['price']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="InputPrice" class="form-label">Stock: </label>
                            <input class="form-control" id="stock" type="number" step=any name="stock" value="<?php echo $data['stock']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="InputQuantity" class="form-label">Expiry Date: </label>
                            <input class="form-control" id="expiryDate" type="date" step=any name="expiryDate" value="<?php echo $data['expiry_date']; ?>">

                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary mr-2">
                        <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <script>
        $(document).ready(function() {
            $('#modifyProductForm').submit(function (event){
                event.preventDefault();

                var picture = $("#picture").val();

                formData = new FormData();

                formData.append('id', $('#id').val());
                formData.append('name', $('#name').val());
                formData.append('unit', $('#unit').val());
                formData.append('price', $('#price').val());
                formData.append('stock', $('#stock').val());
                formData.append('expiryDate', $('#expiryDate').val());
                formData.append('method', "EDIT");
                
                formData.append('picture', $('#picture')[0].files[0]);

                if (picture) {
                    formData.append('picture', $('#picture')[0].files[0]);
                }       

                if (formData) {
                        $.ajax({
                            type: 'POST',

                            url: "functions.php",
                            
                            data: formData,
                            
                            processData: false,
                            contentType: false,
                            
                            success: function(data) {
                                alert("Product Modified");
                                console.log("Successful");
                                console.log(data);

                            },
                            error: function() {
                                console.log("something wrong modify product");
                            }
                    });
                }
            });
        });


    </script>
</html>