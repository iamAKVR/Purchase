<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Billing</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
		<script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h2 class="text-center text-uppercase">Automated purchase management system</h2>
                <hr>
                <h3 class="text-center text-uppercase">Product Price Listing</h3>
            </div>
        </div>
        <div class="float-right">
            <a href="{{route('home')}}"><button type="button" class="btn btn-primary">Add Purchase</button></a>
        </div>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Total unit</th>
                <th scope="col">Unit</th>
                <th scope="col">Net price</th>
                <th scope="col">Markup</th>
                <th scope="col">Unit price</th>
                <th scope="col">Sales price</th>
                <th scope="col">Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->total_unit }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->net_price }}</td>
                        <td>{{ $product->markup }}</td>
                        <td>{{ $product->unit_price }}</td>
                        <td>{{ $product->sales_price }}</td>
                        <td>{{ date('M-d-Y h:m a', strtotime($product->created_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


</body>
<html>