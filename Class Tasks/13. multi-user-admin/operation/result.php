<?php
require_once("../config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "")
 {
    // not logged in send to login page
    redirect("../index.php");
}
        error_reporting(E_ALL ^ E_DEPRECATED);

        $host = 'localhost';
        $user = 'root';
        $pass = '';

        $con = mysqli_connect("localhost","root","","multi-admin");

        $id = $_post['btn']; 

        $data = "";


       $sql = "SELECT * FROM `purchases` WHERE `id` ='$id'";

       $resu = mysqli_query($con,$sql);
       
       $count = 0;

       while($temp = mysqli_fetch_assoc($resu))
       {
            $count ++;

        }

       if ($count > 0)
       {
                            echo "<td>".$edit_row['ID']."</td>";
                            echo "<td>".$edit_row['Item_name']."</td>";
                            echo "<td>".$edit_row['Item_quantity']."</td>";
                            echo "<td>".$edit_row['Item_price']."</td>";
       }
        else
       {
          echo "nothing found";
       }
         
?>