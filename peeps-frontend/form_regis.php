<?php 

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Buat Akun</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="logincss/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/logincss/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/logincss/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="logincss/logincss/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/logincss/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logincss/css/util.css">
	<link rel="stylesheet" type="text/css" href="logincss/css/main.css">
	 <link rel="stylesheet" href="logincss/css/style.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="page--header pt--60 pb--60 text-center" style="background-image: url('img/hardwood-1851071__340.jpg'); height: 100%;" data-overlay="0.85">
		<br>
			<div class="wrap-login100" >
				<div class="login100-pic js-tilt" data-tilt >
					<img src="logincss/images/img-01.png" alt="IMG" style="margin-top: 20px;">
				</div>

				<form action='proses_regis.php' enctype='multipart/form-data' method='post'>
					<span class="login100-form-title" style="margin-top: -55px;">
						Buat Akun Baru
					</span>

					<div class="image-upload" style="margin-top: -20px; margin-bottom: 15px;">

    					<label id="labelnya" for="userfile">
        				<img src="logincss/images/icons/photo(1).png" style="margin-left: 100px;" />
    					</label>
    					<img id="preview" width="350px"/>
    					<p style="font-size: 10px; color: blue; margin-top: -8px; margin-bottom: 5px;">*upload foto profile</p>

    					<input id="userfile" name="userfile" type="file" style="margin-left: 50px;" onchange="tampilkanPreview(this,'preview')"/>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Nama tidak boleh kosong">
						<input id="nama" class="input100" type="text" name="nama" placeholder="Nama">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

  <div class="dropdown input100" style="margin-bottom: 8px; height: 50px; width: 100%;">
  		<span class="focus-input100"></span>
  		<span class="symbol-input100">
			<i class="fa fa-envelope" aria-hidden="true"></i>
		</span>
    <select id="gender" name="gender" class="dropdown-select input100" style="font-size: 16px; font-style: bold; ">
      <option value="0" >Gender</option>
      <option value="1" >Laki-Laki</option>
      <option value="2" >Perempuan</option>
    </select>
  </div>

					<div class="wrap-input100 validate-input" data-validate = "Nama tidak boleh kosong">
						<input id="hobi" class="input100" type="text" name="hobi" placeholder="Hobi">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Email tidak boleh kosong">
						<input id="email" class="input100" type="text" name="email" placeholder="Email_anda@xyz.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username tidak boleh kosong">
						<input id="username" class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<p style="font-size: 10px; color: blue; margin-top: -8px; margin-bottom: 5px;">*username ini yang akan terlihat dipostingan anda</p>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input id="pw" class="input100" type="password" name="pw" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button  name="btnregis" class="login100-form-btn">
							Buat Akun
						</button>
					</div>
						<a class="txt2" href="loginusers.php">
							Jika sudah ada akun, silakan login.
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					<br>
					<br>

					<div class="text-center" >
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
function tampilkanPreview(userfile,idpreview)
{
  var gb = userfile.files;
  for (var i = 0; i < gb.length; i++)
  {
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);
    var reader = new FileReader();
    if (gbPreview.type.match(imageType))
    {
      //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element)
      {
        return function(e)
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
      //mnghilangkan icon
      var x = document.getElementById("labelnya");
		x.style.display = "none";
      }
      else
      {
        //jika tipe data tidak sesuai
        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
      }
  }
}
</script>

<script type="text/javascript">
}
</script>

	
<!--===============================================================================================-->	
	<script src="logincss/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="logincss/vendor/bootstrap/js/popper.js"></script>
	<script src="logincss/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="logincss/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="logincss/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="logincss/js/main.js"></script>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
</body>
</html>