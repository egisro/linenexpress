<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>

    <ul>
        <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Clients</span> <span class="label label-important"></span></a>
            <ul>
                <li><a href="{{ url('/admin/add-client') }}">Add Client</a></li>
                <li><a href="{{ url('/admin/view-clients') }}">View Clients</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Memberships</span> <span class="label label-important"></span></a>
            <ul>
                <li><a href="{{ url('/admin/add-membership') }}">Add Membership</a></li>
                <li><a href="{{ url('/admin/view-memberships') }}">View Memberships</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important"></span></a>
            <ul>
                <li><a href="{{ url('/admin/add-category') }}">Add Category</a></li>
                <li><a href="{{ url('/admin/view-categories') }}">View Categories</a></li>
            </ul>
        </li>

         <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important"></span></a>
            <ul>
                <li><a href="{{ url('/admin/add-product') }}">Add product</a></li>
                <li><a href="{{ url('/admin/view-products') }}">View Products</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->
