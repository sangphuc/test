@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container">     
        <div class="d-flex justify-content-end">
            <a href="{{ route('themth') }}" class="btn btn-primary my-2">Thêm thương hiệu</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="10%">STT</th>
                    <th width="60%">Tên thương hiệu</th>
                    <th width="15%"></th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody id="dsthuonghieu">
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        $.get("/api/thuonghieu", function(data) {
            var dsthuonghieu = data.data
            for (let i = 0; i < dsthuonghieu.length; i++) {
                thuonghieu = dsthuonghieu[i];
                $('#dsthuonghieu').append(`<tr>
                    <td>${i+1}</td>
                    <td>${thuonghieu.TenTH}</td>
                    <td><a href="`+route('suath',thuonghieu.MaTH)+`" class="btn btn-success py-1">Sửa</a></td>
                    <td><a href="`+route('xoath',thuonghieu.MaTH)+`"  class="btn btn-danger py-1">Xóa</a></td>
                </tr>`)
            }
        });
    </script>
@endsection

