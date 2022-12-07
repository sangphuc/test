@extends('layouts.clients')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container">
        <br>
        <div id="myModal" class="modal">
            <div class="modal-content" id="ctsp">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset('assets/clients/images/noimg.jpg') }}" width="90%" height="90%" id="cthinhanh" name="hinhanh"/>
                            <div id="ctgia"></div>
                        </div>
                        <div class="col-7">
                            <div id="ctten"></div>
                            <div id="ctthuonghieu"></div>
                            <div id="ctmota"></div>
                            <div id="ctsl"></div>
                            <input type="text" name="ctmasp" id="ctmasp" hidden>
                            <button type="submit" class="btn btn-primary my-2" id="addbtn">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-2 border-end">
                <form action="{{route("search2")}}">
                    <h5 style="font-weight:bold">Thương hiệu</h5>
                    <fieldset id="thuonghieu" class="scroll">
                        
                        
                    </fieldset>

                    <h5 style="font-weight: bold">Danh mục</h5>
                    <fieldset id="danhmuc" class="scroll nav-pills nav-stacked">
                        
                        
                    </fieldset>

                    <button type="submit" style="float: right" class="btn btn-primary mt-3">Tìm kiếm</button>
                </form>
            </div>
            <div class="col-10">
                <div id="dssanpham" class="row">

                </div>
            </div>
        </div>
        
    </div>
    <br>
@endsection
@section('js')
<script>
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

    let a = location.href
    let b=a.split("/");
    let id=b[5];
    if (a.indexOf("?") != -1){
        c=a.split("?")
        d=c[1].split("=")
        e=c[1].split("&")  
        if (c[1].indexOf("category") != -1 && c[1].indexOf("brand") != -1){
            ma1=e[0].slice(6, 10)
            ma2=e[1].slice(9,15)
            $.get(`/api/locsanpham/${ma1}/${ma2}/`, function(data) {
            var dssanpham = data.data
            for (let i = 0; i < dssanpham.length; i++) {
                sanpham = dssanpham[i];
                $('#dssanpham').append(`
                    <div class = "col-3 sp-item2">
                        <div class = "hov">
                            <div class = "item-hinh"><img width="100%" height="190px" src ="{{ asset('assets/clients/images') }}/${sanpham.Hinh}"></img></div>
                            <div class = "item-gia">${sanpham.Gia} đồng</div>
                            <div class = "item-thuonghieu">${sanpham.TenTH}</div>
                            <div class = "item-ten">${sanpham.TenSP}</div>            
                    </div>
                    <div class = "viewbtn"><button onclick="displayct(${sanpham.MaSP})" class="btn btn-primary my-2">Xem Chi Tiết</button></div>
                `)
            }
            }); 
            
        }
        else if (c[1].indexOf("category") != -1){
            $.get(`/api/sanphamtheodanhmuc/${d[1]}`, function(data) {
            var dssanpham = data.data
            for (let i = 0; i < dssanpham.length; i++) {
                sanpham = dssanpham[i];
                $('#dssanpham').append(`
                <div class = "col-3 sp-item2">
                        <div class = "hov">
                            <div class = "item-hinh"><img width="100%" height="190px" src ="{{ asset('assets/clients/images') }}/${sanpham.Hinh}"></img></div>
                            <div class = "item-gia">${sanpham.Gia} đồng</div>
                            <div class = "item-thuonghieu">${sanpham.TenTH}</div>
                            <div class = "item-ten">${sanpham.TenSP}</div>            
                    </div>
                    <div class = "viewbtn"><button onclick="displayct(${sanpham.MaSP})" class="btn btn-primary my-2">Xem Chi Tiết</button></div>
                `)
            }
            });
        }
        else if (c[1].indexOf("brand") != -1){
            $.get(`/api/sanphamtheothuonghieu/${d[1]}`, function(data) {
            var dssanpham = data.data
            for (let i = 0; i < dssanpham.length; i++) {
                sanpham = dssanpham[i];
                $('#dssanpham').append(`
                <div class = "col-3 sp-item2">
                        <div class = "hov">
                            <div class = "item-hinh"><img width="100%" height="190px" src ="{{ asset('assets/clients/images') }}/${sanpham.Hinh}"></img></div>
                            <div class = "item-gia">${sanpham.Gia} đồng</div>
                            <div class = "item-thuonghieu">${sanpham.TenTH}</div>
                            <div class = "item-ten">${sanpham.TenSP}</div>            
                    </div>
                    <div class = "viewbtn"><button onclick="displayct(${sanpham.MaSP})" class="btn btn-primary my-2">Xem Chi Tiết</button></div>
                `)
            }
        }); 
        }
    
    } else if (a.indexOf("category") != -1) {
        $.get(`/api/sanphamtheodanhmuc/${b[5]}`, function(data) {
            var dssanpham = data.data
            for (let i = 0; i < dssanpham.length; i++) {
                sanpham = dssanpham[i];
                $('#dssanpham').append(`
                <div class = "col-3 sp-item2">
                        <div class = "hov">
                            <div class = "item-hinh"><img width="100%" height="190px" src ="{{ asset('assets/clients/images') }}/${sanpham.Hinh}"></img></div>
                            <div class = "item-gia">${sanpham.Gia} đồng</div>
                            <div class = "item-thuonghieu">${sanpham.TenTH}</div>
                            <div class = "item-ten">${sanpham.TenSP}</div>            
                    </div>
                    <div class = "viewbtn"><button onclick="displayct(${sanpham.MaSP})" class="btn btn-primary my-2">Xem Chi Tiết</button></div>
                `)
            }
        });
    
    
    } else if(a.indexOf("brand") != -1){
        $.get(`/api/sanphamtheothuonghieu/${b[5]}`, function(data) {
            var dssanpham = data.data
            for (let i = 0; i < dssanpham.length; i++) {
                sanpham = dssanpham[i];
                $('#dssanpham').append(`
                <div class = "col-3 sp-item2">
                        <div class = "hov">
                            <div class = "item-hinh"><img width="100%" height="190px" src ="{{ asset('assets/clients/images') }}/${sanpham.Hinh}"></img></div>
                            <div class = "item-gia">${sanpham.Gia} đồng</div>
                            <div class = "item-thuonghieu">${sanpham.TenTH}</div>
                            <div class = "item-ten">${sanpham.TenSP}</div>            
                    </div>
                    <div class = "viewbtn"><button onclick="displayct(${sanpham.MaSP})" class="btn btn-primary my-2">Xem Chi Tiết</button></div>
                `)
            }
        }); 
    
    
    } else{
        $.get(`/api/sanpham`, function(data) {
            var dssanpham = data.data
            for (let i = 0; i < dssanpham.length; i++) {
                sanpham = dssanpham[i];
                let name = sanpham.TenSP.split(" ");
                let name1= name.join('');
                let name2=name1.toLowerCase();
                let name3=removeVietnameseTones(name2);
                if (name3.indexOf(b[5]) != -1){
                    $('#dssanpham').append(`
                    <div class = "col-3 sp-item2">
                        <div class = "hov">
                            <div class = "item-hinh"><img width="100%" height="190px" src ="{{ asset('assets/clients/images') }}/${sanpham.Hinh}"></img></div>
                            <div class = "item-gia">${sanpham.Gia} đồng</div>
                            <div class = "item-thuonghieu">${sanpham.TenTH}</div>
                            <div class = "item-ten">${sanpham.TenSP}</div>            
                    </div>
                    <div class = "viewbtn"><button onclick="displayct(${sanpham.MaSP})" class="btn btn-primary my-2">Xem Chi Tiết</button></div>
                    `)
                }
            }
        });  
    }
        
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

    function displayct(id){  
    $.get(`/api/chitietsanpham/${id}`, function(data) {
        var sanpham = data.data[0]
        document.getElementById("ctten").innerHTML = sanpham.TenSP;
        document.getElementById("cthinhanh").src = "{{ asset('assets/clients/images') }}" + "/" + sanpham.Hinh;
        document.getElementById("ctgia").innerHTML = "Giá: "+sanpham.Gia+"VND";
        document.getElementById("ctthuonghieu").innerHTML = "Thương hiệu: "+sanpham.TenTH;
        document.getElementById("ctmota").innerHTML = sanpham.MoTa;
        document.getElementById("ctmasp").value = sanpham.MaSP;
        document.getElementById("ctsl").innerHTML = "Số lượng còn lại: "+sanpham.SoLuong;

    });  
        modal.style.display="block"
    }

    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        $("div#ctten").empty();
        $("img#cthinhanh").empty();
        $("div#ctgia").empty();
        $("div#ctthuonghieu").empty();
        $("div#ctmota").empty();
        $("div#ctsl").empty();
        document.getElementById("cthinhanh").src = "{{ asset('assets/clients/images/noimg.jpg') }}";
    }
    }
</script>
    
@endsection