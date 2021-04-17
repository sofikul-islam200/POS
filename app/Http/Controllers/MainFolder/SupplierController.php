<?php

namespace App\Http\Controllers\MainFolder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Image;
use DB;
class SupplierController extends Controller
{   
    public function getSupplier(){
        $getSupplier = Supplier::all();
        return $getSupplier;
    }
    public function AddSupplier(Request $request){
        
        $validation = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'shop_name'=>'required',
            'address'=>'required'
        ]);
        if($request->shop_photo){
             $strpos = strpos($request->shop_photo,";");
             $substr = substr($request->shop_photo, 0, $strpos);
             $exple  = explode('/', $substr)[1];
             $time = time().".".$exple;
             $image = Image::make($request->shop_photo)->resize(300, 200);
             $upload_path = "backend/supplier_images/";
             $main_image = $upload_path.$time;
             $image->save($main_image);
             $insert_data = new Supplier();
             $insert_data->name = $request->name;
             $insert_data->gmail = $request->email;
             $insert_data->phone = $request->phone;
             $insert_data->address = $request->address;
             $insert_data->shop_name = $request->shop_name;
             $insert_data->shop_photo = $main_image;
             $insert_data->save();
             
        }else{
            $insert_w_photo = new Supplier();
            $insert_w_photo->name = $request->name;
            $insert_w_photo->gmail = $request->email;
            $insert_w_photo->phone = $request->phone;
            $insert_w_photo->address = $request->address;
            $insert_w_photo->shop_name = $request->shop_name;
            $insert_w_photo->save();
        }

       


    }
    public function EditSupplier($id){
        $supplier = Supplier::where('id',$id)->first();
        return $supplier;
    }



    public function UpdateSupplier(Request $request,$id){
        $data = array();
        $data['name'] = $request->name;
        $data['gmail'] = $request->gmail;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop_name'] = $request->shop_name;
        if($request->new_shop_photo){
             $strpos = strpos($request->new_shop_photo,";");//14
             $substr = substr($request->new_shop_photo,"0",$strpos);
             $explod = explode('/',$substr)[1];
             $time = time().".".$explod;
             $image = Image::make($request->new_shop_photo)->resize(300, 200);
             $upload_path2 = "backend/supplier_images/";
             $main_image2 = $upload_path2.$time;
             $is_saved = $image->save($main_image2);
             if($is_saved){
                 $data['shop_photo'] = $main_image2;
                 $old_photo = DB::table('suppliers')->where('id',$id)->first();
                 unlink($old_photo->shop_photo);
                 DB::table('suppliers')->where('id',$id)->update($data);
             }
  
        }else{
           $data['shop_photo'] = $request->shop_photo;
           DB::table('suppliers')->where('id',$id)->update($data);
        }
    }





    public function DeleteSupplier($id){
        $image = DB::table('suppliers')->where('id',$id)->first();
        if($image){
            $img = Supplier::find($id);
            $img->delete();
            unlink($image->shop_photo);
        }else{
            $img2 = Supplier::find($id);
            $img2->delete();
        }
    }





}
