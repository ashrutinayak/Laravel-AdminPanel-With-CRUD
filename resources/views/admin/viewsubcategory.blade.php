@include('layout.header')
@include('layout.sidebar')
<div class="page-content">
@if(isset($msg))
<div class="alert alert-success" style="
    margin-left: 20%;
    margin-right: 20%;
    margin-top: 2%;
">
        {{ $msg }}
    </div>
@endif
@if(isset($update))
<div class="alert alert-success" style="
    margin-left: 20%;
    margin-right: 20%;
    margin-top: 2%;
">
        {{ $update }}
    </div>
@endif
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h2>View SubCategory</h2>
						</div>
					</div>
				</div>
			</header>
          
			<section class="card">
				<div class="card-block">
					<table id="example" class="display table table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
                            <th>Sr No</th>                        
							<th>SubCategory Name</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
						</tr>
						</thead>
						
						<tbody>
                        @foreach ($subcategory as $f)
						<tr>
							<td>{{ $loop->index+1 }}</td>
							<td>{{$f->subname}}</td>
                            <td>{{$f->getcategory->name}}</td>
							<td><a href="{{route('editsubcategory',$f->subid)}}" >Edit</a></td>
                            <td><a href="#"  data-href="{{route('deletesubcategory',$f->subid)}}" class="deletebtn">Delete</a></td>
						</tr>
                        @endforeach
						</tbody>
					</table>
				</div>
			</section>
		</div><!--.container-fluid-->
	</div><!--.page-content-->

    @yield('script')
    <script src="js/lib/datatables-net/datatables.min.js"></script>

	<script>
		$(function() {
			$('#example').DataTable({
				responsive: true
			});
		});
	</script>
    <script>
    $(".deletebtn").click(function(){
        if (confirm("Are you sure to delete subcategory"+ " ?")) 
        {
            window.location=$(this).data("href");
        }
    });
</script>