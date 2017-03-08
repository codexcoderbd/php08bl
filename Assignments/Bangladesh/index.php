<?php
include ('dbconfig.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Combobox</title>
    <script language="JavaScript" type="text/javascript">
        function showDivisions(div_id) {
            document.frm.submit();

        }
        function showDistricts(dist_id) {
            document.frm.submit();

        }
    </script>
</head>

<body>
<form action="" method="post" name="frm" id="frm">
<table width="500" border="0">
    <tr>
        <td width="119">Division </td>
        <td width="371">
            <select name="div_id" onchange="showDivisions(this.value);">
                <option value="">Select Division</option>
                <?php
                error_reporting(0);

                $sql1="SELECT * FROM divisions";
                $sql_row1=$con->query($sql1);
                while ($sql_res1=mysqli_fetch_assoc($sql_row1))
                {
                    ?>
                    <option value="<?php echo $sql_res1["div_id"];?>"
                <?php if ($sql_res1["div_id"]==$_REQUEST["dist_id"])
                {
                    echo "Selected";
                }
                ?>>
                <?php echo $sql_res1["Division"];
                ?>
                </option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>District</td>
        <td id="td_districty">
            <select name="dist_id" id="dist_id" onchange="showDistricts(this.value);">>
                <option value="">Select District</option>
                <?php
                $sql="select * from districts where div_id='$_REQUEST[div_id]'";
                $sql_row=$con->query($sql);
                while ($sql_res=mysqli_fetch_assoc($sql_row))
                {
                    ?>
                <option value="<?php echo $sql_res["dist_id"]; ?> ">
                <?php echo $sql_res["District"]; ?>
                </option>
              <?php
                }
                ?>
            </select>
        </td>
    </tr>

    <tr>
        <td>Upazilla</td>
        <td id="td_upazilla">
            <select name="up_id" id="up_id">
                <option value="">Select District</option>
                <?php
                $sql="select * from upazilla where dist_id='$_REQUEST[dist_id]'";
                $sql_row=$con->query($sql);
                while ($sql_res=mysqli_fetch_assoc($sql_row))
                {
                    ?>
                    <option value="<?php echo $sql_res["up_id"]; ?> ">
                        <?php echo $sql_res["Upazilla"]; ?>
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
