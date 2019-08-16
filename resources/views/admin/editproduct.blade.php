@include('layout.header')
@include('layout.sidebar')
<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Edit Product</h3>
						</div>
					</div>
				</div>
			</header>

			<section class="card">
				<div class="card-block">
					<div class="row m-t-lg">
						<div class="col-md-12">
							<form id="form-signup_v1" name="frmstf_add" method="post" action="{{ route('updateproduct') }}">
                            @csrf    
                            <div class="form-group">
                                <label class="form-label" for="signup_v1-username">Categoryname
                                <b style="color:red;" ><label id="txtfname_err" class="error-validation errcustome"></label></b></label>
                                <div class="form-control-wrapper">
                                    <select style="height: 36px;position: relative; width: 100% !important;" id="category" name="drpcat">
                                        <option value="" selected>Select Category Name</option>
                                     @foreach($sub as $key) 
                                        <option value="{{ $key->id }}" @if($key->id == $product->catid) selected @endif>{{ $key->name}}</option>
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
                                        <input type="text" name="product_id" placeholder="Enter First Name" id="txtfname" value="{{ $product->productid }}" hidden="hidden" />
										<input id="categoryname" class="form-control" name="productname" type="text" value="{{ $product->productname }}">
									</div>
								</div>
                                								
								<div class="form-group">
									<button type="submit" class="btn" onclick="return validation();">Update Product</button>
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
    if (!ck_name.test(document.getElementById("categoryname").value.trim()) ) 
    {
        document.getElementById('txtfname_err').innerHTML = 'Please enter valid name';
        var err_flag = false;
    }
    if (document.getElementById("categoryname").value.trim()=="")
    {
        document.getElementById('txtfname_err').innerHTML = 'Category name is required';
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
    $('#category').change(function () {
      loadState($(this).val());
    });
    let cat=$(this).val();
    console.log(cat);
    $(document).ready(function () {
      loadState("{{$product->catid}}");
    });
    function loadState(countryID){  
    let stateId = "{{$product->subcatid}}"
    if(cat){
        $.ajax({
           type:"GET",
           url:"{{url('get-subcat-list')}}?cat_id="+catID,
           success:function(res){               
            if(res){
                $("#subcat").empty();
                $("#subcat").append('<option>Select State</option>');
                $.each(res,function(key,value){
                    $("#subcat").append(`<option value="${key}" ${(key == stateId ?"selected":"")}>${value}</option>`);
                });
           
            }else{
               $("#subcat").empty();
            }
           }
        });
    }else{
        $("#subcat").empty();
        
    }      
   }
</script> 