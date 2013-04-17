<?php
include_once 'AdminBase.php';

class AdminAddCampus extends AdminBase
{
		public function loadScripts()
	{
		?>
			<script src="../js/jquery-1.9.1.min.js"></script>
			<script src="../js/AddDepartment.js"></script>
		<?php
	}
	public function loadBody()
	{
		?>
        <h2>Add/Remove Departement</h2>
        <form id="frmDepAdd" action="queries/AdminAddDepartmentQuery.php" method="post" name="adminAddDepartement">

        <input type="text" name="departementName" placeholder="Departement Name"/>
        <br/>
        <input type="submit" name="Submit" value="Add Departement"/>
        </form>
        <form  id="frmDepRemove" action="queries/AdminRemoveDepartmentQuery.php" method="post" name="adminRemoveDepartement">
		<select name="removeDepartement">
        <?php
        	//<option value="Milledgeville">Milledgeville</option>
            //<option value="Augusta">Augusta</option>
											$result=$this->database->getDepartments();
				$options = $result->getOptionList(0,0);
				echo $options;
			
			?>
        </select>
        <br/>
        <input type="submit" name="Submit" value="Remove Departement"/>

        </form>
        <?php
	}
}

$adminEditUser = new AdminAddCampus();
$adminEditUser->loadPage();
?>