<?php
include_once 'AdminBase.php';

class AdminAddCampus extends AdminBase
{
		public function loadScripts()
	{
		?>
			<script src="../js/jquery-1.9.1.min.js"></script>
			<script src="../js/AddCampus.js"></script>
		<?php
	}
	public function loadBody()
	{
		?>
        <h2>Add Campus</h2>
        <form action="queries/AdminAddCampusQuery.php" method="post" name="adminEditUser">

        <input type="text" name="campus" placeholder="Campus Name"/>
        <br/>
        <input type="submit" name="Submit" value="Add Campus"/>
        </form>
        
        <?php
	}
}

$adminEditUser = new AdminAddCampus();
$adminEditUser->loadPage();
?>