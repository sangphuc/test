@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container">
        <br>
        <h2>Sửa danh mục</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="">Tên danh mục:</label>
                <input type="text" class="form-control" name="tendanhmuc" id="tendm">
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button type="submit" class="btn btn-primary my-2">Cập nhật</button>
            <a href="{{ route('danhmuc') }}" class="btn btn-warning my-2">Quay lại</a>
        </form>
        
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        var IdDanhMuc = window.location.href.split('/')[5];
        var tendanhmuc, tenthuonghieu;
        $.get(`http://127.0.0.1:8000/api/chitietdanhmuc/${IdDanhMuc}`, function(data) {
            var danhmuc = data.data[0]
            document.getElementById("tendm").value = danhmuc.TenDM;
        })
    </script>
@endsection
