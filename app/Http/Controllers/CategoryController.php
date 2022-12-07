<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function __construct(){
        $this->category = new Category();
    }

    public function index(){
        $danhmuc = $this->category->getAllDanhMuc();
        return response()->json([
            'data' => $danhmuc,
        ]);
    }

    public function apidanhmuc($id){
        $danhmuc = $this->category->getCategory($id);
        return response()->json([
            'data' => $danhmuc,
        ]);
    }

    public function viewdanhmuc(){
        $title = 'Danh Mục';
        return view('admin.danhmuc', compact('title'));
    }

    public function themdm(){
        $title = 'Thêm danh mục';
        return view('admin.themdanhmuc', compact('title'));
    }

    public function them(Request $request){
        $danhmuc = [
            $request->tendanhmuc,
        ];
        $this->category->insertCategory($danhmuc);
        return redirect()->route('danhmuc');
    }

    public function suadm($id){
        $title = 'Sửa danh mục';
        return view('admin.suadanhmuc', compact('title'));
    }

    public function sua(Request $request, $id){
            $danhmucnew = [
            $request->tendanhmuc,
        ];
        $this->category->updateCategory($danhmucnew, $id);
        return redirect()->route('danhmuc');
    }

    public function xoa($id){
        $this->category->deleteCategory($id);
        return redirect()->route('danhmuc');
    }
}
