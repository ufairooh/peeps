<?php
require ('SinglePage.php');

$homepage = new SinglePage();
$homepage -> setImageLink("https://www.thelocal.de/userdata/images/article/ae56fc05831d6ab26b82dc0840dab79182b8c0e70b44416c7228e4f9c8f45931.jpg");
$homepage -> setPageTitle("Ticket Reservation");
$homepage -> setPageSubtitle("Buy Ticket for Europe Trips!");
$homepage -> setContent("<!-- Main Content Start -->
                     <!-- PAGE CONTAINER-->
        <div class='page-container'>
            <!-- HEADER DESKTOP-->
            <header class='header-desktop'>
                <div class='section__content section__content--p30'>
                    <div class='container-fluid'>
                        <div class='header-wrap'>
                            <form class='form-header' action='' method='POST'>
                                <input class='au-input au-input--xl' type='text' name='search' placeholder='Search for datas &amp; reports...' />
                                <button class='au-btn--submit' type='submit'>
                                    <i class='zmdi zmdi-search'></i>
                                </button>
                            </form>
                            <div class='header-button'>
                                <div class='account-wrap'>
                                    <div class='account-item clearfix js-item-menu'>
                                        <div class='content'>
                                            <a class='js-acc-btn' href='#'>john doe</a>
                                        </div>
                                        <div class='account-dropdown js-dropdown'>
                                            <div class='info clearfix'>
                                                <div class='image'>
                                                    <a href='#'>
                                                        <img src='images/icon/avatar-01.jpg' alt='John Doe' />
                                                    </a>
                                                </div>
                                                <div class='content'>
                                                    <h5 class='name'>
                                                        <a href='#'>john doe</a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class='account-dropdown__body'>
                                                <div class='account-dropdown__item'>
                                                    <a href='#'>
                                                        <i class='zmdi zmdi-settings'></i>Setting</a>
                                                </div>   
                                            <div class='account-dropdown__footer'>
                                                <a href='#'>
                                                    <i class='zmdi zmdi-power'></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class='main-content'>
                <div class='section__content section__content--p30'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Post</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Subject</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='text-input' name='text-input' placeholder='Ketik disini' class='form-control' required=''/>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Number of Member</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='text-input' name='text-input' placeholder='Ketik disini' class='form-control' required=''/>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='text-input' class=' form-control-label'>Message</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <textarea id='text-input' name='text-input' placeholder='Ketik disini' class='form-control' required=''></textarea>
                                                </div>
                                            </div>
                                            

                                    </div>
                                    <div class='card-footer'>
                                        <input class ='btn btn-primary btn-sm' type='submit' value='Post' required=''>
                                        <a href='table_post.php'><button type='button' class='btn btn-secondary btn-sm'>
                                             Back
                                        </button></a>
                                    </div>
                                                                            </form>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
");
$homepage -> renderAll();