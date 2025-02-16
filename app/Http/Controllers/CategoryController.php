<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use DB; 

class CategoryController extends Controller
{
    public function list(Request $request){
        $items = CategoryModel::all();
        return view('cate_list',['items'=>$items]);
        print_r($users);
    }
    public function show($ID){
        $item = CategoryModel::where('cate_ID',$ID)->get();
        return view('cate_info',['item'=>$item]);
    }
    public function delete($ID){
        $rs = CategoryModel::where('cate_ID',$ID)->delete();

        return redirect()->to('/danh-sach-danh-muc');
    }
    public function update(Request $request){
        $ID =$request -> input("txt_id");
        $name = $request->input("txt_name");
        $description = $request->input("txt_des");
        //  print_r($id);print_r($username);print_r($fullname);
        CategoryModel::where('cate_ID',$ID)->update(['cate_name'=>$name,'cate_des'=>$description]);
        return redirect()->to('/danh-sach-danh-muc');
    }
    public function add(){
        return view("add_cate");
    }
    public function save(Request $request){
        $name = $request->input("txt_name");
        $description = $request->input("txt_des");
        CategoryModel::insert(['cate_name'=>$name,'cate_des'=>$description]);
        return redirect()->to('danh-sach-danh-muc');
    }
}
