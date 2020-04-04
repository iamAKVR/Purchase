<?php

namespace App\Services;
use App\Models\Product;
use App\Models\ProductMarkUp;
use App\Models\ProductSales;
use Illuminate\Support\Arr;

class ProductServices
{

    /**
	 *
	 * search product
	 *
	 * @param    
	 * @return   array
	 *
	*/
    public function search($key){
        return Product::select('id','name','unit')->where('name', 'LIKE', "%$key%")->get();
    }

    /**
	 *
	 * get product markup percentage
	 *
	 * @param    
	 * @return   array
	 *
	*/
    public function getMarkUpPercentage($product_id,$net_price){
        return ProductMarkUp::select('markup')->where('product_id', $product_id)->where('min_amount', '<=' ,$net_price)->where('max_amount', '>=' ,$net_price)->first();
    }

    /**
	 *
	 * get product markup percentage
	 *
	 * @param    
	 * @return   array
	 *
	*/
    public function setPurchase($product){
        return ProductSales::insert($product);
    }

    /**
	 *
	 * get product sales list
	 *
	 * @param    
	 * @return   array
	 *
	*/
    public function getPurchaseList(){ 
        return ProductSales::groupBy('product_id')->orderBy('created_at', 'DESC')->get();
    }


}