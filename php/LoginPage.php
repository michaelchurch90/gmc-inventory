<?php
include_once 'BasicPage.php';


class LoginPage extends BasicPage
{
                //overridden so navigation will not load
				
		public function __construct()
		{
			parent::__construct();
			session_destroy();
			$this->user = new User();
			/*
			if($this->user->isLoggedIn())
			echo "IS logged in";
			else echo "not logged in";
			*/
		}
        public function loadHeader()
        {
                
                ?>
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"          "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <?php
                $this->loadPageTitle();
                $this->loadCSS();
                ?>
                </head>
                
                <body>
        <div class="container">
                <?php
                echo '<div class="header">';
                $this->loadTitle();
                echo '</div>';
                
                
        }
        

        public function loadBody()
        {
         
        ?>
        <form id="form1" name="form1" method="post" action="HomeScreen.php">
            <label for="user">Username</label>
            <input type="text" name="user" id="user" />
            <br/>
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" />
            <br/>
            <input type="submit" name="submit"/>
        </form>       
        <?php
        }
        
        
}

$loginPage = new LoginPage();
$loginPage->loadPage();
?>
