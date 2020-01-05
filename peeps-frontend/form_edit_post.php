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
	 header('location:index_user.php');
}
?>

<!-- Contact Section Start -->
<div class="contact--section pt--80 pb--20">
    <div class="container">
        <!-- Map Start -->
        <div class="map mb--100" style="background-image: ''"></div>
        <!-- Map End -->

        <div class="row">
            
            <div class="col pb--60">
                <!-- Contact Form Start -->
                <div class="contact--form" data-form="ajax">
                    <div class="contact--title">
                        <h3 class="h4">Edit a Post</h3>
                    </div>

                    <div class="contact--subtitle pt--15">
                        <h4 class="h6 fw--400 text-darkest">be careful guys, typo can be killing!!</h4>
                    </div>

                    <form action='proses_edit_post.php' enctype='multipart/form-data' method='post'>

                        <!-- BELUM KE HIDDEN NIH -->
                        <input type="hidden" name="op" value="post">
                    	<input type='text' name='user' placeholder='Subject *' class='form-control' value='<?php echo $data['id_user']?>' required>
                    	<input type='text' name='post' placeholder='Subject *' class='form-control' value='<?php echo $data['id_post']?>' required>

                        <div class='row gutter--20'>
                            <br>
                            <div class='col-xs-12'>
                                <div class='form-group'>
                                    <label> Subject * </label>
                                    <input type='text' name='subject' placeholder='Subject *' class='form-control' value='<?php echo $data['judul']?>' required>
                                </div>
                            </div>
                    		
                            <br>
                    		<div class='col-xs-12'>
                                <div class='form-group'>
                                    <label> Category * </label>
                                    <select name="category" class="form-control" required>
                                        <option value="bahasa" <?php if($data['category']=="bahasa"){echo "selected='selected'";}?>>Bahasa</option>
                                        <option value="film"<?php if($data['category']=="film"){echo "selected='selected'";}?>>Film</option>
                                        <option value="olahraga"<?php if($data['category']=="olahraga"){echo "selected='selected'";}?>>Olahraga</option>
                                    </select>													
                                </div>
                            </div>

                            <br>
                            <div class='col-xs-12'>
                                <div class='form-group'>
                                    <label> Message * </label>
                                    <textarea name='message' placeholder='Message *' class='form-control' required><?php echo $data['deskripsi']?>
                                    </textarea>
                                </div>
                            </div>
                                

                            <div class='col-xs-12'>

                                <div class='image-upload'>
                                    <label for='file-input'>
                                        Choose Image * <img src='picture.png' height='30px' width='40px'/>
                                    </label>
                                    <input name='image' id='file-input' type='file' onchange='readURL(this);' />
                                    <br>
                                    <img id='blah'/>
                                </div>
                            </div>
                                
                    			
                    		

                            <div class='col-xs-12'>
                                <button name='submit' type='submit' class='btn btn-primary mt--10'>Edit Message</button>
                            </div>
                        </div>

                        <div class='status'></div>
                        
                    </form>

                </div>
                <!-- Contact Form End -->
            </div>
        </div>
    </div>
</div>
<!-- Contact Section End -->
							