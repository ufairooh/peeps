<!-- Header Navbar Start -->
            <div class="header--navbar navbar bg-black" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Header Navbar Logo Start -->
                        <div class="header--navbar-logo navbar-brand">
                            <a href="index.php">
                                <h3 style="color: white">PEEPS</h3>
                            </a>
                        </div>
                        <!-- Header Navbar Logo End -->
                    </div>

                    <div id="headerNav" class="navbar-collapse collapse float--right">
                        <!-- Header Nav Links Start -->
                        <ul class="header--nav-links style--1 nav ff--primary">
                            <li class="dropdown">
                                <a href="index.php">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#">
                                    <span>Hobies</span>
                                </a>
                            </li>

                            <!-- session username -->
                            <li>
                                <a href="account.php" class="btn-link">
                                    <i class="fa mr--8 fa-user-o"></i>
                                    <span>
                                        Login/Register
                                    </span>
                                </a>
                            </li>
                            <li>
                             <?php 
                                $db->logout();
                            ?>
                                <a name="btnLogout" class="btn-link">
                                <i class="fa mr--8 fa-user-o"></i>
                                <span>
                                Logout
                                </span>
                                </a>
                            </li>
                        </ul>
                        <!-- Header Nav Links End -->
                    </div>
                </div>
            </div>
            <!-- Header Navbar End -->