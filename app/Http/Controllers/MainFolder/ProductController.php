<?php

namespace App\Http\Controllers\MainFolder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\categorie;
use DB;
use Image;
use App\Model\Product;
class ProductController extends Controller
{
      public function showCategory(){
          $category = DB::table('categories')->get();
          return $category;  
      }

      public function showSupplier(){
           $supplier = DB::table('suppliers')->get();
           return $supplier;
      }


      public function getProduct(){
           $product = DB::table('products')->get();
           return response()->json($product);
      }


      public function AddProduct(Request $request){
          $validation = $request->validate([
               'product_name'=>'required',
               'product_code'=>'required',
               'category_id'=>'required',
               'supplier_id'=>'required',
               'buying_price'=>'required',
               'selling_price'=>'required',
               'buying_date'=>'required',
               'root'=>'required',
               'product_quantity'=>'required',
               'image'=>'required'
          ]);
         
          $data = array();
          $data['product_name'] = $request->product_name;
          $data['product_code'] = $request->product_code;
          $data['root'] = $request->root;
          $data['buying_price'] = $request->buying_price;
          $data['selling_price'] = $request->selling_price;
          $data['category_id'] = $request->category_id;
          $data['supplier_id'] = $request->supplier_id;
          $data['buying_date'] = $request->buying_date;
          $data['product_quantity'] = $request->product_quantity;
          if($request->image){
                $strpos = strpos($request->image,";");
                $substr = substr($request->image,0,$strpos);
                $explode = explode('/',$substr)[1];
                $time = time().".".$explode;
                $image = Image::make($request->image)->resize(300, 250);
                $upload_path = "backend/product_images/";
                $main_images  = $upload_path.$time;
                $image->save($main_images);
                $data['image'] = $main_images;
             DB::table('products')->insert($data);
          }

      }
   
      public function deleteProduct($id){
           $d_product = DB::table('products')->where('id',$id)->first();
           unlink($d_product->image);
           DB::table('products')->where('id',$id)->delete();
      }










}
