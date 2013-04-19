<?php
class User
{
        protected $isAdmin;
        public $UserName;
        private $password;
		private $fName;
		private $lName;
		private $email;
//set null for default constructor
		public function __construct($uName=NULL,$pass=NULL,$fn=NULL,$ln=NULL,$eml=NULL)
		{
			$this->isAdmin =0;
			$this->UserName = $uName;
			$this->password = $pass;
			$this->fName=$fn;
			$this->lName=$ln;
			$this->email=$eml;
		}
        
		public function setAttributes($User)
		{
			$this->isAdmin=$User->isAdmin;
			$this->UserName = $User->UserName;
			$this->password = $User->password;
			$this->fName=$User->fName;
			$this->lName=$User->lName;
			$this->email=$User->email;
		}
        
        public function getPriviledge()
        {

                return $this->priviledge;
        }
        public function getUserName()
		{
			return $this->UserName;
		}
        public function loadNavigation()
        {
                ?>   
        <li <?php if(strPos($_SERVER["REQUEST_URI"],"HomeScreen.php")!=false) echo "class='curPage'"?>><a href="HomeScreen.php">Home</a></li>
        <li <?php if(strPos($_SERVER["REQUEST_URI"],"SearchPage.php")!=false) echo "class='curPage'"?>><a href="SearchPage.php">Search</a></li>
        <li <?php if(strPos($_SERVER["REQUEST_URI"],"AddItemPage.php")!=false) echo "class='curPage'"?>><a href="AddItemPage.php">Add Item</a></li>
        <li <?php if(strPos($_SERVER["REQUEST_URI"],"AccountPage.php")!=false) echo "class='curPage'"?>><a href="AccountPage.php">Account</a></li>
        
        <?php
		}
		public function isLoggedIn()
		{
			if($this->UserName ==NULL)
			{
				return false;
			}
			
			return true;
        }
		
		public function loggOff()
		{
			$this->priviledge = NULL;
			$this->userName = NULL;
			$this->password = NULL;
			session_destroy();
			   echo '<script language="JavaScript">document.location.href="LoginPage.php";</script>';
			   echo "Done";
		}
		
		
		
		
		public function __toString()
		{
			return "$this->isAdmin $this->UserName $this->password $this->fName $this->lName $this->email";
		}
		
	
        


}
class Admin extends User
{
	
			public function __construct($uName=NULL,$pass=NULL,$fn=NULL,$ln=NULL,$eml=NUL)
		{
			parent::__construct($uName,$pass,$fn,$ln,$eml);
			$this->isAdmin =1;
		}
    
        public function loadNavigation()
        {
			//echo "test";
                User::loadNavigation();
                if(strPos($_SERVER["REQUEST_URI"],"Admin")!=false)
                echo '<li class="curPage"><a href="AdminAnnouncements.php">Admin Tools</a></li>';
                else
                echo '<li><a href="AdminAnnouncements.php">Admin Tools</a></li>';

        }
}

class LogOffUser extends User
{
	public function __construct()
	{
		parent::__construct();
	}
	        public function loadNavigation()
        {
       			$this->loggOff();
		}
}

?>