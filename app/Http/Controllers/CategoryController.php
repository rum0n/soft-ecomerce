<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function categoryAdd(){
        return view('admin.category.category-add');
    }

    public function categoryEntry(Request $req){
    	// return $req -> all();
    	// dd($req -> all());

    	// $category = new Category();

    	// $category->catName = $req->cat_name;
    	// $category->catDescription = $req->cat_description;
    	// $category->publicationStatus = $req->pb_status;

    	// $category->save();

    	// return 'Category Inserted successfully !';
    	// return redirect()->back();
    	// return redirect('/category/add')->with('message', 'Category Inserted successfully !');
    	// return redirect()->back()->with('message', 'Category Inserted successfully !');

    	DB::table('categories')->insert([
    		'catName' => $req->cat_name,
    		'catDescription' => $req->cat_description,
    		'publicationStatus' => $req->pb_status,
    	]);
    	return redirect('/category/show')->with('message', 'Category Inserted successfully !');
    }

    public function categoryShow(){
    	$category = DB::table('categories')->paginate(5);
    	// dd($category);
    	return view('admin.category.category-show', ['cat_show' => $category]);
    }

    public function categoryEdit($edit_id){
    	$categoryById = Category::where('id',$edit_id)->first();
    	return view('admin.category.category-edit', ['category_id' => $categoryById]);
    }

    public function categoryUpdate(Request $request){
    	// dd($request->all());
        $category = Category::find($request->cat_id);

        $category->catName = $request->cat_name;
        $category->catDescription = $request->cat_description;
        $category->publicationStatus = $request->pb_status;

        $category->save();

        return redirect('/category/show')->with('message', 'Category Updated successfully !');
    }

    public function categoryDelete($del_id){
        $cat_del = Category::find($del_id);

        $cat_del->delete();

        return redirect('/category/show')->with('message', 'Category Deleted successfully !');
    }

    public function categoryPBS($id){
        $categorySelect = Category::where('id',$id)->first();
        if ($categorySelect->publicationStatus == 1) {
            $pbs = 0;
        }
        else{
            $pbs = 1;
        }
        $categoryStatusUpdate = Category::find($categorySelect->id);
        $categoryStatusUpdate->publicationStatus = $pbs;
        $categoryStatusUpdate->save();

        return redirect()->back();
    }

}
