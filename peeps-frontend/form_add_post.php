<br>
<hr><hr>
<form action='proses_add_post.php' enctype='multipart/form-data' method='post'>
        <h2>Tulis Kegiatan Anda</h2>
    <input type="hidden" name="op" value="post">
	<input type='hidden' name='user' placeholder='Subject *' class='form-control' value='<?php echo $_SESSION['id']?>' required>

    <div class='row gutter--20'>
        <div class='col-xs-12'>
            <div class='form-group'>
                <input type='text' name='subject' placeholder='Subject *' class='form-control' required>
            </div>
        </div>
		
		<div class='col-xs-12'>
            <div class='form-group'>
                <select name="category" class="form-control form-sm"required>
				<option selected hidden>Choose Category</option>
                    <option value="bahasa">Bahasa</option>
                    <option value="film">Film</option>
                    <option value="olahraga">Olahraga</option>
                    </select>												
            </div>
        </div>

        <div class='col-xs-12'>
                <textarea name='message' placeholder='Message *' class='form-control' required></textarea>
            <br>
			<div class='image-upload'>
			<label for='file-input'>
				<img src='picture.png' height='24px' width='24px'/>            <p style="font-size: 10px; color: blue;">*upload foto</p>
			</label>
			<input name='image' id='file-input' type='file' onchange='readURL(this);' required/>
			<br><img id='blah'/>
		</div>
        </div>

        <div class='col-xs-12' style="margin-top: -30px;">
            <button name='submit' type='submit' class='btn btn-primary mt--10'>Send Message</button>
        </div>
    </div>
<!-- 
    <div class='status'></div> -->
    
</form>
							