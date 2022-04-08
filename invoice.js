
$(document).on('click', '.itemRow', function() {  	
	if ($('.itemRow:checked').length == $('.itemRow').length) {
		$('#checkAll').prop('checked', true);
	} else {
		$('#checkAll').prop('checked', false);
	}
});  

var count = $(".itemRow").length;
$(document).on('click', '#button1', function() { 
	count++;
	var htmlRows = '';
	htmlRows += '<tr>';
	htmlRows += '<td><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input itemRow" id="itemRow_'+count+'"> <label class="custom-control-label" for="itemRow_'+count+'"></label> </div></td>'; 
	htmlRows += '<td><input type="text" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off"></td>';          
	htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';	
	htmlRows += '<td><input type="text" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
	htmlRows += '<td><input type="text" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';		 
	htmlRows += '<td><input type="text" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
	htmlRows += '</tr>';
	$('#invoice_item').append(htmlRows);
}); 

	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "#tax_rate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amount_paid", function(){		
		calculateTotal();
	});	

function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total));
		totalAmount += total;	
		
	});
	$('#subTotal').val(parseFloat(totalAmount));	
	var taxRate = $("#tax_rate").val();
	var subTotal = $('#subTotal').val();	
		var after_tax=0;
	if(taxRate==0)
	{
					$('#after_tax').val(subTotal);
					$('#tax_amount').val(taxRate);
					
	}	
	else if(taxRate==1)
	{		
					var newtaxAmount=taxRate/100 * subTotal;
					after_tax=parseFloat(subTotal) + parseFloat(newtaxAmount);
					$('#after_tax').val(after_tax);
					$('#tax_amount').val(newtaxAmount);
	}		

	else if(taxRate==5)
	{
					var newtaxAmount=taxRate/100 * subTotal;
					after_tax=parseFloat(subTotal) + parseFloat(newtaxAmount);
					$('#after_tax').val(after_tax);
					$('#tax_amount').val(newtaxAmount);
					
					
	}
		
	
	else if(taxRate==10)
	{
					var newtaxAmount=taxRate/100 * subTotal;
					after_tax=parseFloat(subTotal) + parseFloat(newtaxAmount);
					$('#after_tax').val(after_tax);
					$('#tax_amount').val(newtaxAmount);	
					
	}

	var discount = $('#discount').val();
	var amount_paid=0;
	if(discount=="")
	{
		discount=0;
	
		amount_paid=parseFloat(after_tax) - parseFloat(discount);
		$('#amount_paid').val(amount_paid);
	}
	else
	{
		amount_paid=parseFloat(after_tax) - parseFloat(discount);
		$('#amount_paid').val(amount_paid);
	}
		
}

