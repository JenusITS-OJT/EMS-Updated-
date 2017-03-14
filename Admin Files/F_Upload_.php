<?php
require ('F_Connection.php');
/*if (!isset($_POST['fileToUpload']))
   header("Location: T_ViewProfile.php");*/

$msg="";
$userid = mysqli_real_escape_string($con, $_POST['userid']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$target_dir = "Uploads\\";
$target_file = pathinfo(basename($_FILES["fileToUpload"]["name"]));
$fileName = $userid . '_' . $name  . '.' . $target_file['extension'];
$target_path = ($target_dir . $fileName);
$target_path_sql = ($target_dir . "\\\\" . $fileName);
$uploadOk = 1;
$imageFileType = $target_file['extension'];

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $msg = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msg = "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $msg = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg .= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_path)) {

            $sql="UPDATE `employee` SET `Profile_Pic` = '$target_path_sql' WHERE `employee`.`User_ID` = $userid;";
            $result = mysqli_query($con, $sql);
            $stm = mysqli_query($con, $sql);
            $msg .= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            /*echo $msg;
            echo $target_path_sql;*/
            header("Location: T_ViewProfile_.php?id=success&msg=$msg");        
            
        
    }
    else {
        $msg .= "Sorry, there was an error uploading your file.";
        /*echo $msg;
        echo $target_path_sql;*/
        header("Location: T_ViewProfile_.php?id=failed&msg=$msg");
    }
}
?>