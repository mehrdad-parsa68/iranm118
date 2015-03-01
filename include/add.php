<?php
$error = '';

$provinces = '';
$provinces_query = " SELECT * FROM `province`" ;
$provinces_result = mysqli_query($connection,$provinces_query);
while($provinces_row = mysqli_fetch_assoc($provinces_result)){
		$provinces .="<option value='$provinces_row[id]'>$provinces_row[name]</a>";
	}
$categories = '';
$categories_query = " SELECT * FROM `category`" ;
$categories_result = mysqli_query($connection,$categories_query);
while($categories_row = mysqli_fetch_assoc($categories_result)){
		$categories .="<option value='$categories_row[id]'>$categories_row[name]</a>";
	}




					
if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
	$melli_code = $_POST['melli_code'];
    $email = $_POST['email'];
	$mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $register_date = time();
    if($password == $repassword){
		
        $user_query = "INSERT INTO `advertises`(`id`, `name`, `cat_id`, `sub_cat_id`, `slogan`, `city_id`, `province_id`, `address`, `phone`, `mobile`, `email`, `website`, `keywords`, `register_date`, `google_map`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15])";
		
        $user_result = mysqli_query($connection , $user_query);
        if($user_result){
            $error = '
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>کاربر گرامی !</strong> ثبت نام با موفقیت انجام شد . خوش آمدید
            </div>
            ';
        }
    }else{
        $error = '
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>خطا!</strong> عدم تطابق کلمه عبور با تکرار آن .
        </div>
        ';
    }
}

?>
	<div class="col-md-8 col-md-offset-2 contact">

    <div class="col-sm-12">
		<h2>ثبت اطلاعات واحد شغلی</h2>
   		 <hr>
         <form class="form-horizontal" method="post">
  <div class="form-group">
    <label for="name" class="col-sm-3 control-label pull-right">نام واحد شغلی</label>
    <div class="col-sm-9">
      <input type="text" class="form-control pull-right" name="name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="cat_id" class="col-sm-3 control-label pull-right">زمینه فعالیت</label>
    <div class="col-sm-4">
      <select type="text" class="form-control pull-right" disabled name="cat_id" id="sub_category">
      </select>
    </div>
    <div class="col-sm-5">
      <select type="text" class="form-control pull-right" name="sub_category" id="category">
      	<option value="-1">زمینه فعالیت را انتخاب کنید</option>
        <?php echo $categories; ?>
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="city" class="col-sm-3 control-label pull-right">استان و شهر</label>
    <div class="col-sm-4">
      <select type="text" class="form-control pull-right" disabled name="city" id="city">
      </select>
    </div>
    <div class="col-sm-5">
      <select type="text" class="form-control pull-right" name="province" id="province">
      	<option value="-1">استان را انتخاب کنید</option>
        <?php echo $provinces; ?>
      </select>
    </div>
  </div>
  
   <div class="form-group">
    <label for="address" class="col-sm-3 control-label pull-right">آدرس</label>
    <div class="col-sm-9">
      <input type="text" class="form-control pull-right" name="address" required>
    </div>
  </div>
   <div class="form-group">
    <label for="email" class="col-sm-3 control-label pull-right">ایمیل</label>
    <div class="col-sm-9">
      <input type="email" class="form-control pull-right" name="email">
    </div>
  </div>
   <div class="form-group">
    <label for="phone" class="col-sm-3 control-label pull-right">تلفن</label>
    <div class="col-sm-5">
      <input type="text" class="form-control pull-right" name="phone" required>
    </div>
    <label for="mobile" class="col-sm-1 control-label">موبایل</label>
    <div class="col-sm-3">
      <input type="text" class="form-control pull-right" name="mobile" required>
    </div>
    
  </div>
  <div class="form-group">
    <label for="slogan" class="col-sm-3 control-label pull-right">شعار تبلیغاتی شما</label>
    <div class="col-sm-9">
      <input type="text" class="form-control pull-right" name="slogan" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="website" class="col-sm-3 control-label pull-right">آدرس وب سایت</label>
    <div class="col-sm-9">
      <input type="text" class="form-control pull-right" style="font-family:verdana;" placeholder="http://iranm118.ir" dir="ltr" name="website">
    </div>
  </div>
  
  <div class="form-group">
    <label for="keywords" class="col-sm-3 control-label pull-right">کلمات کلیدی</label>
    <div class="col-sm-9">
      <input type="text" class="form-control pull-right" name="keywords">
    </div>
  </div>
  
  <div class="form-group">
    <label for="image" class="col-sm-3 control-label pull-right">تصویر نشان تجاری</label>
    <div class="col-sm-9">
      <input type="file" class=" pull-right" name="image">
    </div>
  </div>

 	
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submit" class="btn-submit" value="ثبت نهایی اطلاعات">
    </div>
  </div>
</form>
		
   	 	</div>
        <div class="clearfix"></div>
        <?php echo $error; ?>
	</div>
<script>
	$("#province").change(function(){
		val = $("#province").val();
    $.post("include/province_ajax.php",{province : val},
    function(data, status){
		$('#city').removeAttr('disabled');
		$('#city').html(data);
    });
});	

$("#category").change(function(){
		val = $("#category").val();
    $.post("include/category_ajax.php",{category : val},
    function(data, status){
		$('#sub_category').removeAttr('disabled');
		$('#sub_category').html(data);
    });
});	
</script>
