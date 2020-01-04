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

<form action='proses_edit_post.php' enctype='multipart/form-data' method='post'>

    <input type="hidden" name="op" value="post">
	<input type='text' name='user' placeholder='Subject *' class='form-control' value='<?php echo $data['id_user']?>' required>
	<input type='text' name='post' placeholder='Subject *' class='form-control' value='<?php echo $data['id_post']?>' required>

    <div class='row gutter--20'>
        <div class='col-xs-12'>
            <div class='form-group'>
                <input type='text' name='subject' placeholder='Subject *' class='form-control' value='<?php echo $data['judul']?>' required>
            </div>
        </div>
		
		<div class='col-xs-12'>
            <div class='form-group'>
                <select name="category" class="form-control form-sm"required>
                                                                        <option value="bahasa" <?php if($data['category']=="bahasa"){echo "selected='selected'";}?>>Bahasa</option>
                                                                        <option value="film"<?php if($data['category']=="film"){echo "selected='selected'";}?>>Film</option>
                                                                        <option value="olahraga"<?php if($data['category']=="olahraga"){echo "selected='selected'";}?>>Olahraga</option>
																	
            </div>
        </div>

        <div class='col-xs-12'>
            <div class='form-group'>
                <textarea name='message' placeholder='Message *' class='form-control' required><?php echo $data['deskripsi']?></textarea>
            
			<div class='image-upload'>
			<label for='file-input'>
				<img src='picture.png' height='24px' width='24px'/>
			</label>
			<input name='image' id='file-input' type='file' onchange='readURL(this);' />
			<br><img id='blah'/>
		</div>
		</div>
        </div>

        <div class='col-xs-12'>
            <button name='submit' type='submit' class='btn btn-primary mt--10'>Edit Message</button>
        </div>
    </div>

    <div class='status'></div>
    
</form>
							