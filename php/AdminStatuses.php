<?php
include_once 'AdminBase.php';

class AdminStatuses extends AdminBase
{
		public function loadScripts()
	{
		?>
			<script src="../js/jquery-1.9.1.min.js"></script>
			<script src="../js/AdminStatuses.js"></script>
		<?php
	}
	public function loadBody()
	{
		?>
        <h2>Add/Remove Status</h2>
        <form id="frmStatusAdd" action="queries/AdminAddStatusQuery.php" method="post" name="adminAddStatus">

        <input type="text" name="StatusName" placeholder="Status"/>
        <br/>
        <input type="submit" name="Submit" value="Add Status Type"/>
        </form>
        <form  id="frmStatusRemove" action="queries/AdminRemoveStatusQuery.php" method="post" name="adminRemoveStatus">
		<select name="removeStatus">
        <?php
        	//<option value="Milledgeville">Milledgeville</option>
            //<option value="Augusta">Augusta</option>
											$result=$this->database->getStatuses();
				$options = $result->getOptionList();
				echo $options;
			
			?>
        </select>
        <br/>
        <input type="submit" name="Submit" value="Remove Status Type"/>

        </form>
        <?php
	}
}

$adminStatuses = new AdminStatuses();
$adminStatuses->loadPage();
?>