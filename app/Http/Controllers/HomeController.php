<?php

namespace App\Http\Controllers;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->ProductServices = new ProductServices();
    }

    /**
	 *
	 * product sales add  page
	 *
	 * @param    Request object
	 * @return   array
	 *
    */
    public function index(){
        return view('purchase/index');
    }

    /**
	 *
	 * product sales list  page
	 *
	 * @param    Request object
	 * @return   array
	 *
    */
    public function purchaseList() {
        $products = $this->ProductServices->getPurchaseList(); 
        return view('purchase/list',["products"=>$products]);
    }

}
