<?php
include_once 'AdminBase.php';
include_once 'Database.php';
class AdminEditUser extends AdminBase
{
	public function loadScripts()
	{
		?>
			<script src="../js/jquery-1.9.1.min.js"></script>
			<script src="../js/AdminEditUser.js"></script>
		<?php
	}
	public function loadBody()
	{
		?>
        <h2>Edit User</h2>
        <form action="queries/AdminRemoveUserQuery.php" method="post" name="adminEditUser">
        <select name="users">
        <?php
			
        	//<option value="jsmith">jsmith</option>
            //<option value="jsmith">jdoe</option>
			$options = $this->database->getUsers(FALSE);
			echo $options->getOptionList(0,0);
			?>
        </select>
        <br/>
         <input type="text" name="password" placeholder="Password"/>
         <input id="btnChangePassword" type="button" name="ChangePassword" value="Change"/>
        <br/>
              
         <input type="text" name="email" placeholder="Email"/>
         <input id="btnChangeEmail" type="button" name="ChangeEmail" value="Change"/>
           <br/>
        <input type="submit" name="RemoveUser" value="Remove User"/>
        </form>
        
        <?php
	}
}

$adminEditUser = new AdminEditUser();
$adminEditUser->loadPage();
?>