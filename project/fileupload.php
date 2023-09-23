<?php

error_reporting(0);

?>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
     <form action="#" method="POST" enctype="multipart/form-data">
        <input type ="file" name="uploadfile"> <br><br>
        <input type = "submit" name ="submit" value="Upload FIle">
        
    </form>
</body>
</html>

<?php


$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname, $folder);

echo "<img src= '$folder' height='100px' width='100px'> ";
?>
