@include('layout.header')

    
<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    
@include('layout.navbar')
        

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Begin page -->
        <div class="wrapper">
    
            <!-- ========== Left Sidebar Start ========== -->
            @include('layout.sideber')
            <!-- Left Sidebar End -->
    
            @yield('content')
            <!-- content-page -->
    
        </div> <!-- end wrapper-->
    </div>
    <!-- END Container -->


        <!-- Right Sidebar -->
        @include('layout.right_sideber')

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->
@include('layout.footer')