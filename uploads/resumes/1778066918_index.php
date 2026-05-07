<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product Page By Mart</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
    font-family: 'Segoe UI', sans-serif;
}

/* Card Design */
.card-box {
    background: #fff;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* Title */
.title {
    text-align: center;
    font-weight: 600;
    margin-bottom: 20px;
    color: #333;
}

/* Button */
.btn-upload {
    background: linear-gradient(135deg, #ff416c, #ff4b2b);
    border: none;
    font-size: 18px;
    font-weight: 600;
    padding: 12px;
    border-radius: 10px;
    color: #fff;
    transition: 0.3s;
}

.btn-upload:hover {
    opacity: 0.9;
}

/* Table */
.table-box {
    background: #fff;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.table img {
    border-radius: 8px;
    object-fit: cover;
}

/* Spacing */
.section-space {
    margin-top: 40px;
}
</style>

</head>

<body>

<div class="container">

    <!-- FORM -->
    <div class="row justify-content-center section-space">
        <div class="col-md-6">
            <div class="card-box">

                <h3 class="title">Product Details</h3>

                <form action="insert.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="Pname" class="form-control" placeholder="Enter Product Name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="text" name="Pprice" class="form-control" placeholder="Enter Product Price">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Images</label>
                        <input type="file" name="Pimage" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Select Category</label>
                        <select class="form-select" name="Pcategory">
                            <option value="Home">Home</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Bag">Bag</option>
                            <option value="Mobile">Mobile</option>
                        </select>
                    </div>

                    <button name="submit" class="btn-upload w-100">
                        Upload
                    </button>

                </form>

            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="row justify-content-center section-space">
        <div class="col-md-10">
            <div class="table-box">

                <table class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Images</th>
                            <th>Category</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
<?php
require '../../config/Config.php';

if(isset($con)) {
    $Record = mysqli_query($con, "SELECT * FROM `tblproduct`");
} else {
    die("Database connection failed!");
}

while($row = mysqli_fetch_array($Record)) {

    echo "
    <tr>
        <td>{$row['id']}</td>
        <td>{$row['PName']}</td>
        <td>{$row['PPrice']}</td>
        <td><img src='{$row['PImage']}' width='80' height='80'></td>
        <td>{$row['PCategory']}</td>
        <td></td>
    </tr>
    ";
}
?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

</body>
</html>