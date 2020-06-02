<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index(){
        $categorys = Category::all();
        return view("category.index",compact("categorys"));
    }
    public function new(){
        return view("category.edit");
    }
    public function newstore(Request $request){
        $name = $request->input("name");
        $obj = Category::where("name",'=',$name)->get();
        if(count($obj)>0){
            $msg ="此类别已存在，您不能在添加相同的类别！";
        }else{
            $obj = new Category();
            $obj->name = $name;
            $obj->introduction = $request->input("introduction");
            $obj->save();
            $msg="添加成功！";
        }
        return $msg;
    }

    public function edit(Category $category){
        return  view("category.update",compact('category'));
    }
    public function editstore(Request $request){
        $obj = Category::find($request->input("id"));
        $obj->name = $request->input("name");
        $obj->introduction = $request->input("introduction");
        $obj->save();
        $msg="修改成功！";
        return $msg;
    }
    public function delete(Category $category){
        $category->delete();
        return back();
    }
}
