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
                                        <form action='proses_add_post.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
										<input type="hidden" name="op" value="post">
										<input type='hidden' name='user' placeholder='Subject *' class='form-control' value='<?php echo $_SESSION['id']?>' required>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Subject</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='text-input' name='subject' placeholder='Subject' class='form-control' required=''/>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="category" id="select" class="form-control" required="">
													<option selected hidden>Choose Category</option>
                                                        <option value="bahasa">Bahasa</option>
                                                        <option value="film">Film</option>
														<option value="olahraga">Olahraga</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Message</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <textarea id='text-input' name='message' placeholder='Message' class='form-control' required=''></textarea>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Image</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input name='image' id='file-input' type='file' onchange='readURL(this);' required/>
													<br><img id='blah'/>
                                                </div>
                                            </div>

                                    </div>
                                    <div class='card-footer'>
                                        <input class ='btn btn-primary btn-sm' name='submit' type='submit' value='Post' required=''>
                                        <a href="tablePost.php<?php echo '?id='.$_SESSION['id']; ?>"><button type='button' class='btn btn-secondary btn-sm'>
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
<?php	
}else{
	header("Location: ../peeps-frontend/index.php");
}?>

