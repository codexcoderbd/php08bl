<?php
include ('dbconfig.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Combobox</title>
    <script language="JavaScript" type="text/javascript">
        function showCompany(catid) {
            document.frm.submit();

        }
    </script>
</head>

<body>
<form action="" method="post" name="frm" id="frm">
<table width="500" border="0">
    <tr>
        <td width="119">Category </td>
        <td width="371">
            <select name="cat_id" onchange="showCompany(this.value);">
                <option value="">Select Catagory</option>
                <?php
                error_reporting(0);

                $sql1="select * from catagory";
                $sql_row1=$con->query($sql1);
                while ($sql_res1=mysqli_fetch_assoc($sql_row1))
                {
                    ?>
                    <option value="<?php echo $sql_res1["id"];?>"
                <?php if ($sql_res1["id"]==$_REQUEST["cat_id"])
                {
                    echo "Selected";
                }
                ?>>
                <?php echo $sql_res1["catagory_name"];
                ?>
                </option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Company</td>
        <td id="td_company">
            <select name="company_id" id="company_id">
                <option value="">Select Brand</option>
                <?php
                $sql="select * from company where cat_id='$_REQUEST[cat_id]'";
                $sql_row=$con->query($sql);
                while ($sql_res=mysqli_fetch_assoc($sql_row))
                {
                    ?>
                <option value="<?php echo $sql_res["id"]; ?> ">
                <?php echo $sql_res["company_name"]; ?>
                </option>
              <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>
</form>
</body>

</html>
