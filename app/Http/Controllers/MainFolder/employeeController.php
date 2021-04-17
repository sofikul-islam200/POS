<?php

namespace App\Http\Controllers\MainFolder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\employee;
use Image;
use DB;
class employeeController extends Controller
{     
      public function GetAll_Employe(){
            $allEmployee = employee::orderBy('id','DESC')->get();
            return $allEmployee;
      }
      public function Store_Employee(Request $request)
      {
            $validation = $request->validate([
                  'name' => 'required',
                  'phone' => 'required|max:11|unique:employees',
                  'email' => 'required|email|unique:employees',
                  'address' => 'required',
                  'nid_number' => 'required',
                  'sallary' => 'required',
                  'j_date' => 'required'
            ]);
            if ($request->photo) {
                  $position = strpos($request->photo, ';');
                  $substr = substr($request->photo, 0, $position);
                  $explode = explode('/', $substr)[1];
                  $time = time() . "." . $explode;
                  $image = Image::make($request->photo)->resize(300, 200);
                  $upload_path = "backend/employee_images/";
                  $main_name = $upload_path . $time;
                  $image->save($main_name);
                  $employe = new employee;
                  $employe->name = $request->name;
                  $employe->phone = $request->phone;
                  $employe->j_date = $request->j_date;
                  $employe->nid_number = $request->nid_number;
                  $employe->sallary = $request->sallary;
                  $employe->photo = $main_name;
                  $employe->address = $request->address;
                  $employe->email = $request->email;
                  $employe->save();
            } else {
                  $employe = new employee();
                  $employe->name = $request->name;
                  $employe->phone = $request->phone;
                  $employe->j_date = $request->j_date;
                  $employe->nid_number = $request->nid_number;
                  $employe->sallary = $request->sallary;
                  $employe->address = $request->address;
                  $employe->email = $request->email;
                  $employe->save();
            }
      }


      //show single employee information 

      public function View_Employee ($id){
             $s_employe = employee::where('id',$id)->first();
             return $s_employe;
      }


      //edit employee code 
      
      public function __Edit_Employee($id){
            $edit_employee = employee::where('id',$id)->first();
            return $edit_employee;
      }


      public function Update_Employee(Request $request,$id){
            $validation = $request->validate([
                  'name' => 'required',
                  'phone' => 'required|max:11',
                  'email' => 'required|email',
                  'address' => 'required',
                  'nid_number' => 'required',
                  'sallary' => 'required',
                  'j_date' => 'required'
            ]);
            $data = array();
            $data['name'] = $request->name;
            $data['phone'] = $request->phone;
            $data['sallary'] = $request->sallary;
            $data['email'] = $request->email;
            $data['address'] = $request->address;
            $data['j_date'] = $request->j_date;
            $data['nid_number'] =$request->nid_number;
            $image = $request->newPhoto;
            if($image){
               $strpos = strpos($image,";");
               $subs = substr($image,0,$strpos);
               $explo = explode('/',$subs)[1];
               $time = time().".".$explo;
               $image = Image::make($image)->resize(300, 200);
               $upload_pathe = "backend/employee_images/";
               $main_image = $upload_pathe.$time;
               $success =  $image->save($main_image);
               if($success){
                     $data['photo'] = $main_image;
                     $un_image = DB::table('employees')->where('id',$id)->first();
                     unlink($un_image->photo);
                     DB::table('employees')->where('id',$id)->update($data);
               }
            }else{
               $old_image = $request->photo;
               $data['photo']= $old_image;
               DB::table('employees')->where('id',$id)->update($data);
            }
 
      }







      public function delete_Employee ($id){
              $deleted = employee::where('id',$id)->first();
              $photo =  $deleted->photo;
              if($photo){
                    unlink($photo);
                    $deleted->delete();
              }else{
                   $deleted->delete();
              }
      }



   

      

      
}
