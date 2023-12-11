<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Y6yymIvR6vZYq1cIwJphfXnYrr3IMBkEOm5mzVa8SeFez3B" crossorigin="anonymous">
</head>

<style>
    body {
        background-color: #f5f5f5;
    }

    .container {
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    h1 {
        font-family: Arial, sans-serif; 
            color: #856d0f; 
     }
        .container {
            padding: 20px;
            border-radius: 10px;
            font-family: Arial, sans-serif; 
            color: #856d0f;
        }
    .form-label {
        font-weight: bold;
    }

    .center {
        text-align: center;
    }

    .form-check-label {
        font-weight: normal;
    }

    .btn-update {
        margin-bottom: 20px;
    }
</style>

<body>
    <?php
    require 'config.php';
    $id = 0;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header("Refresh:2;url=index.php");
    }

    $sql = "SELECT * FROM contactOrg WHERE userID=$id";
    $container = $conn->query($sql);

    if ($container->num_rows > 0) {
        $data = $container->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }
    ?>

    <div class="container bg-warning-subtle">
        <h1 class="center">Edit Contact</h1>
        <form action="edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="mb-3">
                <div id="round" name="imgholder" class="mb-5">
                    <label for="picture" class="form-label">Image</label>
                    <input type="file" class="form-control" id="pic" name="pic" accept="image/jpeg, image/jpg, image/png">
                </div>
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $data['firstName']; ?>" pattern="[A-Za-z]+" title="Please enter a valid first name (letters only)" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $data['lastName']; ?>" pattern="[A-Za-z]+" title="Please enter a valid last name (letters only)" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['address']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sex</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="male" name="sex" value="Male" <?php if ($data['sex'] == 'Male') echo 'checked'; ?> required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="female" name="sex" value="Female" <?php if ($data['sex'] == 'Female') echo 'checked'; ?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="other" name="sex" value="Other" <?php if ($data['sex'] == 'Other') echo 'checked'; ?>>
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" id="mobileNum" name="mobileNum" value="<?php echo $data['mobileNumber']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning w-50 btn-update" name="update">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
