<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
//        $categories = Category::where('publicationStatus',1)->get();

        $products = Product::where('pbStatus',1)->inRandomOrder()->take(10)->get();

        return view('frontEnd.home.homeContent',['products' =>$products ]);

//      return view('frontEnd.home.homeContent',['all_categories' => $categories,'products' =>$products ]);
    }


    public function catProduct($id)
    {
//        $products = DB::table('products')
//            ->join('categories','categories.id','=','categoryId')
//            ->select('products.*','categories.*',
//                'products.id as p_id',
//                'categories.id as c_id',
//                'products.pbStatus as p_status')
//             ->where('products.pbStatus',1)
//             ->where('categories.id',$id)
//            ->get();
        $products = Product::where('pbStatus',1)->inRandomOrder()->take(10)->get();

        return view('frontEnd.product.cat-product',['all_product' => $products]);
    }

    public function singleProduct($id)
    {
        $products = DB::table('products')
            ->join('categories','categories.id','=','categoryId')
            ->select('products.*','categories.*',
                'products.id as p_id',
                'categories.id as c_id',
                'products.pbStatus as p_status')
             ->where('products.id',$id)
            ->first();
        $cat_id = $products->c_id;

        $related_products = DB::table('products')
            ->join('categories','categories.id','=','categoryId')
            ->select('products.*','categories.*',
                'products.id as p_id',
                'categories.id as c_id',
                'products.pbStatus as p_status')
            ->where('categoryId',$cat_id)
            ->where('products.id','!=',$id)
            ->inRandomOrder()
            ->take(6)
            ->get();

//        $related_products = Product::where('categoryId',$cat_id)->inRandomOrder()->take(4)->where('products.id','!=',$id)->get();

        return view('frontEnd.product.single-product',['singlePro' => $products,'rel_products' => $related_products]);
    }

}
