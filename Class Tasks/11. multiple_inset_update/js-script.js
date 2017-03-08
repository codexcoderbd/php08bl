// JavaScript Document


//  for select / deselect all


//  for select / deselect all

//  dynamically redirects to specified page
function edit_records() 
{
 document.frm.action = "edit_mul.php";
 document.frm.submit();  
}
function delete_records() 
{
 document.frm.action = "delete_mul.php";
 document.frm.submit();
}