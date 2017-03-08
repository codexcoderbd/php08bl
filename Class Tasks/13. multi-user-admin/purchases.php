<?php
require_once("config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") 
{
    // not logged in send to login page
    redirect("index.php");
}


  
    if(isset($_GET['delete_id']))
    {
        $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
        // it will delete an actual record from db
        $stmt_delete = $db->prepare('DELETE FROM purchases WHERE ID =:uid');
        $stmt_delete->bindParam(':uid',$_GET['delete_id']);
        $stmt_delete->execute();
        
        header("Location: ../purchases.php");
    }




$status = FALSE;
if ( authorize($_SESSION["access"]["INVT"]["PURCHASES"]["create"]) || 
authorize($_SESSION["access"]["INVT"]["PURCHASES"]["edit"]) || 
authorize($_SESSION["access"]["INVT"]["PURCHASES"]["view"]) || 
authorize($_SESSION["access"]["INVT"]["PURCHASES"]["delete"]) ) 
{
 $status = TRUE;
}

if ($status === FALSE)
 {
die("You dont have the permission to access this page");
}

// set page title
$title = "Purchases";


include 'header.php';
?>
<div class="row">
    <div class="col-lg-9">

        <?php if (authorize($_SESSION["access"]["INVT"]["PURCHASES"]["create"])) 
        { 
            ?>
            <a class="btn btn-sm btn-primary" href="operation/addnew.php">
            <i class="fa fa-plus"></i> ADD PURCHASE</a> 
        <?php
         } 
         ?>
        <div style="height: 10px;">&nbsp;</div>

        <div class=" table-responsive">
        
            <table class="table table-striped table-hover ">
                <tbody><tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th style="width: 280px;">Actions</th>
                    </tr>
                    <?php 
$stmt = $DB->prepare('SELECT ID, Item_name, Item_quantity, Item_price FROM purchases ');
    $stmt->execute();
    
    if($stmt->rowCount() > 0)
    {
        $i=0;
        $viewId = array();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            
                        ?>
                        <tr>
                            <?php $viewId[$i] = $ID;?>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['Item_name']; ?></td>
                            <td><?php echo $row['Item_quantity']; ?></td>
                            
                            <td>
                                <?php if (authorize($_SESSION["access"]["INVT"]["PURCHASES"]["edit"])) 
                                { 
                                    ?>
                                    
                                    <a class="btn btn-sm btn-info" href="operation/editform.php?edit_id=<?php echo $ID; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><i class="fa fa-edit"></i> EDIT</a>
                                    
                                <?php } ?>
                                <?php if (authorize($_SESSION["access"]["INVT"]["PURCHASES"]["view"])) 
                                { 
                                   ?>
                                    <a class="btn btn-sm btn-warning" href="operation/view.php?id=<?php echo $viewId[$i++]; ?>" title="click for view" ><i class="fa fa-search-plus"></i> VIEW </a>
                                <?php 
                                } 
                                ?>
                                <?php if (authorize($_SESSION["access"]["INVT"]["PURCHASES"]["delete"])) 
                                { 
                                    ?>
                                    <a class="btn btn-sm btn-danger" href="?delete_id=<?php echo $ID; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><i class="fa fa-trash-o"></i> DELETE</a>
                                <?php
                                 } 
                                 ?>
                            </td>
                        </tr>
                    <?php
                     } }# >end php
                     ?>

                </tbody></table>
        </div>


        <div style="height: 20px;">&nbsp;</div>
        <a href="dashboard.php"><button class="btn btn-lg btn-info" type="button"><i class="fa fa-backward"></i> Back to dashboard</button></a>

    </div>

    </div>
<?php include 'footer.php'; 
?>