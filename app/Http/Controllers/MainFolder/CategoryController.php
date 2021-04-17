<?php

namespace App\Http\Controllers\MainFolder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\categorie;
class CategoryController extends Controller
{   
    public function GetAllCategory(){
        
         $category = categorie::all();
         return $category;

    }
    public function AddCategory(Request $request){
          $validation = $request->validate([
              'name'=>'required'
          ]);
          $data = array();
          $data['name'] = $request->name;
          $data['description'] = $request->description;
          DB::table('categories')->insert($data);
    }

    public function EditCategory($id){
        $editCategory = categorie::where('id',$id)->first();
        return $editCategory;
    }

    public function UpdateCategory(Request $request,$id){
         $data = array();
         $data['name'] = $request->name;
         $data['description'] = $request->description;
         DB::table('categories')->where('id',$id)->update($data);
    }


    public function deleteCategory($id){
         $deleteCategory = categorie::where('id',$id)->first();
         $deleteCategory->delete();
    }
}
