<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function addProduct(){
    	$categories = Category::all()->where('publicationStatus', '=', '1');
    	return view('admin.product.add-product',['category' => $categories]);
    }

    public function insertProduct(Request $req){
    	//dd($req->all());
    	
    	// $picInfo = $req->file('product_pic');
    	// $picName = $picInfo->getClientOriginalName();
    	// $folder = "admin/uploadedPic/";
    	// $picInfo->move($folder,$picName);
    	// $picPath = $folder.$picName;
        $this->validate($req,[
            'product_pic' => 'required|mimes:jpeg,png,jpg',

        ]);
        
    	$product = new Product();
    	$product->productName = $req->product_name;
    	$product->price = $req->product_price;
    	$product->qty = $req->product_qty;
    	$product->categoryId = $req->cat_id;
    	$product->productDescription = $req->Product_description;
    	$product->productPic = 'pic';
    	$product->pbStatus = $req->pb_status;

    	$product->save();

    	$lastId = $product->id;

    	$picInfo = $req->file('product_pic');
    	$picName = $picInfo->getClientOriginalName();
    	$pictureName = $lastId.$picName;

    	$folder = "admin/uploadedPic/";
    	$picInfo->move($folder,$pictureName);
    	$picPath = $folder.$pictureName;

    	$picUpdate = Product::find($lastId);
    	$picUpdate->productPic = $picPath;
    	$picUpdate->save();

    	return redirect('/all/product');
        
    }

    public function productShow(Request $x){
    	// dd($x->product_type);
    	$products = DB::table('products')
    				->join('categories','categories.id','=','categoryId')
    				->select('products.*','categories.*',
    					'products.id as p_id',
    					'categories.id as c_id',
    					'products.pbStatus as p_status')
    				// ->where('products.pbStatus','=','1')
    				->paginate(20);


    	return view('admin.product.all-product',['all_product' => $products]);
    }

    public function productStatus($id){
        $productSelect = Product::where('id',$id)->first();
        
        if ($productSelect->pbStatus == 1) {
            $pbs = 0;
        }
        else{
            $pbs = 1;
        }
        $productStatusUpdate = Product::find($productSelect->id);
        $productStatusUpdate->pbStatus = $pbs;
        $productStatusUpdate->save();

        return redirect()->back();
    }

    public function singleView($p_id){

        $product = DB::table('products')
                    ->join('categories','categories.id','=','categoryId')
                    ->select('products.*','categories.*',
                        'products.id as p_id',
                        'categories.id as c_id',
                        'products.pbStatus as p_status')
                    ->where('products.id','=',$p_id)
                    ->first();


        return view('admin.product.single-product',['single_product' => $product]);
    }

    public function productEdit($pid)
    {
        $productEdit = DB::table('products')
                    ->join('categories','categories.id','=','categoryId')
                    ->select('products.*','categories.*',
                        'products.id as p_id',
                        'categories.id as c_id',
                        'products.pbStatus as p_status')
                    ->where('products.id','=',$pid)
                    ->first();

        $category = Category::all()->where('publicationStatus', '=', '1');

        return view('admin.product.edit-product',['pro_Edit' => $productEdit, 'categories' => $category]);
    }

    public function productUpdate(Request $req)
    {
        $productUpdate = Product::find($req->pro_id);

        $productUpdate->productName = $req->product_name;
        $productUpdate->price = $req->product_price;
        $productUpdate->qty = $req->product_qty;
        $productUpdate->categoryId = $req->cat_id;
        $productUpdate->productDescription = $req->Product_description;
        $productUpdate->pbStatus = $req->pb_status;

        $productUpdate->save();

        if ($picInfo = $req->file('product_pic')) {
            $picEdit = DB::table('products')
                    // ->join('categories','categories.id','=','categoryId')
                    ->select('productPic')
                    ->where('products.id','=',$req->pro_id)
                    ->first();

            if (file_exists($picEdit->productPic)) {
                unlink($picEdit->productPic);
            }

            $picName = $picInfo->getClientOriginalName();
            $pictureName = $req->pro_id.$picName;

            $folder = "admin/uploadedPic/";
            $picInfo->move($folder,$pictureName);
            $picPath = $folder.$pictureName;

            $productUpdate = Product::find($req->pro_id);
            $productUpdate->productPic = $picPath;
            $productUpdate->save();

            return redirect('/all/product')->with('message', 'Product Updated successfully !');

        }

    }

    public function productDelete($d_id)
    {
        $picDelete = DB::table('products')
                    // ->join('categories','categories.id','=','categoryId')
                    ->select('productPic')
                    ->where('products.id','=',$d_id)
                    ->first();

        if (file_exists($picDelete->productPic)) {
            unlink($picDelete->productPic);
        }

        $productDelete = Product::find($d_id);
        $productDelete->delete();

        return redirect('/all/product')->with('message', 'Product Deleted successfully !');
    }

}
