<?php
include_once 'BasicPage.php';


class HomeScreen extends BasicPage
{
	
			public function loadScripts()
		{
			?>
            	<script src="../js/jquery-1.9.1.min.js"></script>
				<script src="../js/EditAccount.js"></script>
			<?php
		}
        //put the form elements in here for each page
        public function loadBody()
        {
                ?>
        
                <div name="editAccountForm">
                <h2>
                Edit Account
                </h2>
      
                <form name="editAccountForm" method="post" action="queries/AccountPageQuery.php">
                <input type="password" name="oldPassword" type="text" placeholder="Old Password" size="20">
                <br>
                <input type="password" name="newPassword" type="text" placeholder="New Password" size="20">
                <br>
                <input type="password" name="confirmPassword" type="text" placeholder="Confirm Password" size="20">
                <br>
                <input  name="email" type="text" placeholder="Email" size="20">
                <br>
                
                <br>
                <input name="saveChanges" type="submit" value="Save Changes">
                </form>
                </div>
        <?php
        }
}

//Create the class and load page elements

$homeScreen = new HomeScreen();
$homeScreen->loadPage();
?>