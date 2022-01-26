<!-- 病院情報一覧画面 -->

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>病院情報仮登録一覧画面</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    

    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js" integrity="sha256-tcqPYPyxU+Fsv5sVdvnxLYJ7Jq9wWpi4twZbtZ0ubY8=" crossorigin="anonymous"></script> 


<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/hospital.css" rel="stylesheet">
    <link rel="stylesheet" href="{{  asset('css/dashboard.css') }}" />


  </head>
  <body>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<div class="text-light ">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">管理者画面</a>
    </div>
    <ul class="nav pull-right">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">
      <form action="{{url('/admini_top')}}" method="get"  class="form">
                     @csrf
            <input type="submit" name="submit" value="ホーム" class="btn1" />
      </form>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white"href="#">
      <form action="{{url('/top')}}" method="POST"  class="form">
                     @csrf
            <input type="submit" name="submit" value="サインアウト" class="btn1" />
            </form>
    </a>
    </li>
  </ul>
</header>


<div class="container-fluid">
  <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <br>
        <br>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" >
              <span data-feather="file"></span>
              <form action="{{url('/hospitallist')}}" method="POST"  class="form">
                     @csrf
            <input type="submit" name="submit" value="病院登録" class="btn2" />
            </form>
            </a>
          </li>
    </div>
    </nav>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">病院情報仮登録一覧画面</h1>
        @if (!$hoapitals->isEmpty())
    {{-- 記事データがDBにある場合の表示内容 --}}
    <div class="text-primary">
    申請されたデータがあります
    </div>
@else
    {{-- 記事データがDBにない場合の表示内容 --}}
    <div class="text-primary">
    新規のデータはありません
    </div>
@endif
       
<form action="{{url('/hospitalhome')}}" method="post">
  @csrf
<div class="text-center">

    <div class="col-2">
  <button class="btn btn-danger rounded-pill" type="submit" style="width:200px"> <h4>本登録済み一覧<h4></button>
    </div>
    </div>


    </form>
        
        <div class="btn-toolbar mb-2 mb-md-0">
        
        </div>
    </div>

    <div class="m-5">
    <table class="table table-bordered border-dark" > 
    
    <tbody >
    <tr>
      <th scope="col"class="table-dark border-dark">ID</th>
      <th scope="col"class="table-dark border-dark">病院名</th>
      <th scope="col"class="table-dark border-dark">住所</th>
      <th scope="col"class="table-dark border-dark">電話番号</th>
      <th scope="col"class="table-dark border-dark">緯度</th>
      <th scope="col"class="table-dark border-dark">経度</th>

      
    </tr>
    @foreach ($hoapitals as $hospital)
  <tr>
  <td input type="hidden" name="hospital_ID"  scope="row" class="table-white border-dark" >{{  $hospital->hospital_ID }}</td>

  <td scope="row" class="table-white border-dark" >{{  $hospital->hospital_name  }}</td>
  <td scope="row" class="table-white border-dark" >{{  $hospital->hospital_address  }}</td>
  <td scope="row" class="table-white border-dark" >{{  $hospital->hospital_tell }}</td>
  <td scope="row" class="table-white border-dark" >{{  $hospital->hospital_ido  }}</td>
  <td scope="row" class="table-white border-dark" >{{  $hospital->hospital_keido  }}</td>

 
  
    </tr>  
    @endforeach

    </tbody>
</table>

<div class="m-5">
</div>
<div class="d-flex justify-content-center">
<form action="{{url('/hospitalregiverifi')}}" method="post">
  @csrf
<div class="text-center">
<div class="d-flex justify-content-center">



  

    <div class="col-2">
  <button class="btn btn-success rounded-pill" type="submit" style="width:150px"> <h4>本登録<h4></button>
    </div>
    </div>
</div>

    </form>
    </div>
    

    

  


    
    <script src="{{ asset('/js/hospitalregister.js') }}"></script>

      
    </div>
  </body>
</html>