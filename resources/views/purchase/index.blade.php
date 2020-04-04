<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Billing</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/custom.js') }}"></script>
    </head>
    <body>
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<h2 class="text-center text-uppercase">Automated purchase management system</h2>
					<hr>
					<h3 class="text-center text-uppercase">Product Price Calculation</h3>
				</div>
			</div>
			<div class="float-right">
				<a href="{{route('purchase-list')}}"><button type="button" class="btn btn-primary">View Purchase</button></a>
			</div>
			<br>
			<br>
			<form id="purchaseForm">
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="name">Product Name</label>
						<input type="hidden"  class="form-control" id="product_id" name="product_id" >
						<input type="text" class="form-control" id="name" name="name" placeholder="search" required>
						<ul id="nameList" class="list-group"></ul>
					</div>
					<div class="form-group col-md-3">
						<label for="total_unit">Total unit</label>
						<input type="text" class="form-control" id="total_unit" name="total_unit" placeholder="Total unit" required >
					</div>
					<div class="form-group col-md-3">
						<label for="unit">Unit</label>
						<input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" readonly required>
					</div>
					<div class="form-group col-md-3">
						<label for="name">Net price</label>
						<input type="text" class="form-control" id="net_price" name="net_price" placeholder="Net price"required >
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="markup">Markup %</label>
						<input type="text" class="form-control" id="markup" name="markup" placeholder="Markup %" readonly required >
					</div>

					<div class="form-group col-md-4">
						<label for="unit_price">Per unit price</label>
						<input type="text" class="form-control" id="unit_price" name="unit_price" placeholder="Unit price" readonly required >
					</div>
					<div class="form-group col-md-4">
						<label for="sales_price">Sales price</label>
						<input type="text" class="form-control" id="sales_price" name="sales_price" placeholder="Sales price" readonly required>
					</div>
				</div>
				<button class="btn btn-primary " type="submit" id="submit">Submit</button>
				<div class="invalid-feedback" id="error" >
					Invalid data in form
				</div>
				<div class="valid-feedback" id="success" ></div>
			</form>
		</div>

	</body>
<html>