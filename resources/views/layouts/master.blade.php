<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>@yield('title')</title>
  <!-- Bootstrap -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/theme/font-awesome.css" />

  <!-- text fonts -->
  <link rel="stylesheet" href="/assets/css/theme/ace-fonts.css" />

  <!-- ace styles -->
  <link rel="stylesheet" href="/assets/css/theme/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

  <!--[if lte IE 9]>
 <link rel="stylesheet" href="assets/css/theme/ace-part2.css" />
<![endif]-->
  {{---<link rel="stylesheet" href="/assets/css/theme/ace-rtl.css" />---}}

  <!-- ace settings handler -->
  <script src="/assets/js/theme/ace-extra.js"></script>


  <!--[if lte IE 9]>
 <link rel="stylesheet" href="assets/css/theme/ace-ie.css" />
<![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!--[if lt IE 9]>
<script src="/assets/js/theme/html5shiv.js"></script>
<script src="/assets/js/theme/respond.js"></script>
<![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <!-- Extra Features CSS -->
  <link rel="stylesheet" href="/assets/css/theme/jquery-ui.custom.css" />
  <link rel="stylesheet" href="/assets/css/theme//chosen.css" />
  <link rel="stylesheet" href="/assets/css/theme/datepicker.css" />
  <link rel="stylesheet" href="/assets/css/theme/bootstrap-timepicker.css" />
  <link rel="stylesheet" href="/assets/css/theme/daterangepicker.css" />
  <link rel="stylesheet" href="/assets/css/theme/bootstrap-datetimepicker.css" />
  <link rel="stylesheet" href="/assets/css/theme/colorpicker.css" />

  {{----<link rel="stylesheet"  href="/assets/css/general.css">----}}
  <!-- For Datatable -->
  <link href="/assets/css/datatable/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body class="no-skin">
  <!-- #section:basics/navbar.layout -->
  <div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
      try {
        ace.settings.check('navbar', 'fixed')
      } catch (e) {}
    </script>

    <div class="navbar-container" id="navbar-container">
      <!-- #section:basics/sidebar.mobile.toggle -->
      <div class="navbar-header pull-left">
        <!-- #section:basics/navbar.layout.brand -->
        <a href="/" class="navbar-brand">
          <small>
            <i class="fa fa-leaf"></i>
            Project
          </small>
        </a>

      </div>

      <!-- #section:basics/navbar.dropdown -->
      <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">

          <li class="light-blue">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="/assets/avatars/user.jpg" alt="Jason's Photo" />
              <span class="user-info">
                <small>Welcome,</small>
                {{ Auth::user()->name }}
              </span>
              <i class="ace-icon fa fa-caret-down"></i>
            </a>

            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li>
                <a href="{{ url('/home') }}">
                  <i class="fa fa-home"></i>Dashboard
                </a>
              </li>
              <li>
                <a href="{{url('/profile')}}">
                  <i class="ace-icon fa fa-cog"></i>
                  Settings
                </a>
              </li>

              <li>
                <a href="{{url('/profile/picture')}}">
                  <i class="ace-icon fa fa-photo"></i>
                  My Picture
                </a>
              </li>

              <li>
                <a href="{{url('/profile/video')}}">
                  <i class="ace-icon fa fa-play-circle-o"></i>
                  My Video
                </a>
              </li>
              <li>
                <a href="{{url('message/inbox')}}">
                  <i class="ace-icon fa fa-envelope-o"></i>
                  My message box
                </a>
              </li>
              <li class="divider"></li>

              <li>
                <a href="{{ url('/logout') }}">
                  <i class="ace-icon fa fa-power-off"></i>
                  Logout
                </a>
              </li>
            </ul>
          </li>

          <!-- /section:basics/navbar.user_menu -->
        </ul>
      </div>

      <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
  </div>

  <!-- /section:basics/navbar.layout -->
  <div class="main-container" id="main-container">
    <script type="text/javascript">
      try {
        ace.settings.check('main-container', 'fixed')
      } catch (e) {}
    </script>

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar responsive">
      <script type="text/javascript">
        try {
          ace.settings.check('sidebar', 'fixed')
        } catch (e) {}
      </script>
      <ul class="nav nav-list">
        <li class="{{ (Request::is('*home') ? 'active' : '') }}">
          <a href="/home">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
          </a>

          <b class="arrow"></b>
        </li>



        <li>
          <a href="{{url('/profile')}}">
            <i class="ace-icon fa fa-cog"></i>
            Settings
          </a>
        </li>

        <li>
          <a href="{{url('/profile/picture')}}">
            <i class="ace-icon fa fa-photo"></i>
            My Picture
          </a>
        </li>

        <li>
          <a href="{{url('/profile/video')}}">
            <i class="ace-icon fa fa-play-circle-o"></i>
            My Video
          </a>
        </li>
        <li>
          <a href="{{url('message/inbox')}}">
            <i class="ace-icon fa fa-envelope-o"></i>
            My message box
          </a>
        </li>



      </ul><!-- /.nav-list -->

      <!-- #section:basics/sidebar.layout.minimize -->
      <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
      </div>

      <!-- /section:basics/sidebar.layout.minimize -->
      <script type="text/javascript">
        try {
          ace.settings.check('sidebar', 'collapsed')
        } catch (e) {}
      </script>
    </div>

    <!-- /section:basics/sidebar -->
    <div class="main-content">
      <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
          <script type="text/javascript">
            try {
              ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {}
          </script>

          <!-- #section:basics/content.searchbox -->
          <div class="nav-search" id="nav-search">
            <form class="form-search" action="{{ url('/members/search') }}" method="GET">
              <span class="input-icon">
                <input type="text" placeholder="Search members" class="nav-search-input" id="nav-search-input" autocomplete="off" name="name" />
                <i class="ace-icon fa fa-search nav-search-icon"></i>
              </span>
            </form>
          </div><!-- /.nav-search -->

          <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">

          <div class="row">
            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
              @yield('content')
              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->

    <div class="footer">
      <div class="footer-inner">
        <!-- #section:basics/footer -->
        <div class="footer-content" style="line-height:5px">
          <p>&copy; 2021 Company, Inc. &middot; </p>
          &nbsp; &nbsp;
        </div>
        <!-- /section:basics/footer -->
      </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
  </div><!-- /.main-container -->

  <!-- basic scripts -->


  <!--[if !IE]> -->
  <script type="text/javascript">
    window.jQuery || document.write("<script src='/assets/js/jquery.min.js'>" + "<" + "/script>");
  </script>

  <!-- <![endif]-->

  <!--[if IE]>
  <script type="text/javascript">
  window.jQuery || document.write("<script src='/assets/js/jquery.min.js'>"+"<"+"/script>");
  </script>
  <![endif]-->

  <script src="/assets/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/theme/jquery.mobile.custom.js'>" + "<" + "/script>");
  </script>
  <script src="/assets/js/holder.js"></script>

  <!-- page specific plugin scripts -->

  <!--Extra feature--->

  <script src="/assets/js/theme/jquery-ui.custom.js"></script>
  <script src="/assets/js/theme/jquery.ui.touch-punch.js"></script>
  <script src="/assets/js/theme/chosen.jquery.js"></script>
  <script src="/assets/js/theme/fuelux/fuelux.spinner.js"></script>
  <script src="/assets/js/theme/date-time/bootstrap-datepicker.js"></script>
  <script src="/assets/js/theme/date-time/bootstrap-timepicker.js"></script>
  <script src="/assets/js/theme/date-time/moment.js"></script>
  <script src="/assets/js/theme/date-time/daterangepicker.js"></script>
  <script src="/assets/js/theme/date-time/bootstrap-datetimepicker.js"></script>
  <script src="/assets/js/theme/bootstrap-colorpicker.js"></script>
  <script src="/assets/js/theme/jquery.knob.js"></script>
  <script src="/assets/js/theme/jquery.autosize.js"></script>
  <script src="/assets/js/theme/jquery.inputlimiter.1.3.1.js"></script>
  <script src="/assets/js/theme/jquery.maskedinput.js"></script>
  <script src="/assets/js/theme/bootstrap-tag.js"></script>

  <!-- ace scripts -->
  <script src="/assets/js/theme/ace/elements.scroller.js"></script>
  <script src="/assets/js/theme/ace/elements.colorpicker.js"></script>
  <script src="/assets/js/theme/ace/elements.fileinput.js"></script>
  <script src="/assets/js/theme/ace/elements.typeahead.js"></script>
  <script src="/assets/js/theme/ace/elements.wysiwyg.js"></script>
  <script src="/assets/js/theme/ace/elements.spinner.js"></script>
  <script src="/assets/js/theme/ace/elements.treeview.js"></script>
  <script src="/assets/js/theme/ace/elements.wizard.js"></script>
  <script src="/assets/js/theme/ace/elements.aside.js"></script>
  <script src="/assets/js/theme/ace/ace.js"></script>
  <script src="/assets/js/theme/ace/ace.ajax-content.js"></script>
  <script src="/assets/js/theme/ace/ace.touch-drag.js"></script>
  <script src="/assets/js/theme/ace/ace.sidebar.js"></script>
  <script src="/assets/js/theme/ace/ace.sidebar-scroll-1.js"></script>
  <script src="/assets/js/theme/ace/ace.submenu-hover.js"></script>
  <script src="/assets/js/theme/ace/ace.widget-box.js"></script>
  <script src="/assets/js/theme/ace/ace.settings.js"></script>
  <script src="/assets/js/theme/ace/ace.settings-rtl.js"></script>
  <script src="/assets/js/theme/ace/ace.settings-skin.js"></script>
  <script src="/assets/js/theme/ace/ace.widget-on-reload.js"></script>
  <script src="/assets/js/theme/ace/ace.searchbox-autocomplete.js"></script>
  <!-- Few extra utlity JS  -->
  <script src="/assets/js/holder.js"></script>
  <!---DATATABLE JS --->
  <script src="/assets/js/datatable/jquery.dataTables.min.js"></script>

  <!-- Page specific JS goes here -->
  @yield('footerjs')
  <!-- Page specific JS END here -->
</body>

</html>