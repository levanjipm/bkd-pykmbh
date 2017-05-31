<!DOCTYPE html>
<html lang="en">

<head>
    @yield('1js')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Pelayanan Kepegawaian Terpadu Kota Payakumbuh</title>

    @include('layouts.includes.css')
    @yield('addcss')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  {{alertShow()}}

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            @include('layouts.includes.topnav')

            @include('layouts.includes.leftnav')
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            
                <div class="row">
                    <div class="col-lg-12">
                    @yield('title')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    @yield('content')
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    @include('layouts.includes.js')

    @yield('addjs')

</body>

</html>
