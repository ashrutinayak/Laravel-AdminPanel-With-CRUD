<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <ul class="side-menu-list">
	        <li class="grey with-sub">
	            <span>
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Dashboard</span>
	            </span>
	            <ul>
	                <li><a href="#"><span class="lbl">Default</span><span class="label label-custom label-pill label-danger">new</span></a></li>
	            </ul>
	        </li>
	        <li class="brown with-sub">
	            <span>
	                <i class="font-icon glyphicon glyphicon-tint"></i>
	                <span class="lbl">Category</span>
	            </span>
	            <ul>
	                <li><a href=" {{ route('addcategory')}}"><span class="lbl">Add Category</span></a></li>
	                <li><a href="{{ route('viewcategory')}}"><span class="lbl">View Category</span></a></li>
	            </ul>
	        </li>
	        <li class="purple with-sub">
	            <span>
	                <i class="font-icon font-icon-comments active"></i>
	                <span class="lbl">SubCategory</span>
	            </span>
	            <ul>
	                <li><a href="{{ route('addsubcategory')}}"><span class="lbl">Add SubCategory</span></a></li>
	                <li><a href="{{ route('viewsubcategory')}}"><span class="lbl">View SubCategory</span></a></li>
	            </ul>
	        </li>
	        <li class="gold with-sub">
	            <span>
	                <i class="font-icon font-icon-edit"></i>
	                <span class="lbl">Product</span>
	            </span>
	            <ul>
	                <li><a href="{{ route('addproduct')}}"><span class="lbl">Add Product</span></a></li>
	                <li><a href="{{ route('viewproduct')}}"><span class="lbl">View Product</span></a></li>
	            </ul>
	        </li>

	</nav><!--.side-menu-->

	

	</div>
