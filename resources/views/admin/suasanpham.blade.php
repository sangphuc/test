@extends('layouts.admin')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container">
        <br>
        <h2>Sửa sản phẩm</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="tensanpham" id="tensp">
            </div>
            <div class="mb-3">
                <label for="">Danh mục:</label>
                <select class="form-select" id="danhmuc" name="danhmuc"></select>
            </div>
            <div class="mb-3">
                <label for="">Thương hiệu:</label>
                <select class="form-select" id="thuonghieu" name="thuonghieu"></select>
            </div>
            <div class="mb-3">
                <label for="">Số lượng:</label>
                <input type="text" class="form-control" name="soluong" id="soluong">
            </div>
            <div class="mb-3">
                <label for="">Giá:</label>
                <input type="text" class="form-control" name="gia" id="gia">
            </div>
            <div class="mb-3">
                <label for="">Mô tả:</label>
                <br>
                <textarea class="form-control" name="mota" cols="40" rows="5" id="mota"></textarea>
            </div>
            <div class="mb-3">
                <label for="">Hình ảnh:</label>
                <br>
                <img src="#" width="200" height="200" id="hinhanh" name="hinhanh" />
                <input type="file" id="upload" name="avatar" accept="image/png, image/jpeg,image/jpg">
                <input type="text" class="form-control" hidden  name="uploadImg" id="uploadImg">
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button type="submit" class="btn btn-primary my-2">Cập nhật</button>
            <a href="{{ route('sanpham') }}" class="btn btn-warning my-2">Quay lại</a>
        </form>
        
    </div>
@endsection
@section('js')
    <script type="text/javascript"> 
        var IdSanPham = window.location.href.split('/')[5];
        var tendanhmuc, tenthuonghieu;
        $.get(`http://127.0.0.1:8000/api/chitietsanpham/${IdSanPham}`, function(data) {
            var sanpham = data.data[0]
            tendanhmuc = sanpham.TenDM;
            tenthuonghieu = sanpham.TenTH;
            document.getElementById("tensp").value = sanpham.TenSP;
            document.getElementById("danhmuc").value = sanpham.TenDM;
            document.getElementById("thuonghieu").value = sanpham.TenTH;
            document.getElementById("gia").value = sanpham.Gia;
            document.getElementById("soluong").value = sanpham.SoLuong;
            document.getElementById("mota").value = sanpham.MoTa;
            document.getElementById("hinhanh").src = "{{ asset('assets/clients/images') }}" + "/" + sanpham.Hinh;
            document.getElementById("uploadImg").value = sanpham.Hinh;
            $.get(`http://127.0.0.1:8000/api/danhmuc`, function(data) {
                var dsdanhmuc = data.data

                for (let i = 0; i < dsdanhmuc.length; i++) {
                    danhmuc = dsdanhmuc[i];
                    if (danhmuc.TenDM === tendanhmuc) {

                        $('#danhmuc').append(`
                    <option value=" ${danhmuc.MaDM}" selected >${danhmuc.TenDM} </option>
                `)
                    } else {
                        $('#danhmuc').append(`
                    <option value=" ${danhmuc.MaDM}">${danhmuc.TenDM} </option>
                `)
                    }
                }
            });


            $.get(`http://127.0.0.1:8000/api/thuonghieu`, function(data) {
            var dsthuonghieu = data.data
            for (let i = 0; i < dsthuonghieu.length; i++) {
                thuonghieu = dsthuonghieu[i];
                if (thuonghieu.TenTH === tenthuonghieu) {
                    $('#thuonghieu').append(`
                    <option value=" ${thuonghieu.MaTH}" selected >${thuonghieu.TenTH} </option>
                `)
                } else {
                    $('#thuonghieu').append(`
                    <option value=" ${thuonghieu.MaTH}">${thuonghieu.TenTH} </option>
                `)
                }
            }
        });

        });




        document.getElementById("danhmuc").value = tendanhmuc;
        $('#danhmuc').change(() => {
            console.log($('#danhmuc').val())
        })
        //------------------------------------------------------------------------------------
      

        document.getElementById("thuonghieu").value = tenthuonghieu;
        $('#thuonghieu').change(() => {
            console.log($('#thuonghieu').val())
        })

        //chọn hình ảnh
        upload.onchange = evt => {
            const [file] = upload.files
            if (file) {
                hinhanh.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
