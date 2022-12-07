<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        $this->product = new Product();
    }

    public function index(){
        $dssanpham = $this->product->getAllProduct();
        return response()->json([
            'data' => $dssanpham,
        ]);
    }

    public function apisanpham($id){
        $sanpham = $this->product->getProduct($id);
        return response()->json([
            'data' => $sanpham,
        ]);
    }

    public function viewindex(){
        $title = 'Sản Phẩm';
        return view('admin.sanpham', compact('title'));
    }

    public function themsp(){
        $title = 'Thêm sản Phẩm';
        return view('admin.themsanpham', compact('title'));
    }

    public function them(Request $request){
        $sanpham = [
            $request->tensanpham,
            $request->danhmuc,
            $request->thuonghieu,
            $request->soluong,
            $request->gia,
            $request->mota,
            $request->avatar,
        ];
        $this->product->insertProduct($sanpham);
        return redirect()->route('sanpham');
    }

    public function suasp($id){
        $title = 'Sửa sản Phẩm';
        return view('admin.suasanpham', compact('title'));
    }

    public function sua(Request $request, $id){
        $request->avatar ?
        $sanphamnew = [
            $request->tensanpham,
            $request->danhmuc,
            $request->thuonghieu,
            $request->soluong,
            $request->gia,
            $request->mota,
            $request->avatar,
            $request->_token,
        ] :  
            $sanphamnew = [
            $request->tensanpham,
            $request->danhmuc,
            $request->thuonghieu,
            $request->soluong,
            $request->gia,
            $request->mota,
            $request->uploadImg,
            $request->_token,
        ];
        $this->product->updateProduct($sanphamnew, $id);
        return redirect()->route('sanpham');
    }

    public function xoa($id){
        $this->product->deleteProduct($id);
        return redirect()->route('sanpham');
    }

    public function index1(){
        return view('clients.home');
    }
}
