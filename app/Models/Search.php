<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Search extends Model
{
    use HasFactory;

    public function getProductByCate($id){
        $sanpham = DB::select('SELECT MaSP, TenSP, san_pham.MaDM, TenDM, san_pham.MaTH, TenTH, Gia, SoLuong, Hinh, MoTa
                                FROM ((san_pham
                                INNER JOIN danh_muc ON san_pham.MaDM = danh_muc.MaDM )
                                INNER JOIN thuong_hieu ON san_pham.MaTH = thuong_hieu.MaTH)
                                WHERE san_pham.MaDM = ? ORDER BY RAND()',[$id]);
        return $sanpham;
    }

    public function getProductByBrand($id){
        $sanpham = DB::select('SELECT MaSP, TenSP, san_pham.MaDM, TenDM, san_pham.MaTH, TenTH, Gia, SoLuong, Hinh, MoTa
                                FROM ((san_pham
                                INNER JOIN danh_muc ON san_pham.MaDM = danh_muc.MaDM )
                                INNER JOIN thuong_hieu ON san_pham.MaTH = thuong_hieu.MaTH)
                                WHERE san_pham.MaTH = ? ORDER BY RAND()',[$id]);
        return $sanpham;
    }

    public function getProductByBrandAndCate($id1,$id2){
        $sanpham = DB::select('SELECT MaSP, TenSP, san_pham.MaDM, TenDM, san_pham.MaTH, TenTH, Gia, SoLuong, Hinh, MoTa
                                FROM ((san_pham
                                INNER JOIN danh_muc ON san_pham.MaDM = danh_muc.MaDM )
                                INNER JOIN thuong_hieu ON san_pham.MaTH = thuong_hieu.MaTH)
                                WHERE san_pham.MaTH = ?
                                AND san_pham.MaDM = ?
                                ORDER BY RAND()',[$id1,$id2]);
        return $sanpham;
    }

    public function getProductByName($chu){
        $sanpham = DB::select('SELECT MaSP, TenSP, san_pham.MaDM, TenDM, san_pham.MaTH, TenTH, Gia, SoLuong, Hinh, MoTa
                                FROM ((san_pham
                                INNER JOIN danh_muc ON san_pham.MaDM = danh_muc.MaDM )
                                INNER JOIN thuong_hieu ON san_pham.MaTH = thuong_hieu.MaTH)
                                WHERE san_pham.TenSP LIKE \'?\'',[$chu]);

        return $sanpham;
    }
}
