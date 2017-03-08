<?php
 include_once 'dbcon.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multiple Insert, Update, Delete(CRUD) using PHP & MySQLi</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script src="jquery.js" type="text/javascript"></script>
<script src="js-script.js" type="text/javascript"></script>
</head>

<body>
<form method="post" name="frm">
<table width="50%" align="center" border="0">
<tr>
<td colspan="3"><a href="generate.php">add new records...</a></td>
</tr>
<tr>
<th>##</th>
<th>First Name</th>
<th>Last Name</th>
</tr>
<?php
 $res = $MySQLiconn->query("SELECT * FROM users");
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <tr>
   <td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['id']; ?>"  /></td>
   <td><?php echo $row['first_name']; ?></td>
   <td><?php echo $row['last_name']; ?></td>
   </tr>
   <?php
  } 
 }
 else
 {
  ?>
        <tr>
        <td colspan="3"> No Records Found ...</td>
        </tr>
        <?php
 }
?>

<?php

if($count > 0)
{
 ?>
 <tr>
    <td colspan="3">
    <label><b><input type="hidden" class="select-all" /> Check / Uncheck All</label>
    <label id="actions">
    <span style="word-spacing:normal;"> with selected :</span></label></b>
    <span><input type="button" value="edit" onClick="edit_records();" alt="edit" /></span> 
    <span><input type="button" value="delete" onClick="delete_records();" alt="delete" /></span>
    </label>
    </td>
 </tr>    
    <?php
}

?>

</table>
</form>
</body>
</html>