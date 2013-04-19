<?php
include_once 'BasicPage.php';


class HomeScreen extends BasicPage
{
        //put the form elements in here for each page
		public function loadPageTitle()
 		{
                echo "<title>Home</title>";
        }
		public function __construct()
		{
			parent::__construct();
		}
        public function loadBody()
        {
                
                $announcements = $this->database->getAnnouncements();
                $announcements->toTable();
       			
        }
}

//Create the class and load page elements

$homeScreen = new HomeScreen();
$homeScreen->loadPage();
?>