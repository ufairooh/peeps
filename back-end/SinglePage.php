<?php


class SinglePage
{
private $content;
private $page_title;
private $page_subtitle;
private $image_link;
private $nav_links = array("Post" => "table_post.php", "Advertisement" => "table_adv.php");


    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getPageTitle()
    {
        return $this->page_title;
    }

    /**
     * @param mixed $page_title
     */
    public function setPageTitle($page_title)
    {
        $this->page_title = $page_title;
    }

    /**
     * @return mixed
     */
    public function getPageSubtitle()
    {
        return $this->page_subtitle;
    }

    /**
     * @param mixed $page_subtitle
     */
    public function setPageSubtitle($page_subtitle)
    {
        $this->page_subtitle = $page_subtitle;
    }

    /**
     * @return mixed
     */
    public function getImageLink()
    {
        return $this->image_link;
    }

    /**
     * @param mixed $image_link
     */
    public function setImageLink($image_link)
    {
        $this->image_link = $image_link;
    }

    public function __set($name, $value)
    {
        $this -> $name = $value;
    }

    public function renderAll(){
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- Required meta tags-->
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="au theme template">
            <meta name="author" content="Hau Nguyen">
            <meta name="keywords" content="au theme template">

            <!-- Title Page-->
            <title>Tables</title>

            <!-- Fontfaces CSS-->
            <link href="css/font-face.css" rel="stylesheet" media="all">
            <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
            <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
            <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

            <!-- Bootstrap CSS-->
            <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

            <!-- Vendor CSS-->
            <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
            <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
            <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
            <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
            <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
            <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
            <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

            <!-- Main CSS-->
            <link href="css/theme.css" rel="stylesheet" media="all">
			<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
			<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
			<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        </head>


        <body>
            <?php
            $this->renderMenu($this->nav_links);

            $this->renderMasthead($this->page_title, $this->page_subtitle, $this->image_link);

            $this->renderContent($this->content);
    		
            ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2019.</p>
                    </div>
                </div>
            </div>

            <!-- Jquery JS-->
            <script src="vendor/jquery-3.2.1.min.js"></script>
            <!-- Bootstrap JS-->
            <script src="vendor/bootstrap-4.1/popper.min.js"></script>
            <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
            <!-- Vendor JS       -->
            <script src="vendor/slick/slick.min.js">
            </script>
            <script src="vendor/wow/wow.min.js"></script>
            <script src="vendor/animsition/animsition.min.js"></script>
            <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
            </script>
            <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
            <script src="vendor/counter-up/jquery.counterup.min.js">
            </script>
            <script src="vendor/circle-progress/circle-progress.min.js"></script>
            <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="vendor/chartjs/Chart.bundle.min.js"></script>
            <script src="vendor/select2/select2.min.js">
            </script>

            <!-- Main JS-->
            <script src="js/main.js"></script>

        </body>
        </html>
        <?php
    }

    public function renderMenu($navlinks){
        ?>
	

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="index.html">
                        <h1>PEEPS
                        </h1>
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                         <ul class="list-unstyled navbar__list">
                            <?php
            while (list($name , $url) = each($navlinks)){
                $this -> renderButtonsInMenu($name, $url, $this->isCurrentPageActive($url));
            }
            ?>
                        </ul>
                    </nav>
                </div>
            </aside>
			
        <?php
    }

    public function renderButtonsInMenu($name, $url, $isActive = true){
        ?>
        <li class="nav-item <?=$isActive?>">
            <a class="nav-link <?= $isActive ?>" href="<?= $url ?>"><?= $name ?></span></a>
        </li>
        <?php
    }

    public function isCurrentPageActive($url){
        return strpos($_SERVER['PHP_SELF'], $url) ? "active" : "not-active";
    }

    public function renderMasthead($page_title, $page_subtitle, $image){
        ?>
		<div class="page--header pt--60 pb--60 text-center" style="background-image: url('<?=$image?>');" data-overlay="0.85">
            <div class="container">
                <div class="title">
                    <h2 class="h1 text-white"><?=$page_title?></h2>
                </div>
            </div>
        </div>
        <?php
    }

    public function renderContent($content){
            ?>
                    <?=$content?>




				</div>
                </div>
            </section>
            <?php
        
    }
	
	
}
?>