@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container">
        <br>
        <h2>Thêm thương hiệu</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="">Tên thương hiệu:</label>
                <input type="text" class="form-control" name="tenthuonghieu" id="tenth">
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button type="submit" class="btn btn-primary my-2">Thêm</button>
            <a href="{{ route('thuonghieu') }}" class="btn btn-warning my-2">Quay lại</a>
        </form>
    </div>
@endsection
