@extends('layouts.clients')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <br>
    <div class="container" style="min-height: 400px">
        <h2>Giỏ hàng</h2>
        <form action="" method="POST">
        <div class="row">
            
            <div class="col-9">
                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="55%">Sản Phẩm</th>
                                <th width="10%">Giá tiền</th>
                                <th width="5%">Số lượng</th>
                                <th width="15%">Thành Tiền</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody id="listsanpham">
                        </tbody>
                    </table>
                    @csrf
                    
                </form>
            </div>
            <div class="col-3">
                <div class="hd">
                    <h5 style="font-weight: bold" class="topbill">Hóa đơn của bạn</h5>
                    <hr>
                    <div id="tongsp"></div>
                    <input type="text" value="" name="tongsp1" id="tongsp1" hidden>
                    <div id="thanhtien"></div>
                    <input type="text" value="" name="thanhtien1" id="thanhtien1" hidden>
                    @csrf
                </div>
                <button type="submit" class="btn btn-primary my-2">Mua</button>
            </div>
            
        </div>
        
                    
                </form>
    </div>
    <br>
@endsection
@section('js')
<script>
    $.get(`/api/laygiohang/{{Auth::user()->id}}`, function(data) {
            var dssanpham = data.data
            var thanhtien = 0;

            for (let i = 0; i < dssanpham.length; i++) {
                sanpham = dssanpham[i];
                $('#listsanpham').append(`<tr>
                    <td>
                        <div class="row">
                            <div class="col-2">
                                <img width="100%" height="100%" src ="{{ asset('assets/clients/images') }}/${sanpham.Hinh}"></img>
                            </div>
                            <div class="col-10">
                                ${sanpham.TenSP}
                            </div>
                        </div>
                    </td>
                    <td name="price">${sanpham.Gia}</td>
                    <td>
                        <div class="buttons_added" id="buttons_added">
                            <input
                                type="number"
                                value="1"
                                step="1"
                                min="1"
                                max="99"
                                id="quantity${i}"
                                name="quantity${i}"
                                class="input_quantity"
                                onchange="dem()"
                            />
                        </div>
                    </td>
                    <td id="tongtien${i}" name="tongtien">${sanpham.Gia}</td>
                    <td><a href="`+route('xoaspgh',sanpham.MaSP)+`" class="">Xóa</a></td>
                </tr>`)
                thanhtien += sanpham.Gia
            }
            

            $("#tongsp").append(`Tổng sản phẩm: ${dssanpham.length}`)
            document.getElementById("tongsp1").value = dssanpham.length
            $('#thanhtien').append(`Tổng tiền: ${thanhtien}`)
            document.getElementById("thanhtien1").value = thanhtien

        });   
       
        function dem(){    
            var tongsp = 0;
            var tien = 0;
            var thanhtien = 0;
            var data = document.getElementsByClassName("input_quantity");
            var data1 = document.getElementsByName("price");
            
            for(var i = 0; i < data.length ; i++){
                tongsp += parseInt(data[i].value)
                tien = parseInt(data1[i].innerHTML)
                document.getElementById("tongtien" + i).innerHTML=tien*data[i].value
            }
            
            document.getElementById("tongsp").innerHTML = "Tổng sản phẩm: "+tongsp
            document.getElementById("tongsp1").value = tongsp
            
            var data2 = document.getElementsByName("tongtien");
            for(var i = 0; i < data.length ; i++){
                thanhtien += parseInt(data2[i].innerHTML)
            }
            document.getElementById("thanhtien").innerHTML = "Tổng tiền: "+thanhtien
            document.getElementById("thanhtien1").value = thanhtien
        }

        

    var searcher = $('#search')
    searcher.on('keypress', function(e) {
        if (e.which == 13) {
            if (searcher.val().length > 2) {
                let searchvl = searcher.val().split(" ");
                let searchvl1= searchvl.join('');
                let searchvl2=searchvl1.toLowerCase();
                location.href = '/search/all/' + removeVietnameseTones(searchvl2);
            } else {
                alert('Minimun query length is 3');
            }
        }
    });
 
    $.get("/api/thuonghieu", function(data) {
        var dsthuonghieu = data.data
        for (let i = 0; i < dsthuonghieu.length; i++) {
            thuonghieu = dsthuonghieu[i];
            $('#thuonghieu').append(`
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="${thuonghieu.MaTH}" name="brand" value="${thuonghieu.MaTH}">${thuonghieu.TenTH}
                    <label class="form-check-label" for="radio1"></label>
                </div>
            `)
        }
    });

    $.get("/api/danhmuc", function(data) {
        var dsdanhmuc = data.data
        for (let i = 0; i < dsdanhmuc.length; i++) {
            danhmuc = dsdanhmuc[i];
            $('#danhmuc').append(`
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="${danhmuc.MaDM}" name="category" value="${danhmuc.MaDM}">${danhmuc.TenDM}
                    <label class="form-check-label" for="radio1"></label>
                </div>
            `)
        }
    });
</script>
    
@endsection