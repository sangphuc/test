<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cart extends Model
{
    use HasFactory;
    public function inserttoCart($tt){
        return DB::insert('INSERT INTO gio_hang(MaTK,MaSP) value (?,?)',$tt);
    }

    public function getCart($id){
        $cart = DB::select('SELECT san_pham.MaSP, TenSP, Gia, SoLuong, Hinh 
                                FROM (gio_hang
                                INNER JOIN san_pham ON gio_hang.MaSP = san_pham.MaSP )
                                WHERE gio_hang.MaTK = ?',[$id]);
        return $cart;
    }

    public function deleteProductCart($data){
        return DB::delete("DELETE FROM gio_hang WHERE MaSP=? AND MaTK=?",$data);
    }

    public function addBill($data){
        return DB::insert('INSERT INTO hoa_don(MaTK,TongTien,TrangThai) value (?,?,?)',$data);
    }

    public function chitiethoadon($data){
        DB::insert('INSERT INTO chi_tiet_hoa_don(MaSP)
                    SELECT MaSP
                    FROM gio_hang
                    WHERE MaTK = ?',$data);
    }
    
    public function deleteAllCart($data){
        return DB::delete("DELETE FROM gio_hang WHERE MaTK=?",$data);
    }
}
