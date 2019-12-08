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
                                <!-- DATA TABLE -->
                                <h3 class='title-5 m-b-35'>Post Data</h3>
                                <div class='table-data__tool'>
                                    <div class='table-data__tool-right'>
                                        <button class='au-btn au-btn-icon au-btn--green au-btn--small'>
                                            <i class='zmdi zmdi-plus'></i>Input new post</button>                                        
                                    </div>
                                </div>
                                <div class='table-responsive m-b-40'>
                                    <table class='table table-data3'>
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>author</th>
                                                <th>post</th>
                                                <th>member/s</th>
                                                <th>comment detail/s</th>
                                                <th>date created</th>
                                                <th>date updated</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td><div class='table-data-feature'>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <i class='zmdi zmdi-edit'></i>
                                                        </button>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                            <i class='zmdi zmdi-delete'></i>
                                                        </button>
                                                    </div></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
");
$homepage -> renderAll();