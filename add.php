<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabriel_MidtermReq</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>
<body>
    
    <?php
function sanitize($inputData) {
    foreach ($inputData as &$value) {
        $value = trim($value);
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        $value = stripslashes($value);
    }
    return $inputData;
}
    if(isset($_POST['add'])){

$inputData = array(
    'firstName' => $_POST['firstName'],
    'lastName' => $_POST['lastName'],
    'address' => $_POST['address'],
    'mobileNum' => $_POST['mobileNum'],
    'email' => $_POST['email']
);
        $Imagename=$_FILES['pic']['name'];
       $Imagetype=$_FILES['pic']['type'];
        $Imagesize=$_FILES['pic']['size'];
        $tmp_name=$_FILES['pic']['tmp_name'];
     

$sanitizedData = sanitize($inputData);


$firstName = $sanitizedData['firstName'];
$lastName = $sanitizedData['lastName'];
$address = $sanitizedData['address'];
$sex=$_POST['sex'];
$Ssex="";
if($sex=="Male"){
    $Ssex="Male";
}
else if($sex=="Female"){
    $Ssex="Female";
    
}
else if($sex=="Other"){
    $Ssex="Other";
}
$mobile = $sanitizedData['mobileNum'];
$email = $sanitizedData['email'];
     require 'config.php';
  
        if(move_uploaded_file($tmp_name,"../Gabriel_MidtermReq/images/".$Imagename)){    
        }
        else {
            echo "error";
        }
            $sql = "INSERT INTO contactOrg (firstName, lastName, address, sex, mobileNum, email, image)
            VALUES ('$firstName', '$lastName', '$address', '$Ssex','$mobile','$email','$Imagename')";
            $container=$conn->query($sql) or die("Could not perform $sql");
            echo "<script>Swal.fire(
                'Good job!',
                'The record has been saved!',
                'success'
              )</script>";
            header("Refresh:2;url=index.php");


    }
    else{
        header("Refresh:2;url=index.php");
    }
    ?>

   
</body>
</html>