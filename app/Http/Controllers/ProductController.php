<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use DB; 

class ProductController extends Controller
{

//các chức năng trang sản phẩm
    public function list(Request $request){
        $items = ProductModel::join('category','category.cate_ID','=','product.cate_ID',)->get();
        return view('product_list',['items'=>$items]);
        // print_r($users);
    }
    public function show($ID){
        $item = ProductModel::where('product_ID',$ID)->get();
        $categories = CategoryModel::all();
        return view('product_info',['item'=>$item,'categories'=>$categories]);
    }
    public function delete($ID){
        $rs = ProductModel::where('product_ID',$ID)->delete();
        $category = CategoryModel::all();
        return redirect()->to('/danh-sach-san-pham');
    }
    public function update(Request $request){
        $ID =$request -> input("txt_id");
        $name = $request->input("txt_name");
        $description = $request->input("txt_des");
        $category = $request -> input('txt_cate');
        $price = $request->input("txt_price");
        $quantity = $request->input("txt_quantity");
        if(!$request->hasFile('txt_img')){
            $img=$request->input("txt_img_old");
        }else{
            $image = $request->file('txt_img');
            $storedPath = $image->move(public_path('images'), $image->getClientOriginalName());
            $img='/images/'.$image->getClientOriginalName();
        }
        ProductModel::where('product_ID',$ID)->update(['product_name'=>$name,'product_des'=>$description,'product_img'=>$img,'cate_ID'=>$category,'product_price'=>$price,'product_quantity'=>$quantity]);
        return redirect()->to('/danh-sach-san-pham');
    }
    public function add(){
        $categories = CategoryModel::all();
        return view("add_product",['categories'=>$categories]);
    }
    public function save(Request $request){
        $name = $request->input("txt_name");
        $description = $request->input("txt_des");
        $category = $request->input("txt_cate");
        $price = $request->input("txt_price");
        $quantity = $request->input("txt_quantity");
        if(!$request->hasFile('txt_img')){
            return "vui lòng thêm ảnh";
        }else{
            $image = $request->file('txt_img');
            $storedPath = $image->move(public_path('images'), $image->getClientOriginalName());
            $img='/images/'.$image->getClientOriginalName();
        }
        ProductModel::insert(['product_name'=>$name,'product_des'=>$description,'product_img'=>$img,'cate_ID'=>$category,'product_price'=>$price,'product_quantity'=>$quantity]);
        //CategoryModel::insert(['cate_name'=>$name,'cate_des'=>$description]);

        return redirect()->to('danh-sach-san-pham');
    }
}
