<?php include("connection.php");

session_start();


$id=  $_GET['id'];

$userprofile = $_SESSION['user_name'];

if($userprofile == true)
{


}
else
{
    header('location:login.php');
}


$query = "SELECT * FROM FORM where id= '$id'";
$data = mysqli_query($conn, $query);


$result = mysqli_fetch_assoc($data);
 
$language = $result['language'];
$language1 = explode(",", $language);
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
            Update Student Details
        </div>
        <div class= "form">
            <div class = "input_field">
                <label>First Name</label>
                <input type ="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required>

            </div>

            <div class = "input_field">
                <label>Last Name</label>
                <input type ="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
                
            </div>

            <div class = "input_field">
                <label>Password</label>
                <input type ="password" value="<?php echo $result['password']; ?>"class="input" name="password" required>
                
            </div>

            <div class = "input_field">
                <label>Confirm Password</label>
                <input type ="password" value="<?php echo $result['cpassword']; ?>"class="input" name="conpassword" required>
                
            </div>

            <div class = "input_field">
                <label>Gender</label>
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
                <label style="margin-right: 100px;">Caste</label>
                <input type ="radio" name="r1" value="General" required 
                
                <?php
                      
                     if($result['caste'] == "General")
                     {
                            echo "checked";

                     }
                ?>
                
                >
                
                <label style="margin-Left: 5px;">General</label>
                <input type ="radio" name="r1" value="OBC" required
                
                <?php
                      
                     if($result['caste'] == "OBC")
                     {
                            echo "checked";

                     }
                ?>
                
                >
                
                <label style="margin-Left: 5px;">OBC</label>
                <input type ="radio" name="r1" value="SC" required
                
                <?php
                      
                     if($result['caste'] == "SC")
                     {
                            echo "checked";

                     }
                ?>
                
                >
                
                
                <label style="margin-Left: 5px;">SC</label>
                <input type ="radio" name="r1" value="ST" required
                
                <?php
                      
                     if($result['caste'] == "ST")
                     {
                            echo "checked";

                     }
                ?>
                
                >
                
                
                <label style="margin-Left: 5px;">ST</label>
                
            </div>

            <div class = "input_field" >
                <label style="margin-right: 100px;">Language</label>
                <input type ="checkbox" name="language[]" value="Hindi" 
                
                
                <?php

                if(in_array('Hindi', $language1))
                {

                    echo "checked";
                }

                 ?>
                
                ><label style="margin-Left: 5px;">Hindi</label>
                <input type ="checkbox" name="language[]" value="Urdu" 
                
                <?php


                if(in_array('Urdu', $language1))
                {

                    echo "checked";
                }
                
                ?>


                ><label style="margin-Left: 5px;">Urdu</label>
                <input type ="checkbox" name="language[]" value="English" 
                
                <?php


                if(in_array('English', $language1))
                {

                    echo "checked";
                }
                
                ?>

                
                ><label style="margin-Left: 5px;">English</label>
                
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

    

    

  
      //$query = "INSERT INTO FORM (fname,lname,password,cpassword,gender,email,phone,address) VALUES('$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$address')";
  
      $query = "UPDATE form set fname= '$fname',lname='$lname',password='$pwd',cpassword='$cpwd',gender='$gender',email='$email',phone='$phone',caste='$caste',language='$lang1',address='$address' WHERE id='$id'";

       $data = mysqli_query($conn,$query);
       if($data)
       {
          echo "<script>alert('Record Updated')</script>";
           ?>
               
               <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php" />

           <?php


       }
       else{

        echo "failed";
       }
    

  }

?>