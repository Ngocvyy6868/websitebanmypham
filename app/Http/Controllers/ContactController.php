<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactModel;
use DB; 

class ContactController extends Controller
{
    public function view(){
        return view('contact');
        // print_r($users);
    }
    public function list(Request $request)
    {
        $contacts = ContactModel::all(); // Lấy tất cả các bản ghi
        return view('contact_list', ['contacts' => $contacts]);
    }
    
    
    public function delete($ID){
        $rs = ContactModel::where('contact_ID', $ID)->delete();
        return redirect()->to('/danh-sach-lien-he');
    }
    // public function update(Request $request)
    // {
    //     $ID = $request->input("txt_id");
    //     $name = $request->input("txt_username");
    //     $fullname = $request->input("txt_fullname");
    //     UserModel::where('ID', $ID)->update(['username' => $name,'fullname' => $fullname ]);

    //     return redirect()->to('/danh-sach-nguoi-dung');
    // }
    //     public function add(){
    //     return view("add_user");
    // }
    public function save(Request $request){
        $name = $request->input("txt_name"); // Corrected input name
        $phone = $request->input("txt_phone");
        $email = $request->input("txt_email");
        $message = $request->input("txt_message");
        ContactModel::insert(['contact_name'=>$name,'contact_phone'=>$phone,'contact_email'=>$email, 'contact_message'=>$message]);
        //CategoryModel::insert(['cate_name'=>$name,'cate_des'=>$description]);

        return redirect()->to('hien-thi-san-pham');
    }
}
