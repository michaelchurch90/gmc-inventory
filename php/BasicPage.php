<?php
include_once 'User.php';
include_once 'Database.php';
//this class is responsible for loading a lot of the headers and footers
//still need to add some divs and layout parts of it

//also still need to implement and move user and database classes to get the admin navigation to work properly
session_start();
class BasicPage
{
        
        protected $database;
        protected $user;
        
        public function __construct()
        {
                $this->database = new Database();
	
				//try to login to the user
				$this->getUser();
                
        }
        public function loadPage()
        {
                $this->loadHeader();
                echo '<div class="body">';
                echo '<div class="bodyContents">';
                $this->loadBody();
                echo '</div>';
                $this->loadFooter();
        }
		
		public function getUser()
		{
			
			if(isset($_SESSION['user']))
			{
				
				$this->user = $_SESSION['user'];
			}
			elseif (isset($_POST['user']))
			{
				
				$this->user=$this->database->getUser($_POST['user'],$_POST['pass']);
				if($this->user==FALSE)
					$this->user=new LogOffUser();
			
				$_SESSION['user'] = new User();
				$_SESSION['user']=$this->user;
				
				
			}
			else
			{
				//$this->user= new LogOffUser();
			}	
			
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
			$this->loadScripts();
			?>
                </head>
                <body>
			<?php
			echo '<div class="header">';
			$this->loadTitle();
			$this->loadNavigation();
			echo '</div>';
                
                
        }
        public function loadPageTitle()
 		{
                echo "<title>Basic Page</title>";
        }
        public function loadCSS()
        {
                
                
                echo '<link rel="stylesheet" type="text/css" href="../css/MainStyle.css">';
        }
		
		public function loadScripts()
		{
		}
        
        public function loadFooter()
        {
			?>

			</body>
			</html>
			<?php
        }
        public function loadBody()
        {


    
        
        }
        public function loadTitle()
        {
                echo "<div id='title'><h1>GMC Inventory System</h1>
				<a href='LoginPage.php'>Log Off</a></div>";
        }
        private function loadNavigation()
        {
                echo '<div class="navigation"><ul class="nav">';
				try
				{
                $this->user->loadNavigation(); 
				}
				catch(Exception $e)
				{
					session_destroy();
					echo 'Test<script language="JavaScript">document.location.href="LoginPage.php";</script>';
				}
                echo '</ul></div>';     
        }
		
		//if the user is logged in return true otherwise try and log in.
		public function checkLoggedIn()
		{
			if($this->user->isLoggedIn())
				return true;
			else
			{
				return false;	
			}
		}
}
?>