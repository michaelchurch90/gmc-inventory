<?php
include_once 'AdminBase.php';

class AdminAddUser extends AdminBase
{

	public function loadScripts()
	{
		?>
			<script src="../js/jquery-1.9.1.min.js"></script>
			<script src="../js/AddUser.js"></script>
		<?php
	}
	public function loadBody()
	{
		?>
        <h2>Add User</h2>
        <form action="queries/AdminAddUserQuery.php" method="post" name="adminEditUser">

        <input type="text" name="username" placeholder="Username"/>
        <br/>
         <input type="text" name="password" placeholder="Password"/>
        <br/>
        
                <select name="privilege">
        	<option value="0">User</option>
            <option value="1">Admin</option>
        </select>
        <br/>
         <input type="text" name="fName" placeholder="First Name"/>
         <br/>
         <input type="text" name="lName" placeholder="Last Name"/>
         <br/>
         <input type="text" name="email" placeholder="email"/>
         <br/>
        <input type="submit" name="Submit" value="Submit"/>
        </form>
        
        <?php
	}
}

$adminEditUser = new AdminAddUser();
$adminEditUser->loadPage();
?>