<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabriel_MidtermReq</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Y6yymIvR6vZYq1cIwJphfXnYrr3IMBkEOm5mzVa8SeFez3B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
    $(function(){
        $("#myTable").DataTable();
    });
    </script>
</head>

<style>
     h1 {
            text-align: center;
            font-family: Arial, sans-serif; 
            color: #856d0f; 
     }
        .container {
            padding: 20px;
            border-radius: 10px;
            font-family: Arial, sans-serif; 
            color: #856d0f;
        }

        .table {
            width: 100%;
            
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table th {
            background-color: #d6b73c;
            color: #ffffff;
        }
    </style>

<body>
<div class="mb-10">
<div class=" container bg-warning-subtle" style = "margin-top: 20px;">
<h1 class="pt-4 mb-2 ">Contact</h1>
<form action="add.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="picture" class="form-label">Image</label>
                <input type="file" class="form-control" id="pic" name="pic" accept="image/jpeg, image/jpg, image/png" required>
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" pattern="[A-Za-z]+" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" pattern="[A-Za-z]+" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sex</label><br>
                <input type="radio" id="male" name="sex" value="Male" required>
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="sex" value="Female">
                <label for="female">Female</label><br>
                <input type="radio" id="other" name="sex" value="Other">
                <label for="other">Other</label><br>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="mobileNum" name="mobileNum" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
    </div>
    <div class="text-center mb-5">
        <button type="submit" class="btn btn-warning w-50" style="margin-top:20px;" name="add">Enter</button>
    </div>
</form>

</div>
    </div>
<div class="container mt-4  bg-warning-subtle">
    <h1 class="mb-4">Contact List</h1>
    <table id="myTable" class="table table-striped table-bordered" style="margin-top:20px;">
        <thead>
            <tr>
                <th>CONTACT ID</th>
                <th>FIRSTNAME</th>
                <th>LASTNAME</th>
                <th>ADDRESS</th>
                <th>SEX</th>
                <th>MOBILE NUMBER</th>
                <th>EMAIL ADDRESS</th>
                <th>PICTURE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'config.php';
            $stmt = "SELECT * FROM contactOrg";
            $container = $conn->query($stmt);
            while ($data = $container->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $data['userID'] ?></td>
                    <td><?php echo $data['firstName'] ?></td>
                    <td><?php echo $data['lastName'] ?></td>
                    <td><?php echo $data['address'] ?></td>
                    <td><?php echo $data['sex'] ?></td>
                    <td><?php echo $data['mobileNum'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td>
                        <img src="../Gabriel_MidtermReq/images/<?php echo $data['image']; ?>" height="100px" alt="Picture">
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['userID']; ?>" class="btn btn-warning  btn-m">Edit</a>
                        <a href="delete.php?id=<?php echo $data['userID']; ?>" class="btn btn-warning btn-m" style="margin-top:20px;">Delete</a>
                    </td>
                </tr>
            <?php
            }
            $container->free_result();
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $("#myTable").DataTable();
    });

    document.addEventListener("DOMContentLoaded", function () {
        const imageInput = document.getElementById("image");
        const roundDiv = document.getElementById("round");

        imageInput.addEventListener("change", function () {
            const file = imageInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.style.maxWidth = "100px";
                    img.style.maxHeight = "100px";
                    roundDiv.innerHTML = "";
                    roundDiv.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    });


</script>
</body>
</html>