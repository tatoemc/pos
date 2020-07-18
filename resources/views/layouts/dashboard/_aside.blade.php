<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src=" {{ asset('uploads/user_images/' . Auth::user()->image )}} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</p>
            </div>
        </div>  

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{route('dashboard.welcome')}}"><i class="fa fa-tachometer" style="color:lime"></i><span>@lang('site.dashboard')</span></a></li>
           
             @if (auth()->user()->hasPermission('read_categories'))
                <li><a href="{{route('dashboard.categories.index')}}"><i class="ion ion-bag" style="color:orangered"></i><span>@lang('site.categories')</span></a></li>
             @endif
             @if (auth()->user()->hasPermission('read_products'))
                <li><a href="{{ route('dashboard.products.index') }}"><i class="fa fa-th" style="color:gold"></i><span>@lang('site.products')</span></a></li>
            @endif

            @if (auth()->user()->hasPermission('read_clients'))
                <li><a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-users" style="color:green"></i><span>@lang('site.clients')</span></a></li>
            @endif
           @if (auth()->user()->hasPermission('read_orders'))
                <li><a href="{{ route('dashboard.orders.index') }}"><i class="fa fa-th" style="color:orange"></i><span>@lang('site.orders')</span></a></li>
            @endif
             @if (auth()->user()->hasPermission('read_users'))
                 <li><a href="{{route('dashboard.users.index')}}"><i class="fa fa-user" style="color:cyan"></i><span>@lang('site.users')</span></a></li>
            @endif
            <li><a href="{{route('mouncerfatcats.index')}}"><i class="fa fa-navicon" style="color:cyan"></i><span>@lang('site.mouncercats')</span></a></li>

            <li><a href="{{route('mouncerfatitems.index')}}"><i class="fa fa-th" style="color:orange"></i><span>@lang('site.mouncerfatitems')</span></a></li>
            @can('isAdmin')
            <li><a href="{{ route('dashboard.products.percent') }}"><i class="fa fa-th" style="color:cyan"></i><span>@lang('site.percent_plus')</span></a></li>
            <li><a href="{{route('dashboard.reports.index')}}"><i class="fa fa-signal" style="color:orange"></i></i><span>@lang('site.report')</span></a></li>

            <li><a href="{{route('dashboard.reports.create')}}"><i class="fa fa-signal" style="color:cyan"></i></i><span>@lang('site.product_sell_report')</span></a></li>
             @endcan
 
            <li><a href="{{ route('logout') }}"><i class="fa fa-power-off" style="color:red"></i><span>@lang('site.logout')</span></a></li>

            <li><a href="#"><span>@lang('site.copyright')</span></a></li>

            {{----}} 
            {{----}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>الخرائط</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>

    </section>

</aside>

