@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container">     
        <div class="d-flex justify-content-end">
            <a href="{{ route('themdm') }}" class="btn btn-primary my-2">Thêm danh mục</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10%">STT</th>
                    <th width="60%">Tên danh mục</th>
                    <th width="15%"></th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody id="dsdanhmuc">
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        $.get("/api/danhmuc", function(data) {
            var dsdanhmuc = data.data
            for (let i = 0; i < dsdanhmuc.length; i++) {
                danhmuc = dsdanhmuc[i];
                $('#dsdanhmuc').append(`<tr>
                    <td>${i+1}</td>
                    <td>${danhmuc.TenDM}</td>
                    <td><a href="`+route('suadm',danhmuc.MaDM)+`" class="btn btn-success py-1">Sửa</a></td>
                    <td><a href="`+route('xoadm',danhmuc.MaDM)+`"  class="btn btn-danger py-1">Xóa</a></td>
                </tr>`)
            }
        }); 
    </script>
@endsection

