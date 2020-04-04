<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddFormRequest;
use App\Services\ProductServices;
use Response;

class ProductController extends Controller
{
    public function __construct(){
        $this->ProductServices = new ProductServices();
    }

    /**
	 *
	 * search product
	 *
	 * @param    Request object
	 * @return   array
	 *
	*/
    public function productsSearch(Request $request){
        $validatedData = $request->validate([
            'key' => 'required',
        ]);

        $data = $this->ProductServices->search($request->key);
        return Response::json([
            'status'  => 1,
            'message' => 'Product search',
            'data' => $data,
        ]);

    }

    /**
	 *
	 * get markup of product
	 *
	 * @param    Request object
	 * @return   array
	 *
    */
    public function getMarkUp(Request $request){
        $validatedData = $request->validate([
            'product_id' => 'required',
            'per_unit_price' => 'required'
        ]);

        $response = $this->ProductServices->getMarkUpPercentage($request->product_id,$request->per_unit_price);

        return Response::json([
            'status'  => 1,
            'message' => 'Get product markup',
            'data' => $response,
        ]);
    }

    /**
	 *
	 * insert product sales 
	 *
	 * @param    Request object
	 * @return   array
	 *
    */
    public function setProductSale(AddFormRequest $request){
       return Response::json([
        'status'  => 1,
        'message' => 'Product purchase added successfully.',
        'data' => $this->ProductServices->setPurchase($request->all()),
        ]);

    }

}
