<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
      <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{ asset('assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('assets/plugins/nvd3/nv.d3.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('assets/plugins/mapplic/css/mapplic.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/rickshaw/rickshaw.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('assets/css/dashboard.widgets.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="{{ asset('pages/css/themes/modern.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/print.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/print.min.js') }}" defer></script>
  </head>
  <body class="fixed-header horizontal-menu horizontal-app-menu dashboard"> 
      <!-- START PAGE-CONTAINER -->
      <div class="header p-r-0 bg-primary">
        <div class="header-inner header-md-height">
          <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu text-white" data-toggle="horizontal-menu"></a>
          <div class="">
            <div class="brand inline no-border d-sm-inline-block">
              <img src="{{ asset('assets/img/logo_white.png') }}" alt="logo" data-src="{{ asset('assets/img/logo_white.png') }}" data-src-retina="{{ asset('assets/img/logo_white_2x.png') }}" width="78" height="22">
            </div>
          </div>
          <div class="d-flex align-items-center">
            <a class="btn btn-sm  btn-rounded btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar Sesion</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
            </form>
          </div>
        </div>
        <div class="bg-white">
          <div class="container">
            <div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="4">
              <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-close" data-toggle="horizontal-menu">
              </a>
              <ul>
                <li class=" active">
                  <a href="/">Inicio</a>
                </li>
                <li>
                  <a href="/inquilino"><span class="title">inquilinos</span></a>
                </li>
                <li>
                  <a href="/arrendatario"><span class="title">arrendadores</span></a>
                </li>
                <li>
                  <a href="/inmueble"><span class="title">inmuebles</span></a>
                </li>
                <li>
                  <a href="/contrato"><span class="title">contratos</span></a>
                </li>
                  </ul>
                </li>
              </ul>
              <a href="#" class="search-link d-flex justify-content-between align-items-center d-lg-none" data-toggle="search">Tap here to search <i class="pg-search float-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="page-container ">
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
          <!-- START PAGE CONTENT -->
          <div class="content sm-gutter">
            <!-- START BREADCRUMBS -->
            <div class="bg-white">
                  @yield('bread')
            </div>
            <!-- END BREADCRUMBS -->
            <!-- START CONTAINER FLUID -->
            <div class="container sm-padding-10 p-t-20 p-l-0 p-r-0">
              <!-- START ROW -->
              <div class="row">
                <div id="app">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
              </div>
              <!-- END ROW -->
          <!-- START COPYRIGHT -->
          <!-- START CONTAINER FLUID -->
          <!-- START CONTAINER FLUID -->
          <div class=" container   container-fixed-lg footer">
            <div class="copyright sm-text-center">
              <p class="small no-margin pull-left sm-pull-reset">
                <span class="hint-text">Copyright &copy; 2017 </span>
                <span class="font-montserrat">REVOX</span>. 
                <span class="hint-text">All rights reserved. </span>
                <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
              <p class="small no-margin pull-right sm-pull-reset">
                Hand-crafted <span class="hint-text">&amp; made with Love</span>
              </p>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- END COPYRIGHT -->
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
      </div>
      <!-- END PAGE CONTAINER -->

      <!-- BEGIN VENDOR JS -->
      <script src="{{ asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/plugins/classie/classie.js') }}"></script>
      <script src="{{ asset('assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/nvd3/lib/d3.v3.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/nvd3/nv.d3.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/nvd3/src/utils.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/nvd3/src/tooltip.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/nvd3/src/interactiveLayer.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/nvd3/src/models/axis.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/nvd3/src/models/line.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/nvd3/src/models/lineWithFocusChart.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/mapplic/js/hammer.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/mapplic/js/jquery.mousewheel.js') }}"></script>
      <script src="{{ asset('assets/plugins/mapplic/js/mapplic.js') }}"></script>
      <script src="{{ asset('assets/plugins/rickshaw/rickshaw.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/jquery-metrojs/MetroJs.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/skycons/skycons.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
      <script src="{{ asset('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
      <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>


    
      <!-- BEGIN CORE TEMPLATE JS -->
      <script src="{{ asset('pages/js/pages.min.js') }}"></script>
      <!-- END CORE TEMPLATE JS -->
      <!-- BEGIN PAGE LEVEL JS -->
      <script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/js/dashboard.js') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
      <!-- END PAGE LEVEL JS -->
      @yield('script')
    
  </body>
</html>