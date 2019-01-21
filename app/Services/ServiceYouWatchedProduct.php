<?php
namespace App\Services;


use App\Models\YouWatchedProduct;
use App\Tools\Helpers;

class ServiceYouWatchedProduct
{

    private $model;

    public function __construct()
    {
        $this->model = new YouWatchedProduct();
    }

    public function youWatchedProduct(int $product_id)
    {
        if(!$this->model::where('product_id', $product_id)->searchVisitNumber()->first())
        {
            $this->model::create([
                'product_id'   => $product_id,
                'visit_number' => Helpers::getVisitNumber()
            ]);
            return true;
        }
        return false;
    }

    public function listProducts()
    {
        $products = [];
        $youWatchedProducts = $this->model::searchVisitNumber()->with(['product' => function($query){
                                    $query->productInfoWith();
                              }])->OrderBy('id', 'DESC')->get();

        foreach ($youWatchedProducts as $item)
        {
            if(isset($item->product))
                $products[] = $item->product;
        }

        return $products;
    }

}