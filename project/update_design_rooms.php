<?php include("connection.php");

$id=  $_GET['id'];
$query = "SELECT * FROM FORM2 where id= '$id'";
$data = mysqli_query($conn, $query);


$result = mysqli_fetch_assoc($data);
 
#$language = $result['language'];
#$language1 = explode(",", $language);
?>

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
        <form action="#" method="POST">
        <div class= "title">
            Update Room Details
        </div>
        <div class= "form">
            <div class = "input_field">
                <label>House No</label>
                <input type ="text" value="<?php echo $result['house']; ?>" class="input" name="house" required>

            </div>

            <div class = "input_field">
                <label>Room No</label>
                <input type ="text" value="<?php echo $result['room']; ?>" class="input" name="room" required>
                
            </div>

            <div class = "input_field">
                <label>Floor No</label>
                <input type ="text" value="<?php echo $result['floor']; ?>"class="input" name="floor" required>
                
            </div>

            <div class = "input_field">
                <label>Confirm Password</label>
                <input type ="text" value="<?php echo $result['price']; ?>"class="input" name="price" required>
                
            </div>

            <div class = "input_field">
                <label>Gender Preference</label>
                <div class="custom_select">

                <select name="gender"  required>
                    <option value="">Select</option>

                    <option value="male"
                         <?php
                           if($result['gender']== 'male')
                           {

                            echo "selected";
                           }
                         ?>
                    >

                    Male</option>
                    <option value="female"
                    <?php
                           if($result['gender']== 'female')
                           {

                            echo "selected";
                           }
                         ?>
                    
                    >Female</option>
                </select>
                </div>   
            </div>

            <div class = "input_field">
                <label>Email Address</label>
                <input type ="text" value="<?php echo $result['email']; ?>" class="input" name="email"  required>
                
            </div>

            <div class = "input_field">
                <label>Phone Number</label>
                <input type ="text" value="<?php echo $result['phone']; ?>" class="input" name="phone"  required>
                
            </div>
            
            <div class = "input_field" >
                <label style="margin-right: 100px;">Category</label>
                <input type ="radio" name="r1" value="Double" required 
                
                <?php
                      
                     if($result['category'] == "Double")
                     {
                            echo "checked";

                     }
                ?>
                
                >
                
                <label style="margin-Left: 5px;">Double</label>
                <input type ="radio" name="r1" value="Single" required
                
                <?php
                      
                     if($result['category'] == "Single")
                     {
                            echo "checked";

                     }
                ?>
                
                >
                
                <label style="margin-Left: 5px;">Single</label>
                
               
            </div>

            
            <div class = "input_field">
                <label>Address</label>
                <textarea class="textarea" name="address"  required><?php echo $result['address'];?></textarea>
                
            </div>

            <div class = "input_field terms">
                <label class="check">
                   <input type = "checkbox"  required>    
                   <span class= "checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>
            
            <div class = "input_field">
                <input type = "submit" value="Update Details" class="btn" name="update">
             </div>
        </div>
    </form>
     </div>   

</body>
</html>

<?php

if($_POST['update'])
  {
      $house = $_POST['house'];
      $room = $_POST['room'];
      $floor = $_POST['floor'];
      $price = $_POST['price'];
      $gender = $_POST['gender'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $category = $_POST['r1'];
     # $lang = $_POST['language'];
     # $lang1 = implode(",",$lang);
      
      $address = $_POST['address'];

    

    

  
      //$query = "INSERT INTO FORM (fname,lname,password,cpassword,gender,email,phone,address) VALUES('$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$address')";
  
      $query = "UPDATE form2 set house= '$house',room='$room',floor='$floor',price='$price',gender='$gender',email='$email',phone='$phone',category='$category',address='$address' WHERE id='$id'";

       $data = mysqli_query($conn,$query);
       if($data)
       {
          echo "<script>alert('Record Updated')</script>";
           ?>
               
               <meta http-equiv = "refresh" content = "0; url = http://localhost/project/display_rooms.php" />

           <?php


       }
       else{

        echo "failed";
       }
    

  }

?>