<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    public function getAllThuongHieu(){
        $thuonghieu = DB::select('SELECT * FROM thuong_hieu');
        return $thuonghieu;
    }

    public function getBrand($id){
        $thuonghieu = DB::select('SELECT MaTH, TenTH
                                FROM thuong_hieu
                                WHERE MaTH = ?',[$id]);
        return $thuonghieu;
    }

    public function insertBrand($data){
        return DB::insert('INSERT INTO thuong_hieu(TenTH) value (?)',$data);
    }

    public function updateBrand($data, $id){
        $data = array_merge($data,[$id]);
        return DB::update('UPDATE thuong_hieu SET TenTH = ? WHERE MaTH = ?', $data);
    }

    public function deleteBrand($id){
        return DB::delete("DELETE FROM thuong_hieu WHERE MaTH =?", [$id]);
    }
}
