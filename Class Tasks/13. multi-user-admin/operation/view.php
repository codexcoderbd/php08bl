<?php 

include '../headerB.php';
require_once("../config.php");
  $id = $_GET['id'];
    $pdoQuery= "SELECT Item_name, Item_quantity, Item_price FROM purchases WHERE `ID` like '$id'";
  /*select * from route";/* where (from,to)=('$From','$To')";*/
        $pdoResult = $DB->query($pdoQuery);
        $pdoRowCount = $pdoResult->rowCount();
    if($pdoRowCount==1)
    {
      $row = $pdoResult->fetch();
      ?>

       <div class="container">
    
      <table class="table table-striped table-hover ">
                <tbody><tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th style="width: 280px;">Price</th>
                    </tr>
                    <tr>
                    <?php  
                            echo "<td>".$id."</td>";
                            echo "<td>".$row['Item_name']."</td>";
                            echo "<td>".$row['Item_quantity']."</td>";
                            echo "<td>".$row['Item_price']."</td>";
                   ?>       
                        </tr>
                 </tbody>
                </table>
                <a class="btn btn-default" href="../purchases.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; Back </a>

  </div>
<?php
        }
    else
    {
        echo "<script>alert('Nothing to show');</script>";
            exit();
    }
        ?>
  <!-- Trigger the modal with a button -->
   <!-- Modal -->
 
