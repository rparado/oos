<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
 
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('admin/dashboard')}}" class="site_title">
            	<i class="fa fa-globe"></i>
            	<span>DS v1.0</span>
            </a>
        </div>
 
        <div class="profile"><!--img_2 -->
            <div class="profile_pic">
               
                <img src="/assets/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                @if (Auth::check()) 
                <h2> Welcome, {{ ucfirst(Auth::user()->name) }}</h2>
                <span class="online-ico"></span><span class="online-text">Online</span>
                @endif
            </div>
        </div>
 		<div class="clearfix"></div>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li>
                    	<a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                           <li>
								<a href="{{url('admin/category/index')}}">Category</a>
							</li>
							<li>
								<a href="{{url('admin/product/index')}}">Product</a>
							</li>
                        </ul>
                    </li>
                  
                    <li><a><i class="fa fa-table"></i> Datas <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/category')}}">Category list</a></li>
                            <li><a href="{{url('admin/product')}}">Product list</a></li>
                            <li><a href="{{url('admin/orders')}}">Order items</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

 
        </div>
 
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>