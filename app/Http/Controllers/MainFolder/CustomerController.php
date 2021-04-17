<?php

namespace App\Http\Controllers\MainFolder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\customer;
use Image;
use DB;
class CustomerController extends Controller
{   
    public function allCustomer (){
        $allCustomer = customer::get();
        return $allCustomer;
    }
    public function addCustomer(Request $request){
        $validation = $request->validate([
            'name' =>'required',
            'phone'=>'required',
            'email'=>'required|unique:customers',
            'current_address'=>'required',
            'country'=>'required'
        ]);
        if($request->photo){
        $data = array();
        $data['name'] = $request->name;
        $data['phone']= $request->phone;
        $data['email']= $request->email;
        $data['current_address'] = $request->current_address;
        $data['country'] = $request->country;
           //photo upload code here  
           $strpos = strpos($request->photo,";");
           $substr = substr($request->photo,0,$strpos);
           $explode = explode('/',$substr)[1];
           $time = time().".".$explode;
           $image = Image::make($request->photo)->resize(300, 200);
           $upload_path = "backend/customer_images/";
           $main_image = $upload_path.$time;
           $image->save($main_image);
           //end photo upload code 
        $data['photo'] = $main_image;   
        DB::table('customers')->insert($data);   
        }else{
           $addCustomer = new customer();
           $addCustomer->name = $request->name;
           $addCustomer->phone = $request->phone;
           $addCustomer->current_address = $request->current_address;
           $addCustomer->email = $request->email;
           $addCustomer->country = $request->country;
           $addCustomer->save();
        }

    
    }

    public function ViewSingleCustomer($id){
         $single_customer_get  = customer::where('id',$id)->first();
         return $single_customer_get;
    }

    public function EditCustomer($id){
        $single_customer_get_edit  = customer::where('id',$id)->first();
        return $single_customer_get_edit;
    }


    public function UpdateCustomer(Request $request,$id){
         $validation = $request->validate([
             'name'=>'required',
             'phone'=>'required',
             'email'=>'email|required',
             'country'=>'required',
             'current_address'=>'required'

         ]);
         $data = array();
         $data['name'] = $request->name;
         $data['email'] = $request->email;
         $data['phone'] = $request->phone;
         $data['country'] = $request->country;
         $data['current_address'] = $request->current_address;
         
         if($request->NewPhoto){
            $strpos2 = strpos($request->photo,";");
            $substr2 = substr($request->NewPhoto,0,$strpos2);
            $explode2 = explode("/",$substr2)[1];
            $time = time().".".$explode2;
            $image = Image::make($request->NewPhoto)->resize(300, 200);
            $upload_path2 = "backend/customer_images/";
            $original_image = $upload_path2.$time;
            $success = $image->save($original_image);
            if($success){
                $data['photo'] = $original_image;
                $prevImage = DB::table('customers')->where('id',$id)->first();
                unlink($prevImage->photo);
                DB::table('customers')->where('id',$id)->update($data);
            }

         }else{
            $oldphoto = $request->photo;
            $data['photo'] = $request->$oldphoto;
            DB::table('customers')->where('id',$id)->update($data);
         }
    }
    
    public function DeleteSingleCustomer($id){
         $single_customer = DB::table('customers')->where('id',$id)->first();
         if($single_customer->photo){
            $delete = customer::find($id);
            $delete->delete();
            unlink($single_customer->photo);
             
         }else{
            $delete = customer::find($id);
            $delete->delete();
         }
         
    }




}
