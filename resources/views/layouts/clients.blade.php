<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/clients/css/app.css')}}">
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
	@routes()
</head>
<body>
	@include('clients.blocks.header')
	<div class="container">
		<div class="content">
			@if (session('msg'))
    			<div class="alert alert-success">
    				{{ session('msg') }}
   				</div>
			@endif
			
		</div>
	</div>
	@yield('content')
	@include('clients.blocks.footer')
	<script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/clients/js/custom.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	@yield('js')
</body>
<script>
    $.get("/api/thuonghieu", function(data) {
        var dsthuonghieu = data.data
        for (let i = 0; i < dsthuonghieu.length; i++) {
            thuonghieu = dsthuonghieu[i];
            $('#dropthuonghieu').append(`
                <a href="#" id="${thuonghieu.MaTH}" onclick="searchTH(this.id)">${thuonghieu.TenTH}</a>
            `)
        }
    });
	$.get("/api/danhmuc", function(data) {
        var dsdanhmuc = data.data
        for (let i = 0; i < dsdanhmuc.length; i++) {
            danhmuc = dsdanhmuc[i];
            $('#dropdanhmuc').append(`
                <a href="#" id="${danhmuc.MaDM}" onclick="searchDM(this.id)">${danhmuc.TenDM}</a>
            `)
        }
    });
</script>
</html>