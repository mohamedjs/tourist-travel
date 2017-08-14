
<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    @yield('head')
    <title>Admin Temeplet</title>
    <link rel="stylesheet" href="../css/Normalize.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title></title>
  </head>
  <body>
    <header style="height:100px;margin:10px auto;width:95%;">
      <p style="height:100px;margin:10px auto;width:200px;"> this is the page header </p>
    </header>
    <div class="container">
      <div class="col-lg-3 col-md-3 col-sm-12">
          <a href="/admin/createcity">اضافه مدينه </a><br>
          <a href="/admin/createoffer"> اداره العروض</a><br>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-12">
          @yield('content')
      </div>

    </div>

    <footer style="height:100px;margin:10px auto;width:95%; ">
      Copyright (c) 2016 Copyright Holder All Rights Reserved.
    </footer>
    <script src="../js/jquery-3.1.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/js.js"></script>
    @yield('script')
  </body>
</html>
