<form action='./proses/prosestambah.php' enctype='multipart/form-data' method='post'>

    <input type="hidden" name="op" value="post">
	<input type='text' name='user' placeholder='Subject *' class='form-control' value='$user' required>

    <div class='row gutter--20'>
        <div class='col-xs-12'>
            <div class='form-group'>
                <input type='text' name='subject' placeholder='Subject *' class='form-control' required>
            </div>
        </div>
		<div class='col-xs-12'>
            <div class='form-group'>
                <input type='number' name='jumlah' onkeypress='return Angkasaja(event)' placeholder='Jumlah Anggota (hanya angka) *' class='form-control' required>
            </div>
        </div>

        <div class='col-xs-12'>
            <div class='form-group'>
                <textarea name='message' placeholder='Message *' class='form-control' required></textarea>
            
			<div class='image-upload'>
			<label for='file-input'>
				<img src='picture.png' height='24px' width='24px'/>
			</label>
			<input name='image' id='file-input' type='file' onchange='readURL(this);' required/>
			<br><img id='blah'/>
		</div>
		</div>
        </div>

        <div class='col-xs-12'>
            <button name='submit' type='submit' class='btn btn-primary mt--10'>Send Message</button>
        </div>
    </div>

    <div class='status'></div>
    
</form>
							