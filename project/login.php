<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <title>Login</title>
</head>
<body>
       <div class="center">

           <h1>Login</h1>


           <form action="#" method="POST" autocomplete = "off">

           <div class="form">
               <input type="text" name="username" class="textfiled" placeholder="Username">
               <input type="password" name="password" class="textfiled" placeholder="Password">
                
               <div class="forgetpass"><a href="#" class="link" onclick="message()">Forget Password ?</a></div>

               <input type="submit" name="login" value="Login" class="btn">

               <div class ="signup">New Member ? <a href='form.php' class = "link">SignUp Here</a></div>
               
           </div>


    </div>
   </form>

<script>
    
    function message()
    {
        alert("Remember Next Time");
    }


</script>


</body>
</html>

<?php

include("connection.php");

if(isset($_POST['login']))
{

    $username = $_POST['username'];
    $pwd = $_POST['password'];

    $query = "SELECT * FROM form WHERE email = '$username' && password ='$pwd' ";
    $data = mysqli_query($conn, $query);

     $total = mysqli_num_rows($data);

     if($total == 1)
     {



        $_SESSION['user_name'] = $username;
        header('location:enter_student.php');
    //    <meta http-equiv = "refresh" content = "0; url = http://localhost/project/enter_student.php"/>
    }
     else
     {

        echo "Login Failed";
     }
}
?>