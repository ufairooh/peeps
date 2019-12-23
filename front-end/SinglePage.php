<?php


class SinglePage
{

private $user;
private $content;
private $page_title;
private $page_subtitle;
private $image_link;
private $nav_links = array("Home" => "home.php", "Hobies" => "hobies.php");


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $content
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
	
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

    public function renderAll(){?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>PEEPS</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700%7CRoboto:300,400,400i,500,700">
			<link rel="stylesheet" href="css/plugins.min.css">
			<link rel="stylesheet" href="style.css">
			<link rel="stylesheet" href="css/responsive-style.css">
			<link rel="stylesheet" href="css/colors/color-1.css" id="changeColorScheme">
			<link rel="stylesheet" href="css/custom.css">
			<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
			<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
			<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>



        <body>
        <?php
        $this->renderMenu($this->nav_links);

        $this->renderMasthead($this->page_title, $this->page_subtitle, $this->image_link, $this->user);

        $this->renderContent($this->content);
		
		$this->renderWidget();
		
        ?>
        </body>
        </html>
        <?php
    }

    public function renderMenu($navlinks){
        ?>
		
        <!-- Header Section Start -->
        <header class="header--section style--1">
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
                            <a href="index.html">
                                PEEPS
                            </a>
                        </div>
                        <!-- Header Navbar Logo End -->
                    </div>

                    <div id="headerNav" class="navbar-collapse collapse float--right">
                        <!-- Header Nav Links Start -->
                        <ul class="header--nav-links style--1 nav ff--primary">
                            <?php
        while (list($name , $url) = each($navlinks)){
            $this -> renderButtonsInMenu($name, $url, $this->isCurrentPageActive($url));
        }
        ?>
                        </ul>
                        <!-- Header Nav Links End -->
                    </div>
                </div>
            </div>
			</header>
			
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

    public function renderMasthead($page_title, $page_subtitle, $image, $user){
        ?>
		<div class="page--header pt--60 pb--60 text-center" style="background-image: url('<?=$image?>');" data-overlay="0.85">
            <div class="container">
                <div class="title">
                    <h2 class="h1 text-white">peeps for finding a new friend with the same hoby</h2>
                </div>
            </div>
        </div>
        <?php
    }

    public function renderContent($content){
            ?>
            <section class="page--wrapper pt--80 pb--20">
                <div class="container">
				<div class="row">
                    <?=$content?>




				
            <?php
        
    }
	
	public function renderWidget(){
            ?>
            <!-- Main Sidebar Start -->
                    <div class='main--sidebar col-md-4 pb--60' data-trigger='stickyScroll'>
                        

                        <!-- Widget Start -->
                        <div class='widget'>
                            <h2 class='h4 fw--700 widget--title'>Notice</h2>

                            <!-- Text Widget Start -->
                            <div class='text--widget'>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some  look even slightly believable.</p>
                            </div>
                            <!-- Text Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class='widget'>
                            <h2 class='h4 fw--700 widget--title'>Forums</h2>

                            <!-- Links Widget Start -->
                            <div class='links--widget'>
                                <ul class='nav'>
                                    <li><a href='sub-forums.html'>User Interface Design<span>(12)</span></a></li>
                                    <li><a href='sub-forums.html'>Front-End Engineering<span>(07)</span></a></li>
                                    <li><a href='sub-forums.html'>Web Development<span>(37)</span></a></li>
                                    <li><a href='sub-forums.html'>Social Media Marketing<span>(13)</span></a></li>
                                    <li><a href='sub-forums.html'>Content Marketing<span>(28)</span></a></li>
                                </ul>
                            </div>
                            <!-- Links Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class='widget'>
                            <h2 class='h4 fw--700 widget--title'>Archives</h2>

                            <!-- Nav Widget Start -->
                            <div class='nav--widget'>
                                <ul class='nav'>
                                    <li>
                                        <a href='#'>
                                            <i class='fa fa-calendar-o'></i>
                                            <span class='text'>Jan - July 2017</span>
                                            <span class='count'>(86)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            <i class='fa fa-calendar-o'></i>
                                            <span class='text'>Jan - Dce 2016</span>
                                            <span class='count'>(328)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            <i class='fa fa-calendar-o'></i>
                                            <span class='text'>Jan - Dec 2015</span>
                                            <span class='count'>(427)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Nav Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class='widget'>
                            <h2 class='h4 fw--700 widget--title'>Advertisements</h2>

                            <!-- Ad Widget Start -->
                            <div class='ad--widget'>
                                <a href='#'>
                                    <img src='img/widgets-img/ad.jpg' alt='' class='center-block'>
                                </a>
                            </div>
                            <!-- Ad Widget End -->
                        </div>
                        <!-- Widget End -->
                    </div>
                    <!-- Main Sidebar End -->
				</div>
                </div>
            </section>
            <?php
        
    }
	
	
}
?>