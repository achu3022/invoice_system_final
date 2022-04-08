<?php
include 'db.php';
$cust_name=$_POST['cust_name'];
$cust_address=$_POST['cust_address'];

$qry="SELECT * FROM invoice_order_item";
    $result1=mysqli_query($con,$qry);
    while($r1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
{
    if($r1)
        {
            $order_id=$r1["order_id"];
        }
}
 $order_id=$order_id+1;



for ($i = 0; $i < count($_POST['productCode']); $i++)
{
    $sql="INSERT INTO invoice_order_item (order_id, item_code, item_name, order_item_qty, order_item_price, order_item_final_amount) 
    VALUES ('".$order_id."', '".$_POST['productCode'][$i]."', '".$_POST['productName'][$i]."', '".$_POST['quantity'][$i]."', '".$_POST['price'][$i]."', '".$_POST['total'][$i]."')";			
    mysqli_query($con,$sql);
}

session_start();
$uid=$_SESSION['uid'];

$subTotal=$_POST['subTotal'];
$tax_rate=$_POST['tax_rate'];
$tax_amount=$_POST['tax_amount'];
$after_tax=$_POST['after_tax'];
$discount=$_POST['discount'];
$amount_paid=$_POST['amount_paid'];
$order_date=date("d-m-Y");
$myqry="INSERT INTO invoice_order (biller_id,order_id,order_reciever_name,order_reciever_address,order_total_before_tax,tax_rate,order_total_tax,order_total_after_tax,order_discount,order_amount_paid,order_date)
 VALUES ('$uid','$order_id','$cust_name','$cust_address','$subTotal','$tax_rate','$tax_amount','$after_tax','$discount','$amount_paid','$order_date')";
 mysqli_query($con,$myqry);

 header("location:user_home.php");
?>