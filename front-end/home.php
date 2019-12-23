<?php
require ('SinglePage.php');
include('action.php');
$post = getPost();
$homepage = new SinglePage();
$user = "1";
$homepage -> setUser($user);
$homepage -> setImageLink("https://www.thelocal.de/userdata/images/article/ae56fc05831d6ab26b82dc0840dab79182b8c0e70b44416c7228e4f9c8f45931.jpg");
$homepage -> setPageTitle("Ticket Reservation");
$homepage -> setPageSubtitle("Buy Ticket for Europe Trips!");
$homepage -> setContent(
"<div class='main--content col-md-8 pb--60' data-trigger='stickyScroll'>
                        <div class='main--content-inner drop--shadow'>
						<form action='action.php' enctype='multipart/form-data' method='post'>
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
							<br>
                            <!-- Topics List Start -->
                            <div class='topics--list'>
                                <p>ini content</p>
                            </div>
                            <!-- Topics List End -->
                        </div>
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
	</script>");
$homepage -> renderAll();
?>