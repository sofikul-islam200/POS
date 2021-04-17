<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title> Inventory Management System </title>

    <!-- vendor css -->
    <link href="{{asset('backend')}}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{asset('backend')}}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/css/starlight.css">
  </head>

  <body>

    <div id="app">
        <div id="leftbar" v-show=" $route.path === '/' || $route.path === '/register' || $route.path === '/forgot' ? false : true" style="display:none">
            <!-- ########## START: LEFT PANEL ########## -->
        <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Inventory</a></div>
        <div class="sl-sideleft">
          <div class="input-group input-group-search">
            <input type="search" name="search" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn"><i class="fa fa-search"></i></button>
            </span><!-- input-group-btn -->
          </div><!-- input-group -->

          <label class="sidebar-label">Navigation</label>
          <div class="sl-sideleft-menu">
            <a href="index.html" class="sl-menu-link active">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="#" class="sl-menu-link">
              <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label"> Manage Employe </span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a  class="nav-link"> <router-link to="/AddEmploye" style="color:black">Add New Employe</router-link> </a></li>
              <li class="nav-item"><a  class="nav-link"> <router-link to="/AllEmploye" style="color:black">View All Employe</router-link> </a></li>

            </ul>
            <a href="#" class="sl-menu-link">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label"> Manage Customer </span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a  class="nav-link"> <router-link to="/AddCustomer" style="color:black">Add New Customer</router-link> </a></li>
              <li class="nav-item"><a  class="nav-link"> <router-link to="/AllCustomer" style="color:black">View All Customer</router-link> </a></li>
            </ul>
            <a href="#" class="sl-menu-link">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Manage Category</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a  class="nav-link"><router-link to="/AddCategory" style="color:black">Add Category</router-link></a></li>
              <li class="nav-item"><a class="nav-link"><router-link to="/AllCategory" style="color:black">All Category</router-link></a></li>
            </ul>

            <a href="#" class="sl-menu-link">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                <span class="menu-item-label">Manage Supplier</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a  class="nav-link"> <router-link to="/AddSupplier" style="color:black">Add New Supplier</router-link> </a></li>
              <li class="nav-item"><a  class="nav-link"> <router-link to="/AllSupplier" style="color:black">All Supplier</router-link> </a></li>
            </ul>


            <a href="#" class="sl-menu-link">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label"> Manage Product </span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a class="nav-link"> <router-link to="/AddProduct" style="color:black"> Add Product </router-link> </a></li>
              <li class="nav-item"><a class="nav-link"> <router-link to="/AllProduct" style="color:black"> All Product </router-link> </a></li>
            </ul>
            <a href="mailbox.html" class="sl-menu-link">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">Mailbox</span>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <a href="#" class="sl-menu-link">
              <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                <span class="menu-item-label">Pages</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
              <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
              <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
              <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
              <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
            </ul>
          </div><!-- sl-sideleft-menu -->

          <br>
        </div><!-- sl-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->
        </div>

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="sl-header" id="topbar" v-show=" $route.path === '/' || $route.path === '/register' || $route.path === '/forgot' ? false : true" style="display: none">
          <div class="sl-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
          </div><!-- sl-header-left -->
          <div class="sl-header-right">
            <nav class="nav">
              <div class="dropdown">
                <a href="" class="nav-link nav-link-profile d-flex" data-toggle="dropdown">
                    <router-link to="/logout"><span class="logged-name btn btn-outline-info"> <i class="fa fa-check"></i> <b>Sign</b> <span class="hidden-md-down"> <b>Out</b></span></span></router-link>
                  </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                  <ul class="list-unstyled user-profile-nav">
                    <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                    <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                    <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                    <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                    <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                    <li><a><i class="icon ion-power"></i> <router-link>Sign Out</router-link> </a></li>
                  </ul>
                </div><!-- dropdown-menu -->
              </div><!-- dropdown -->
            </nav>
          </div><!-- sl-header-right -->
        </div><!-- sl-header -->
        <!-- ########## END: HEAD PANEL ########## -->


        <!-- ########## START: MAIN PANEL ########## -->
        <div class="sl-mainpanel">
           <router-view></router-view>
          <footer class="sl-footer" style="margin-top: 44px;" v-show="$route.path ==='/' || $route.path === '/register' || $route.path === '/forgot' ? false : true " style="display: none">
            <div class="footer-left">
              <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
              <div>Made by ThemePixels.</div>
            </div>
            <div class="footer-right d-flex align-items-center">
              <span class="tx-uppercase mg-r-10">Share:</span>
              <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
              <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
            </div>
          </footer>
        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
    </div>

    <script src="{{asset('backend')}}/lib/jquery/jquery.js"></script>
    <script src="{{asset('backend')}}/lib/popper.js/popper.js"></script>
    <script src="{{asset('backend')}}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{asset('backend')}}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{asset('backend')}}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{asset('backend')}}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{asset('backend')}}/lib/d3/d3.js"></script>
    <script src="{{asset('backend')}}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{asset('backend')}}/lib/chart.js/Chart.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{asset('backend')}}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{asset('backend')}}/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="{{asset('backend')}}/js/starlight.js"></script>
    <script src="{{asset('backend')}}/js/ResizeSensor.js"></script>
    <script src="{{asset('backend')}}/js/dashboard.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        let token = localStorage.getItem('token');
        if(token){
            $('#topbar').css('display','');
            $('#leftbar').css('display',''),
        }
    </script>
  </body>
</html>
