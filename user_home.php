<html>
    <title>PHP Invoice</title>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
        <body>
            <div id="session">
                <?php
                    session_start();
                    echo "User :  ";
                    $biller= $_SESSION['biller'];
                    echo $biller;
                    $uid=$_SESSION['uid'];
                    
                ?>
            </div>
            <div id="heading">
                <h1>PHP Invoice System</h1>
</div>
<div id="button">
    <tr><td><a href="create_invoice.php"><input type="button" value="Create Invoice" id="button1"></a></td></tr>
    <tr><td><a href="logout.php"><input type="button" value="Logout" id="button2"></a></td></tr>
</div>
<div id="table_div">
        <table border ="1" cellspacing="0" cellpadding="10" >
           <tr><td>Invoice No</td><td>Customer Name</td><td>Create date</td><td>Total</td><td>Print</td></tr>
<?php

    $row=array();
    include 'db.php';
    $sql="SELECT * FROM invoice_order WHERE biller_id='$uid'";
    $result=mysqli_query($con,$sql);

    while($r=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
    $row=$r;

        foreach($row as $r)
        {
        
        echo '<tr><td>'.$row["order_id"].'</td><td>'.$row["order_reciever_name"].'</td><td>'.$row["order_date"].'</td><td>'.$row["order_amount_paid"].'</td><td>
              <a href="print_invoice.php?order_id='.$row["order_id"].'"><button>Print</button></a></td>';
              
break;
    }
}
  ?>
  </div>
</table>

  </body>
</html>
