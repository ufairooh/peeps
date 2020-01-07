<?php 
include 'db.php';

if ($_SESSION['id'] == false ){
    header('location:loginusers.php');
}

require "header.php";

$id=htmlspecialchars(@$_GET['id']);
$query="SELECT * FROM post WHERE id_post='$id'";
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    $data=$execute->fetch_array(MYSQLI_ASSOC);
}else{
	 header('location:tablePost.php');
}
?>
<div class='card'>
                                    <div class='card-header'>
                                        <strong>Post</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='proses_edit_post.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
										<input type="hidden" name="op" value="post">
										<input type='hidden' name='user' placeholder='Subject *' class='form-control' value='<?php echo $data['id_user']?>' required>
										<input type='hidden' name='post' placeholder='Subject *' class='form-control' value='<?php echo $data['id_post']?>' required>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Subject</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='text-input' name='subject' placeholder='Subject' class='form-control' value='<?php echo $data['judul']?>' required=''/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="select" class="form-control" required="">
													<option value="bahasa" <?php if($data['category']=="bahasa"){echo "selected='selected'";}?>>Bahasa</option>
                                        <option value="film"<?php if($data['category']=="film"){echo "selected='selected'";}?>>Film</option>
                                        <option value="olahraga"<?php if($data['category']=="olahraga"){echo "selected='selected'";}?>>Olahraga</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Message</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <textarea id='text-input' name='message' placeholder='Message' class='form-control' required=''><?php echo $data['deskripsi']?></textarea>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Image</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input name='image' id='file-input' type='file' onchange='readURL(this);' />
													<br>
													<?php
									if (empty($_FILES)){
										echo "<img id='blah' class='card-img-top' src= 'data:image/jpeg;base64,".base64_encode($data['gambar'])."'/>";
									}
									else if (! empty($_FILES)){
									echo "<img id='blah'/>";}?>
                                                </div>
                                            </div>

                                    </div>
                                    <div class='card-footer'>
                                        <input class ='btn btn-primary btn-sm' name='submit' type='submit' value='Edit' required=''>
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