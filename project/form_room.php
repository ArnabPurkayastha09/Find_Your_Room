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
            Room Form
        </div>
        <div class= "form">
            
        <div class = "input_field" >
                <label>Upload Image</label>
                <input type ="file" name="uploadfile" style="width: 100%">

            </div>

        
        <div class = "input_field">
                <label>House No</label>
                <input type ="text" class="input" name="house" required>

            </div>

            <div class = "input_field">
                <label>Room No</label>
                <input type ="text" class="input" name="room" required>
                
            </div>

            <div class = "input_field">
                <label>Floor No</label>
                <input type ="text" class="input" name="floor" required>
                
            </div>

            <div class = "input_field">
                <label>Price</label>
                <input type ="text" class="input" name="price" required>
                
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
                <label style="margin-right: 100px;">Category</label>
                <input type ="radio" name="r1" value="Double" required><label style="margin-Left: 5px;">Double</label>
                <input type ="radio" name="r1" value="Single" required><label style="margin-Left: 5px;">Single</label>
                
            </div>

            
            <div class = "input_field">
                <label>Description</label>
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
                <input type = "submit" value="POST" class="btn" name="register">
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

      $house = $_POST['house'];
      $room = $_POST['room'];
      $floor = $_POST['floor'];
      $price = $_POST['price'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $category = $_POST['r1'];
      #$lang = $_POST['language'];
      #$lang1 = implode(",",$lang);
      
      $address = $_POST['address'];

    

    

  
      $query = "INSERT INTO FORM2 (std_image,house,room,floor,price,gender,email,phone,category,address) VALUES('$folder','$house','$room','$floor','$price','$gender','$email','$phone','$category','$address')";
  
       $data = mysqli_query($conn,$query);
       if($data)
       {
          echo "data";

       }
       else{

        echo "failed";
       }
    

  }

?>