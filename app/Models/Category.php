<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public function getAllDanhMuc(){
        $danhmuc = DB::select('SELECT * FROM danh_muc');
        return $danhmuc;
    }

    public function getCategory($id){
        $danhmuc = DB::select('SELECT MaDM, TenDM
                                FROM danh_muc
                                WHERE MaDM = ?',[$id]);
        return $danhmuc;
    }

    public function insertCategory($data){
        return DB::insert('INSERT INTO danh_muc(TenDM) value (?)',$data);
    }

    public function updateCategory($data, $id){
        $data = array_merge($data,[$id]);
        return DB::update('UPDATE danh_muc SET TenDM = ? WHERE MaDM = ?', $data);
    }

    public function deleteCategory($id){
        return DB::delete("DELETE FROM danh_muc WHERE MaDM =?", [$id]);
    }
}
