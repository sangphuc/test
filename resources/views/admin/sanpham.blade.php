@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container">     
        <div class="d-flex justify-content-end">
            <a href="{{ route('themsp') }}" class="btn btn-primary my-2">Thêm sản phẩm</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="30%">Tên Sản Phẩm</th>
                    <th width="20%">Danh mục</th>
                    <th width="15%">Thương hiệu</th>
                    <th width="10%">Giá</th>
                    <th width="10%">Số lượng</th>
                    <th width="5%"></th>
                    <th width="5%"></th>
                </tr>
            </thead>
            <tbody id="dssanpham">
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        $.get("/api/sanpham", function(data) {
            var dssanpham = data.data
            for (let i = 0; i < dssanpham.length; i++) {
                sanpham = dssanpham[i];
                $('#dssanpham').append(`<tr>
                    <td>${i+1}</td>
                    <td>${sanpham.TenSP}</td>
                    <td>${sanpham.TenDM}</td>
                    <td>${sanpham.TenTH}</td>
                    <td>${sanpham.Gia}</td>
                    <td>${sanpham.SoLuong}</td>
                    <td><a href="`+route('suasp',sanpham.MaSP)+`" class="btn btn-success py-1">Sửa</a></td>
                    <td><a href="`+route('xoasp',sanpham.MaSP)+`" class="btn btn-danger py-1">Xóa</a></td>
                </tr>`)
            }
        });    
    </script>
@endsection

