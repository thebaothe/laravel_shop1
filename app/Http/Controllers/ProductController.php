<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService2;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService2 $productService)
    {
        $this->productService = $productService;
    }

    public function index($id='',$slug='')
    {
        $product = $this->productService->show($id);
        return view('products.content',[
            'title'=> $product->name,
            'product'=>$product
        ]);
    }
}
