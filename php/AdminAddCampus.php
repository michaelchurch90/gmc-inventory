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
        <h2>Add/ Remove Campus</h2>
        <form id="frmCampusAdd" action="queries/AdminAddCampusQuery.php" method="post" name="adminAddCampus">

        <input type="text" name="campus" placeholder="Campus Name"/>
        <br/>
        <input type="submit" name="Submit" value="Add Campus"/>
        </form>
        
        <form  id="frmCampusRemove" action="queries/AdminRemoveCampusQuery.php" method="post" name="adminRemoveCampus">
		<select name="removeCampus">
        <?php
        	//<option value="Milledgeville">Milledgeville</option>
            //<option value="Augusta">Augusta</option>
											$result=$this->database->getCampuses();
				$options = $result->getOptionList(0,0);
				echo $options;
			
			?>
        </select>
        <br/>
        <input type="submit" name="Submit" value="Remove Campus"/>

        </form>
        <?php
	}
}

$adminEditUser = new AdminAddCampus();
$adminEditUser->loadPage();
?>