<?php
include_once 'AdminBase.php';

class AdminItems extends AdminBase
{
		public function loadScripts()
	{
		?>
			<script src="../js/jquery-1.9.1.min.js"></script>
			<script src="../js/AdminItems.js"></script>
		<?php
	}
	public function loadBody()
	{
		?>
        <h2>Add/Remove Items</h2>
        <form id="frmItemAdd" action="queries/AdminAddItemQuery.php" method="post" name="adminAddItem">

        <input type="text" name="ItemName" placeholder="Item"/>
        <br/>
        <input type="submit" name="Submit" value="Add Item Type"/>
        </form>
        <form  id="frmItemRemove" action="queries/AdminRemoveItemQuery.php" method="post" name="adminRemoveItem">
		<select name="removeItem">
        <?php
        	//<option value="Milledgeville">Milledgeville</option>
            //<option value="Augusta">Augusta</option>
											$result=$this->database->getItemTypes();
				$options = $result->getOptionList();
				echo $options;
			
			?>
        </select>
        <br/>
        <input type="submit" name="Submit" value="Remove Item Type"/>

        </form>
        <?php
	}
}

$adminItems = new AdminItems();
$adminItems->loadPage();
?>