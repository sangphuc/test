<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function getAllProduct(){
        $sanpham = DB::select('SELECT MaSP, TenSP, TenDM, TenTH, Gia, SoLuong, Hinh
                                FROM ((san_pham
                                INNER JOIN danh_muc ON san_pham.MaDM = danh_muc.MaDM)
                                INNER JOIN thuong_hieu ON san_pham.MaTH = thuong_hieu.MaTH)');
        return $sanpham;
    }

    public function getProduct($id){
        $sanpham = DB::select('SELECT MaSP, TenSP, TenDM, TenTH, Gia, SoLuong, Hinh, MoTa, created_at, updated_at
                                FROM ((san_pham
                                INNER JOIN danh_muc ON san_pham.MaDM = danh_muc.MaDM)
                                INNER JOIN thuong_hieu ON san_pham.MaTH = thuong_hieu.MaTH)
                                WHERE MaSP = ?',[$id]);
        return $sanpham;
    }

    public function insertProduct($data){
        return DB::insert('INSERT INTO san_pham(TenSP,MaDM,MaTH,SoLuong,Gia,MoTa,Hinh) value (?,?,?,?,?,?,?)',$data);
    }

    public function updateProduct($data, $id){
        $data = array_merge($data,[$id]);
        return DB::update('UPDATE san_pham SET TenSP = ?,MaDM = ?,MaTH = ?,SoLuong = ?,Gia = ? ,MoTa = ?,Hinh = ?,Token = ? WHERE MaSP = ?', $data);
    }

    public function deleteProduct($id){
        return DB::delete("DELETE FROM san_pham WHERE MaSP =?", [$id]);
    }
}
