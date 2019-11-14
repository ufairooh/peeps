<?php


class SinglePage
{
private $content;
private $page_title;
private $page_subtitle;
private $image_link;
private $nav_links = array("Home" => "index.php", "Reservation" => "reserve.php", "Services" => "services.php", "About Us" => "aboutus.php");


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
        <body>
        <?php
        $this->renderMenu($this->nav_links);

        $this->renderMasthead($this->page_title, $this->page_subtitle, $this->image_link);

        $this->renderContent($this->content);
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
        foreach ($content as $title => $value) {
            ?>
            <section class="py-5">
                <div class="container">
                    <h2 class="font-weight-light"><?=$title?></h2>
                    <p><?=$value?></p>
                </div>
            </section>
            <?php
        }
    }
}
?>