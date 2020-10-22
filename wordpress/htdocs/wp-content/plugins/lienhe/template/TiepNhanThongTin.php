<?php
$con=mysqli_connect("localhost","root","26051997");
mysqli_select_db($con,"bitnami_wordpress"); 
mysqli_query($con,"SET NAMES 'utf8'");

if( isset($_POST['Ten']) )
{

	$ten = (isset($_POST['Ten'])?$_POST['Ten']:0 );
	$diachi = (isset($_POST['Diachi'])?$_POST['Diachi']:0 );
	$email = (isset($_POST['Email'])?$_POST['Email']:0 );
	$sodienthoai = (isset($_POST['SDT'])?$_POST['SDT']:0 );
	$query 	= "INSERT into wp_lienhe (tendoanhnghiep,diachi,email,sodienthoai) values('$ten','$diachi','$email','$sodienthoai')";
	$result = mysqli_query($con,$query);
	if($result){
		echo "<script language='javascript'>
		alert('Thêm thành công')
		</script>";
	}

}
?>
<div class="wrap">
		<form name="adm" action="" method="post" >
			<div class="trow">
				<span class= 'ttitle'>Tên doanh nghiệp:</span>
				<input type = "text" name = "Ten" />
			</div>
			<div class="trow">
				<span class= 'ttitle'>Địa chỉ:</span>
				<input type = "text" name = "Diachi" />
			</div>
			<div class="trow">
				<span class= 'ttitle'>Email:</span>
				<input type = "email" name = "Email" />
			</div>
			<div class="trow">
				<span class= 'ttitle'>Số điện thoại:</span>
				<input type = "text" name = "SDT" />
			</div>
			<p class="submit">  
				<input type="submit" name="submit" value="Gửi" style="font-weight: bold;" />
			</p>
		</form>		
</div>