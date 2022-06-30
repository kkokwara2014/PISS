<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('user_images',$user->userimage)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{$user->firstname.' '.$user->lastname}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            
           @if($user->profileupdated==1)
               
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        {{-- <i class="fa fa-angle-left pull-right"></i> --}}
                    </span>
                </a>
            </li>

            {{-- only Admin, Director and Manager --}}
           @if(auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Director']) || auth()->user()->hasAnyRole(['Manager']))
            <li><a href="{{ route('roles.index') }}"><i class="fa fa-briefcase"></i>Roles</a></li>
            <li><a href="{{ route('branches.index') }}"><i class="fa fa-map-marker"></i> Branches</a></li>
            <li><a href="{{ route('categories.index') }}"><i class="fa fa-cubes"></i> Medicine Categories</a></li>
            <li><a href="{{ route('brands.index') }}"><i class="fa fa-list"></i> Medicine Brands</a></li>
               
            {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Stakeholders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    
                    <li><a href="{{ route('customers.index') }}"><i class="fa fa-user"></i> Customers</a></li>
                    <li><a href="{{ route('suppliers.index') }}"><i class="fa fa-user"></i> Suppliers</a></li>
                </ul>
            </li> --}}
            <li><a href="{{ route('suppliers.index') }}"><i class="fa fa-user"></i> Suppliers</a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tag"></i>
                    <span>Stocks</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    
                    <li><a href="{{ route('stocks.create') }}"><i class="fa fa-tag"></i> Add New</a></li>
                    <li><a href="{{ route('stocks.index') }}"><i class="fa fa-tag"></i> Available</a></li>
                    <li><a href="{{ route('replenishable') }}"><i class="fa fa-tag"></i> Replenishable</a></li>
                </ul>
            </li>
            
           @endif

            <li><a href="{{ route('orders.create') }}"><i class="fa fa-exchange"></i> Make Sales</a></li>
             
            <li><a href="{{ route('userprofile') }}"><i class="fa fa-picture-o"></i> My Profile</a></li>

            @if(auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Director']) || auth()->user()->hasAnyRole(['Manager']))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span>Reports</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        {{-- <li><a href="#"><i class="fa fa-file-pdf-o"></i> All</a></li> --}}
                        <li><a href="{{ route('daily') }}"><i class="fa fa-file-pdf-o"></i> Daily</a></li>
                        <li><a href="{{ route('weekly') }}"><i class="fa fa-file-pdf-o"></i> Weekly</a></li>
                        <li><a href="{{ route('monthly') }}"><i class="fa fa-file-pdf-o"></i> Monthly</a></li>
                        <li><a href="{{ route('yearly') }}"><i class="fa fa-file-pdf-o"></i> Yearly</a></li>
                        <li><a href="{{ route('specific') }}"><i class="fa fa-file-pdf-o"></i> Specific</a></li>
                        <li><a href="{{ route('range') }}"><i class="fa fa-file-pdf-o"></i> Range</a></li>
                        
                    </ul>
                </li>
            @endif
           
            <li><a href="{{ route('transaction.index') }}"><i class="fa fa-money"></i> Transactions</a></li>
            
                @if(auth()->user()->hasAnyRole(['Admin']) || auth()->user()->hasAnyRole(['Director']) || auth()->user()->hasAnyRole(['Manager']))
                    <li><a href="{{ route('staffs.index') }}"><i class="fa fa-users"></i> Staff</a></li>
                @endif
            @endif

            {{-- only Admin --}}
           @if(auth()->user()->hasAnyRole(['Admin']) && $user->profileupdated==1)
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('pharmacy.index') }}"><i class="fa fa-user"></i> Pharmacy</a></li>
                    <li><a href="{{ route('manageusers.index') }}"><i class="fa fa-user"></i> User Management</a></li>
                    <li><a href="{{ route('login.details') }}"><i class="fa fa-user"></i> Login Trail</a></li>
                </ul>
            </li>        
           @endif
            
            <li>
                <a href="{{ route('user.logout') }}"><span class="fa fa-sign-out"></span> Sign out</a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
