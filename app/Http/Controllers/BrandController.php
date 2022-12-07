<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    public function __construct(){
        $this->brand = new Brand();
    }

    public function index(){
        $thuonghieu = $this->brand->getAllThuongHieu();
        return response()->json([
            'data' => $thuonghieu,
        ]);
    }

    public function apithuonghieu($id){
        $thuonghieu = $this->brand->getBrand($id);
        return response()->json([
            'data' => $thuonghieu,
        ]);
    }

    public function viewthuonghieu(){
        $title = 'Thương hiệu';
        return view('admin.thuonghieu', compact('title'));
    }

    public function themth(){
        $title = 'Thêm thương hiệu';
        return view('admin.themthuonghieu', compact('title'));
    }

    public function them(Request $request){
        $thuonghieu = [
            $request->tenthuonghieu,
        ];
        $this->brand->insertBrand($thuonghieu);
        return redirect()->route('thuonghieu');
    }

    public function suath($id){
        $title = 'Sửa thương hiệu';
        return view('admin.suathuonghieu', compact('title'));
    }

    public function sua(Request $request, $id){
        $thuonghieunew = [
        $request->tenthuonghieu,
    ];
    $this->brand->updateBrand($thuonghieunew, $id);
    return redirect()->route('thuonghieu');
    }

    public function xoa($id){
        $this->brand->deleteBrand($id);
        return redirect()->route('thuonghieu');
    }
}
