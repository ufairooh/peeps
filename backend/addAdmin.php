<?php 
include 'db.php';

if ($_SESSION['id'] == false && $_SESSION['username'] == false && $_SESSION['role'] == ""){
    header('location:./peepsloginusers.php');
}

require "header.php";
if($_SESSION['role'] != ""){?>
<div class='card'>
                                    <div class='card-header'>
                                        <strong>Post</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='proses_add_admin.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
										<input type="hidden" name="op" value="post">
										<input type='hidden' name='user' placeholder='Subject *' class='form-control' value='<?php echo $_SESSION['id']?>' required>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Nama</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input id="nama" class="input100" type="text" name="nama" placeholder="Nama"  required />
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select id="gender" name="gender" class="dropdown-select input100" style="font-size: 16px; font-style: bold; "  required>
                                                    <option selected="hidden" >Gender</option>
                                                    <option value="Laki-laki" >Laki-Laki</option>
                                                    <option value="Perempuan" >Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Email</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input id="email" class="input100" type="text" name="email" placeholder="Email_anda@xyz.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  required />
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Username</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input id="username" class="input100" type="text" name="username" placeholder="Username"  required />
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Password</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input id="pw" class="input100" type="password" name="pw" placeholder="Password"  required />
                                                </div>
                                            </div>
                                                                <div class="image-upload" style="margin-top: -20px; margin-bottom: 15px;">

                        <label id="labelnya" for="userfile">
                        <img src="images/photo(1).png" style="height: 60px;; width: 60px; " />
                        </label>
                        <img id="preview" width="60px"/>
                        <p style="font-size: 10px; color: blue; margin-top: -8px; margin-bottom: 5px;">*upload foto profile</p>

                        <input id="userfile" name="userfile" type="file" onchange="tampilkanPreview(this,'preview')" required />
                    </div>
<!--                                             <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Image</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input name='image' id='file-input' type='file' onchange='readURL(this);' required/>
													<br><img id='blah'/>
                                                </div>
                                            </div> -->

                                    </div>
                                    <div class='card-footer'>
                                        <input class ='btn btn-primary btn-sm' name='submit' type='submit' value='Post' required=''>
                                        <a href='tablePost.php'><button type='button' class='btn btn-secondary btn-sm'>
                                             Back
                                        </button></a>
                                    </div>
                            </form>

                                </div>
	<script type='text/javascript'>
					function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(500)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		function Angkasaja(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
			return true;
		}
	</script>
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
<?php	
}else{
	header("Location: ../peeps-frontend/index.php");
}?>

