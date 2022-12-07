@extends('layouts.clients')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="container">
        
        <div href="" id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <img src="{{asset('assets/clients/images/shopimg.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div>
            <br>
            <h1 class="font-weight-bold d-flex justify-content-center">Top thương hiệu</h1>
        </div>

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

        <div class="row shadow p-4 mb-4">
            <a class="col-md" style="cursor: pointer" onclick="searchTH(this.id)" id="2"><img class="sqimg" src="{{asset('assets/clients/images/olay.jpg')}}"></a>
            <a class="col-md" style="cursor: pointer" onclick="searchTH(this.id)" id="3"><img class="sqimg" src="{{asset('assets/clients/images/3ce.jpg')}}"></a>
            <a class="col-md" style="cursor: pointer" onclick="searchTH(this.id)" id="1"><img class="sqimg" src="{{asset('assets/clients/images/loreal.jpg')}}"></a>
            <a class="col-md" style="cursor: pointer" onclick="searchTH(this.id)" id="5"><img class="sqimg" src="{{asset('assets/clients/images/cocoon.jpg')}}"></a>
            <a class="col-md" style="cursor: pointer" onclick="searchTH(this.id)" id="15"><img class="sqimg" src="{{asset('assets/clients/images/blackrouge.jpg')}}"></a>
        </div>
        <br>
        <div class="row" style="margin-top: 25px">
            <h3 class="font-weight-bold col">Son</h3>
            <a id = "1" onclick="searchDM(this.id)" class="d-flex flex-row-reverse col-2 xemthem">Xem thêm</a>
        </div>
        <div class="row" id="dsson">
        </div>
        <br>
        <div class="row" style="margin-top: 25px">
            <h3 class="font-weight-bold col">Serum</h3>
            <a id = "3" onclick="searchDM(this.id)" class="d-flex flex-row-reverse col-2 xemthem">Xem thêm</a>
        </div>
        <div class="row" id="dsserum">
        </div>
        <br>
        <div class="row" style="margin-top: 25px">
            <h3 class="font-weight-bold col">Kem dưỡng</h3>
            <a id = "2" onclick="searchDM(this.id)" class="d-flex flex-row-reverse col-2 xemthem">Xem thêm</a>
        </div>
        <div class="row" id="dskemduong">
        </div>
        <br>
        <div class="row" style="margin-top: 25px">
            <h3 class="font-weight-bold col">Kem chống nắng</h3>
            <a id = "4" onclick="searchDM(this.id)" class="d-flex flex-row-reverse col-2 xemthem">Xem thêm</a>
        </div>
        <div class="row" id="dskemchongnang">
        </div>
        <br>
        <div class="row" style="margin-top: 25px">
            <h3 class="font-weight-bold col">Tẩy tế bào chết</h3>
            <a id = "8" onclick="searchDM(this.id)" class="d-flex flex-row-reverse col-2 xemthem">Xem thêm</a>
        </div>
        <div id="dstaytebaochet" class="row">
        </div>
        <br>
        
    </div>
    <div class="row container-fluid slogan_foot">
        <div class="col-lg-7 col-md-12 col-sm-12 row slogan-left">
            <div class="col slogan-item">
                <img src="{{ asset('assets/clients/images/icon_footer_1.svg') }}" alt="">
                <div>Thanh toán khi nhận hàng</div>
            </div>
            <div class="col slogan-item-free slogan-item">
                <img src="{{ asset('assets/clients/images/icon_footer_2.svg') }}" alt="">
                <div>Now free</div>
            </div>
            <div class="col slogan-item">
                <img src="{{ asset('assets/clients/images/icon_footer_3.svg') }}" alt="">
                <div>14 ngày đổi trả</div>
            </div>
            <div class="col slogan-item">
                <img src="{{ asset('assets/clients/images/icon_footer_4.svg') }}" alt="">
                <div>Uy tín</div>
            </div>
        </div>
        <div class="row col-lg-4 col-md-12 col-sm-12 slogan-right">
            <div class="row col slo">
                <div class="col-2">
                    <img src="{{ asset('assets/clients/images/question-circle-fill.svg') }}" alt="">
                </div>
                <div class="col slo">
                    <div>Góp ý, khiếu nại</div>
                    <div>1800 0001</div>
                </div>
            </div>
            <div class="row col slo">
                <div class="col-2">
                    <img src="{{ asset('assets/clients/images/telephone-fill.svg') }}" alt="">
                </div>
                <div class="col slo">
                    <div>Tư vấn</div>
                    <div>1800 0002</div>
                </div>
            </div>
        </div>
        
    </div>
    
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


    $.get("/api/sanphamtheodanhmuc/1", function(data) {
            var dssanpham = data.data
            for (let i = 0; i < dssanpham.length && i < 5; i++) {
                sanpham = dssanpham[i];
                $('#dsson').append(`<div class = "col-2-5 sp-item" >
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

    $.get("/api/sanphamtheodanhmuc/3", function(data) {
        var dssanpham = data.data
        for (let i = 0; i < dssanpham.length && i < 5; i++) {
            sanpham = dssanpham[i];
            $('#dsserum').append(`<div class = "col-2-5 sp-item">
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
    
    $.get("/api/sanphamtheodanhmuc/2", function(data) {
        var dssanpham = data.data
        for (let i = 0; i < dssanpham.length && i < 5; i++) {
            sanpham = dssanpham[i];
            $('#dskemduong').append(`<div class = "col-2-5 sp-item">
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

    $.get("/api/sanphamtheodanhmuc/4", function(data) {
        var dssanpham = data.data
        for (let i = 0; i < dssanpham.length && i < 5; i++) {
            sanpham = dssanpham[i];
            $('#dskemchongnang').append(`<div class = "col-2-5 sp-item">
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

    $.get("/api/sanphamtheodanhmuc/8", function(data) {
        var dssanpham = data.data
        console.log(dssanpham);
        for (let i = 0; i < dssanpham.length && i < 5; i++) {
            sanpham = dssanpham[i];
            $('#dstaytebaochet').append(`<div class = "col-2-5 sp-item">
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