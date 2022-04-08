<?php
    include 'db.php';
    session_start();
    $order_id=$_GET['order_id'];
    
    $row=array();
    include 'db.php';
    $sql="SELECT * FROM invoice_order WHERE order_id='$order_id'";
    $result=mysqli_query($con,$sql);

    while($r=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
    $row=$r;

        foreach($row as $r)
        {
            $order_id= $row['order_id'];
            $order_reciever_name= $row['order_reciever_name'];
            $order_reciever_address= $row['order_reciever_address'];
            $order_total_before_tax= $row['order_total_before_tax'];
			$tax_rate=$row['tax_rate'];
            $order_total_tax= $row['order_total_tax'];
            $order_total_after_tax= $row['order_total_after_tax'];
            $order_discount= $row['order_discount'];
            $order_amount_paid= $row['order_amount_paid'];
            
            $order_date=$row['order_date'];
            break;
            
        }
    }
	
?>
<html>
    <head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order Id :<?php echo $order_id?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
                    <b><?php echo $order_reciever_name?></b><br>
                    <?php echo $order_reciever_address?>
    				</address>
    			</div>
    			
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo $order_date?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							
								<?php
								
								$sql1="SELECT * FROM invoice_order_item WHERE order_id='$order_id'";
								$result1=mysqli_query($con,$sql1);
								while($r1=mysqli_fetch_array($result1,MYSQLI_ASSOC))
    {
    $row1=$r1;

        foreach($row1 as $r1)
        {
        
    					echo		'<tr>
    								<td>'.$row1["item_name"].'</td>
    								<td class="text-center">'.$row1["order_item_price"].'</td>
    								<td class="text-center">'.$row1["order_item_qty"].'</td>
    								<td class="text-right">'.$row1["order_item_final_amount"].'</td>
    							</tr>';
								break;
								
		}
	}
						echo		'<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">'.$order_total_before_tax.'</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tax Rate</strong></td>
    								<td class="no-line text-right">'.$tax_rate.'</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tax Amount</strong></td>
    								<td class="no-line text-right">'.$order_total_tax.'</td>
    							</tr>
								<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>After Tax</strong></td>
    								<td class="no-line text-right">'.$order_total_after_tax.'</td>
    							</tr>
								<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Discount</strong></td>
    								<td class="no-line text-right">'.$order_discount.'</td>
    							</tr>
								<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Final Amount</strong></td>
    								<td class="no-line text-right">'.$order_amount_paid.'</td>
    							</tr>
								<tr>
								<td class="no-line"></td>
								<td class="no-line"></td>
								<td class="no-line text-center"><strong><button onclick="window.print();return false;" >Print</button>
								</strong></td>
								
							</tr>'
						  
    ?>							
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</body>
</html>