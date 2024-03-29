<?php include("connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PHP CRUD Operations</title>
</head>
<body>
     <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class= "title">
            Registration Form
        </div>
        <div class= "form">
            
        <div class = "input_field" >
                <label>Upload Image</label>
                <input type ="file" name="uploadfile" style="width: 100%">

            </div>

        
        <div class = "input_field">
                <label>First Name</label>
                <input type ="text" class="input" name="fname" required>

            </div>

            <div class = "input_field">
                <label>Last Name</label>
                <input type ="text" class="input" name="lname" required>
                
            </div>

            <div class = "input_field">
                <label>Password</label>
                <input type ="password" class="input" name="password" required>
                
            </div>

            <div class = "input_field">
                <label>Confirm Password</label>
                <input type ="password" class="input" name="conpassword" required>
                
            </div>

            <div class = "input_field">
                <label>Gender</label>
                <div class="custom_select">
                <select name="gender"  required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                </div>   
            </div>

            <div class = "input_field">
                <label>Email Address</label>
                <input type ="text" class="input" name="email"  required>
                
            </div>

            <div class = "input_field">
                <label>Phone Number</label>
                <input type ="text" class="input" name="phone"  required>
                
            </div>
            
            <div class = "input_field" >
                <label style="margin-right: 100px;">Caste</label>
                <input type ="radio" name="r1" value="General" required><label style="margin-Left: 5px;">General</label>
                <input type ="radio" name="r1" value="OBC" required><label style="margin-Left: 5px;">OBC</label>
                <input type ="radio" name="r1" value="SC" required><label style="margin-Left: 5px;">SC</label>
                <input type ="radio" name="r1" value="ST" required><label style="margin-Left: 5px;">ST</label>
                
            </div>

            <div class = "input_field" >
                <label style="margin-right: 100px;">Language</label>
                <input type ="checkbox" name="language[]" value="Hindi" ><label style="margin-Left: 5px;">Hindi</label>
                <input type ="checkbox" name="language[]" value="Urdu" ><label style="margin-Left: 5px;">Urdu</label>
                <input type ="checkbox" name="language[]" value="English" ><label style="margin-Left: 5px;">English</label>
                
            </div>

            <div class = "input_field">
                <label>Address</label>
                <textarea class="textarea" name="address"  required></textarea>
                
            </div>

            <div class = "input_field terms">
                <label class="check">
                   <input type = "checkbox"  required>    
                   <span class= "checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>
            
            <div class = "input_field">
                <input type = "submit" value="Register" class="btn" name="register">
             </div>
        </div>
    </form>
     </div>   

</body>
</html>

<?php

if($_POST['register'])
  {

      
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "images/".$filename;
move_uploaded_file($tempname, $folder);

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $pwd = $_POST['password'];
      $cpwd = $_POST['conpassword'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $caste = $_POST['r1'];
      $lang = $_POST['language'];
      $lang1 = implode(",",$lang);
      
      $address = $_POST['address'];

    

    

  
      $query = "INSERT INTO FORM (std_image,fname,lname,password,cpassword,gender,email,phone,caste,language,address) VALUES('$folder','$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$caste','$lang1','$address')";
  
       $data = mysqli_query($conn,$query);
       if($data)
       {
          echo "<script> alert('Data Inserted into Database') </script>";
          ?>
               
               <meta http-equiv = "refresh" content = "0; url = http://localhost/project/enter_student.php" />

           <?php


       }
       else{

        echo "<script> alert('Data Failed to Inserted into Database') </script>";
    }
    

  }

?>