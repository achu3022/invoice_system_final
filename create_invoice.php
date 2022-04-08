<html>
    <title>PHP Invoice</title>
    <head>
    <style>
        body {
  
  background: linear-gradient(45deg, greenyellow, dodgerblue);
 
}
#button{
        position: fixed;
        top: 220px;
        bottom: 0px;
        text-align: center;
        height: 20px;
    }
    #button1{

        background-color: #053b07;
        border: none;
        color: rgb(255, 255, 255);
        padding: 20px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor:pointer;
        border-radius: 12px;
    }
    #button2{

        background-color: #ac0505;
        border: none;
        color: rgb(255, 255, 255);
        padding: 20px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor:pointer;
        border-radius: 12px;
    }
    #table_div{
      position: relative;
      top: 300px;
      bottom: 0px;
      text-align: center;
  }
  #cust
  {position: relative;
    top: 130px;
    bottom: 0px;
    float: left;
    height: 80px;
   
    
  }
  .form-group {
    margin-bottom: 20px;
    float: right;
  }
  .form-control {
    border: none;
    background-color: rgb(255, 255, 255);
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    -webkit-transition: background-color 0.3s ease;
    transition: background-color 0.3s ease;
  }
  input[type=text] {
    border: 2px solid rgb(2, 0, 0);
    border-radius: 4px;
    width: 100%;
    padding: 12px 20px;
  }
  textarea {
    width: 100%;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 4px;
    background-color: #f8f8f8;
    
  }
  #item_table{

    position: relative;
    top: 300px;
    bottom: 0px;
  }
  #invoice_button{
    position: relative;
    top: 340px;
  }
  select {
    width: 120px;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
  }
  #amount{
    position: relative;
    top: 380px;
    bottom: 0px;
  }
  input[type=invoice] {
    border: 2px solid rgb(2, 0, 0);
    border-radius: 4px;
    width: 120px;
    padding: 12px 20px;
  }
  input[type=submit] {
    background-color: #053b07;
    border: none;
    color: rgb(255, 255, 255);
    padding: 20px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor:pointer;
    border-radius: 12px;
  }
  input[type=number] {
    border: 2px solid rgb(2, 0, 0);
    border-radius: 4px;
    width: 120px;
    padding: 12px 20px;
  }

        </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="invoice.js">
   
    
</script>
    </head>
    <body>

<div id="session">
<?php
include 'db.php';
session_start();
$uid=$_SESSION['uid'];
echo $uid;
echo "User :  ";
$biller= $_SESSION['biller'];
echo $biller;
?>

<form action="submit.php" method="POST">
<div id="cust">
               <h3>To,</h3>
               <input type="text" name="cust_name" placeholder="customer name"><br>
               <textarea  name="cust_address"></textarea>
              
         </div>
         <div id="item_table">
        
            <table class="table table-condensed table-striped" id="invoice_item">
                  <tr>
                     <th width="2%">
                     
                    </th>
                     <th width="15%">Item No</th>
                     <th width="38%">Item Name</th>
                     <th width="15%">Quantity</th>
                     <th width="15%">Price</th>
                     <th width="15%">Total</th>
                  </tr>
                  <tr>
                     <td><div class="custom-control custom-checkbox">
                        
                        </div></td>
                     <td><input type="text" name="productCode[]" id="productCode_0" class="form-control" autocomplete="off"></td>
                     <td><input type="text" name="productName[]" id="productName_0" class="form-control" autocomplete="off"></td>
                     <td><input type="text" name="quantity[]" id="quantity_0" class="form-control quantity" autocomplete="off"></td>
                     <td><input type="text" name="price[]" id="price_0" class="form-control price" autocomplete="off"></td>
                     <td><input type="text" name="total[]" id="total_0" class="form-control total" autocomplete="off"></td>
                  </tr>
               </table>
       
        <tr><td><input type="button" value="Add" id="button1" onclick="addrow()"></td></tr>

<tr>
    <label>Sub Total</label>
<input value="" type="invoice" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">

    <label>Tax Rate %</label>
<select id="tax_rate" name="tax_rate">
    <option value="0">0%</option>
    <option value="1">1%</option>
    <option value="5">5%</option>
    <option value="10">10%</option>
</select>

<label>Tax Amount</label>
<input value="" type="invoice" class="form-control" name="tax_amount" id="tax_amount" placeholder="tax_amount">

<label>Amount After Tax</label>
<input value="" type="invoice" class="form-control" name="after_tax" id="after_tax" placeholder="amount after tax">

<label>Discount</label>
<input value="" type="invoice" class="form-control" name="discount" id="discount" placeholder="discount amount">


<label>Total Amount</label>
<input value="" type="invoice" class="form-control" name="amount_paid" id="amount_paid" placeholder="amount paid "><br>


<input type="Submit" value="Save"></tr>
</div>

</form>
</body>
</html>