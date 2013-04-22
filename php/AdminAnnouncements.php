<?php
include_once 'AdminBase.php';

class AdminAnnouncements extends AdminBase
{
			public function loadScripts()
		{
			?>
            	<script src="../js/jquery-1.9.1.min.js"></script>
				<script src="../js/AddAnnouncement.js"></script>
			<?php
		}

	public function loadBody()
	{
		?>
        <h2>Add Annoucement</h2>
        <form action="queries/AdminAnnouuncementsQuery.php" method="post" name="addAnoucement">
        <textarea name="txtAddAnnouncement" rows='10' cols="80"></textarea>
        <input type="submit" name="Submit" value="Submit"/>
        </form>
        
        <?php
	}
}

$adminAnnouncements = new AdminAnnouncements();
$adminAnnouncements->loadPage();
?>