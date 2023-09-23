<?php
session_start();
?>

<html>
<head>
    <title>Display Rooms</title>
    <style>
        body
        {
              background: #D071f9;

        }
        table
        {
           background-color: white ;
        }
        .update, .delete, .payment
        {

              background-color: green;
               color: white;     
               border: 0;
               outline: none;
               border-radius: 5px;
               height: 28px;
               width: 80px;
               font-weight: bold;
               cursor: pointer;
        }
        .delete
        {

              background-color: red;
              
        }
        .payment
        {
            background-color: blue;
            
        }
</style>
</head>



<?php
include("connection.php");
error_reporting(0);

$query = "SELECT * FROM FORM2";
$data = mysqli_query($conn, $query);

$total = mysqli_num_rows($data);
//$result = mysqli_fetch_assoc($data);

//echo $result[fname]." ".$result[lname]." ".$result[gender]." ".$result[email]." ".$result[phone]." ".$result[address];
//echo $total;
  
if($total != 0)
{
    ?>
      <h2 align="center"><mark>Displaying All Rooms</mark></h2>
     <center><table border = "1" cellspacing="7" width="100%">
        <tr>
        <th width="5%">ID</th>
        <th width="5%">Image</th>
        
        <th width="8%">House Name</th>
        <th width="8%">Room No</th>
        <th width="8%">Floor No</th>
        <th width="8%">Price</th>
        <th width="10%">Gender Preferences</th>
        <th width="20%">Email</th>
        <th width="10%">Phone</th>
        <th width="10%">Category</th>
        
        <th width="24%">Description</th>
        <th width="15%">Operations</th>
</tr>

    <?php
    while ($result = mysqli_fetch_assoc($data)) {
       
        echo "<tr>
               <td>".$result['id']."</td>
                
               <td><img src='".$result['std_image']."' height='300px' width='300px'></td>
              
             
               <td>".$result['house']."</td>
               <td>".$result['room']."</td>
               <td>".$result['floor']."</td>
               <td>".$result['price']."</td>
              
               <td>".$result['gender']."</td>
               <td>".$result['email']."</td>
                <td>".$result['phone']."</td>
                <td>".$result['category']."</td>
               
                <td>".$result['address']."</td>
                <td><a href='update_design_rooms.php?id=$result[id]'><input type= 'submit' value='Update' class = 'update'></a>
                <a href='delete_rooms.php?id=$result[id]'><input type= 'submit' value='Delete' class = 'delete' onclick = 'return checkdelete()'></a>
                <a href=''><input type= 'submit' value='Booked' class = 'payment'></a>
                </td>
                
                </tr>";
        //echo "<br>"; // Add a line break for better readability
    }
}
else
{

    echo "No records";


}
?>
</table>
</center>


<script>
    function checkdelete()
    {
        
        return confirm('Are you sure you want to delete your data?');

    }
</script>