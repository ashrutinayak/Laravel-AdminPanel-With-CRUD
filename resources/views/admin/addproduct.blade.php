@include('layout.header')
@include('layout.sidebar')
<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Add Product</h3>
						</div>
					</div>
				</div>
			</header>

			<section class="card">
				<div class="card-block">
					<div class="row m-t-lg">
						<div class="col-md-12">
							<form id="form-signup_v1" name="frmstf_add" method="post" action="{{ route('addpro') }}">
                            @csrf    
                                <div class="form-group">
                                    <label class="form-label" for="signup_v1-username">Category
									<div class="form-control-wrapper">
                                    <select style="height: 36px;position: relative; width: 100% !important;" id="category" name="drpcat" required>
                                        <option value="" selected>Select Category Code</option>
                                            @foreach($category as $key)
                                        
                                            <option value="{{ $key->id}}">{{ $key->name}}</option>
                    
                                            @endforeach
                                     </select>
									</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="signup_v1-username">SubCategory
									<div class="form-control-wrapper">
                                    <select id="subcat" style="height: 36px;position: relative; width: 100% !important;" name="drpsubcat" required>
                                        <option value="" selected>Select SubCategory Code</option>
                                           
                                     </select>
									</div>
								</div>
                                <div class="form-group">
                                    <label class="form-label" for="signup_v1-username">Productname
                                    <b style="color:red;" ><label id="txtfname_err" class="error-validation errcustome"></label></b></label>
									<div class="form-control-wrapper">
										<input id="productname" class="form-control" name="productname" type="text">
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn" onclick="return validation();">Add Product</button>
								</div>
							</form>
						</div>
						
					</div><!--.row-->
				</div>
			</section>
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@yield('scrpit')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
function validation () 
{
  var err = 0;
  var ext_err = 0;
  var ck_name = /^[a-zA-Z ]*$/;
  // var ck_num = /^\-{0,1}(?:[0-9]+){0,1}(?:\.[0-9]+){0,1}$/i;
  var err_flag = true;
    if (!ck_name.test(document.getElementById("productname").value.trim()) ) 
    {
        document.getElementById('txtfname_err').innerHTML = 'Please enter valid name';
        var err_flag = false;
    }
    if (document.getElementById("productname").value.trim()=="")
    {
        document.getElementById('txtfname_err').innerHTML = 'SubCategory name is required';
        var err_flag = false;
    }
    if(err_flag == false)
    { 
        return false;
    }
    else
    {
        document.frmstf_add.submit();
    }
 };
</script>

<script type="text/javascript">
    $('#category').change(function(){
    var catID = $(this).val();    
    if(catID){
        $.ajax({
           type:"GET",
           url:"{{url('get-subcat-list')}}?cat_id="+catID,
           success:function(res){               
            if(res){
                console.log(res);
                $("#subcat").empty();
                $("#subcat").append('<option>Select Subcategory!!!</option>');
                $.each(res,function(key,value){
                    $("#subcat").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#subcat").empty();
            }
           }
        });
    }else{
        $("#subcat").empty();
        
    }      
   });
</script>
