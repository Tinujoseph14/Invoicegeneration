<?php 
	include('header.php');
	include_once("assets/constants.php");
?>

		<h2>Create New <span class="invoice_type">Invoice</span> </h2>
		<!-- <hr> -->
        <form action="<?php echo base_url()?> invoices/savedata" method="post">
		<div class="row">
			<div class="col-xs-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="float-left">Customer Information</h4>
						<div class="clear"></div>
					</div>
					<div class="panel-body form-group form-group-sm">
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<input type="text" class="form-control margin-bottom copy-input required" name="customer_name" id="customer_name" placeholder="Enter Name" tabindex="1">
								</div>
								<div class="form-group">
									<input type="text" class="form-control margin-bottom copy-input required" name="customer_address_1" id="customer_address_1" placeholder="Address 1" tabindex="3">	
								</div>
								<div class="form-group">
									<input type="text" class="form-control margin-bottom copy-input required" name="customer_town" id="customer_town" placeholder="Town" tabindex="5">		
								</div>
								<div class="form-group no-margin-bottom">
									<input type="text" class="form-control copy-input required" name="customer_postcode" id="customer_postcode" placeholder="Postcode" tabindex="7">					
								</div>
							</div>
							<div class="col-xs-6">
								<div class="input-group float-right margin-bottom">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" class="form-control copy-input required" name="customer_email" id="customer_email" placeholder="E-mail Address" aria-describedby="sizing-addon1" tabindex="2">
								</div>
								<div class="form-group">
									<input type="text" class="form-control margin-bottom copy-input" name="customer_address_2" id="customer_address_2" placeholder="Address 2" tabindex="4">
								</div>
								<div class="form-group">
									<input type="text" class="form-control margin-bottom copy-input required" name="customer_county" id="customer_county" placeholder="Country" tabindex="6">
								</div>
								<div class="form-group no-margin-bottom">
									<input type="text" class="form-control required" name="customer_phone" id="customer_phone" placeholder="Phone Number" tabindex="8">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="col-xs-4 no-padding-right">
				<div class="col-xs-16 text-right">
					<div class="form-group">
						<div class="input-group date" id="invoice_date">
							<input type="text" class="form-control required" name="invoice_date" placeholder="Invoice Date" data-date-format="<?php echo DATE_FORMAT ?>" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>
		    </div> -->
				
			<table class="table table-bordered table-hover table-striped" id="invoice_table">
				<thead>
					<tr>
						<th width="500">
							<h4><a href="#" class="btn btn-success btn-xs add-row"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a> Product</h4>
						</th>
						<th>
							<h4>Qty</h4>
						</th>
						<th>
							<h4>Price</h4>
						</th>
						<th width="300">
							<h4>Discount</h4>
						</th>
						<th>
							<h4>Sub Total</h4>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<div class="form-group form-group-sm  no-margin-bottom">
								<a href="#" class="btn btn-danger btn-xs delete-row"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
								<input type="text" class="form-control form-group-sm item-input invoice_product" name="invoice_product[]" placeholder="Enter Product Name">
							</div>
						</td>
						<td class="text-right">
							<div class="form-group form-group-sm no-margin-bottom">
								<input type="number" class="form-control invoice_product_qty calculate" name="invoice_product_qty[]" value="1">
							</div>
						</td>
						<td class="text-right">
							<div class="input-group input-group-sm  no-margin-bottom">
								<span class="input-group-addon"><?php echo CURRENCY ?></span>
								<input type="number" class="form-control calculate invoice_product_price required" name="invoice_product_price[]" aria-describedby="sizing-addon1" placeholder="0.00">
							</div>
						</td>
						<td class="text-right">
							<div class="form-group form-group-sm  no-margin-bottom">
								<input type="text" class="form-control calculate" name="invoice_product_discount[]" placeholder="Enter % OR value (ex: 10% or 10.50)">
							</div>
						</td>
						<td class="text-right">
							<div class="input-group input-group-sm">
								<span class="input-group-addon"><?php echo CURRENCY ?></span>
								<input type="text" class="form-control calculate-sub" name="invoice_product_sub[]" id="invoice_product_sub" value="0.00" aria-describedby="sizing-addon1" disabled>
							</div>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="padding-right row text-right">
				<div class="col-xs-6">	
				</div>
					
			<div class="col-xs-6 no-padding-right">
				<div class="row">
					<div class="col-xs-4 col-xs-offset-5">
						<strong>Sub Total:</strong>
					</div>
					<div class="col-xs-3">
						<?php echo CURRENCY ?><span class="invoice-sub-total">0.00</span>
						<input type="hidden" name="invoice_subtotal" id="invoice_subtotal">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-xs-offset-5">
						<strong>Discount:</strong>
					</div>
					<div class="col-xs-3">
						<?php echo CURRENCY ?><span class="invoice-discount">0.00</span>
						<input type="hidden" name="invoice_discount" id="invoice_discount">
					</div>
				</div>
				<?php if (ENABLE_VAT == true) { ?>
				<div class="row">
					<div class="col-xs-4 col-xs-offset-5">
						<strong>TAX/VAT:</strong><br>Remove TAX/VAT <input type="checkbox" class="remove_vat">
					</div>
					<div class="col-xs-3">
						<?php echo CURRENCY ?><span class="invoice-vat" data-enable-vat="<?php echo ENABLE_VAT ?>" data-vat-rate="<?php echo VAT_RATE ?>" data-vat-method="<?php echo VAT_INCLUDED ?>">0.00</span>
						<input type="hidden" name="invoice_vat" id="invoice_vat">
					</div>
				</div>
				<?php } ?>
				<div class="row">
					<div class="col-xs-4 col-xs-offset-5">
						<strong>Total:</strong>
					</div>
					<div class="col-xs-3">
						<?php echo CURRENCY ?><span class="invoice-total">0.00</span>
						<input type="hidden" name="invoice_total" id="invoice_total">
					</div>
				</div>
			</div>

			<div class="col-xs-6 margin-top btn-group">
						<input type="submit" id="action_create_invoice" class="btn btn-success float-right" name="save" value="Create Invoice" data-loading-text="Creating...">
			</div>
			
			</div>
			<div class="row">
				
			</div>
		</form>

		

	

