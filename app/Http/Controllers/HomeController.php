<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->search = new Search();
        $this->cart = new Cart();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Trang Chủ';
        return view('clients.home', compact('title'));
        
    }

    public function apisanphamtheodanhmuc($slug){
        $search = $this->search->getProductByCate($slug);
        return response()->json([
            'data' => $search,
        ]);
    }

    public function apisanphamtheothuonghieu($slug){
        $search = $this->search->getProductByBrand($slug);
        return response()->json([
            'data' => $search,
        ]);
    }

    public function apilocsanpham($slug1,$slug2){
        $search = $this->search->getProductByBrandAndCate($slug1,$slug2);
        return response()->json([
            'data' => $search,
        ]);
    }

    public function apiloctheoten($slug){
        $search = $this->search->getProductByName($slug);
        return response()->json([
            'data' => $search,
        ]);
    }

    public function apilaygiohang($id){
        $cart = $this->cart->getCart($id);
        return response()->json([
            'data' => $cart,
        ]);
    }


    public function searchTH($slug){
        $title = 'Tìm kiếm';
        return view('clients.search', compact('title','slug'));
    }

    public function searchDM($slug){
        $title = 'Tìm kiếm';
        return view('clients.search', compact('title','slug'));
    }

    public function search($slug){
        $title = 'Tìm kiếm';
        return view('clients.search', compact('title','slug'));
    }

    public function search2(Request $request){
        $title = 'Tìm kiếm';
        return view('clients.search', compact('title'));
        
    }

    public function addcart(Request $request){
        $tt = [
            Auth::user()->id,
            $request->ctmasp,
        ];
        $this->cart->inserttoCart($tt);
        return back();
    }

    public function cart(){
        $title = 'Giỏ Hàng';
        return view('clients.cart', compact('title'));
    }

    public function xoaspgh($id){
        $data=[
            $id,
            Auth::user()->id,
        ];
        $this->cart->deleteProductCart($data);
        return redirect()->route('cart');
    }

    public function buy(Request $request){
        $data=[
            Auth::user()->id,
        ];
        $data1=[
            Auth::user()->id,
            $request->thanhtien1,
            1,
        ];
        $this->cart->chitiethoadon($data);
        //$this->cart->addBill($data1);
        //$this->cart->deleteAllCart($data);
        return back();
    }
}
