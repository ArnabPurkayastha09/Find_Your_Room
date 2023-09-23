<?php

include("connection.php");

$id = $_GET['id'];

$query = "DELETE FROM FORM2 WHERE id = '$id' ";

$data = mysqli_query($conn,$query);

if($data)
{

    echo "<script>alert('Record Deleted')</script>";
          
    ?>
     
     <meta http-equiv = "refresh" content = "0; url = http://localhost/project/display.php" />


    <?php
}
else
{
    echo "<script>alert('Failed to delete')</script>";


    
}


?>