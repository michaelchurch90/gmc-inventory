<?php
include_once 'BasicPage.php';

class AdminBase extends BasicPage
{
	        public function loadPage()
        {
                $this->loadHeader();
                echo '<div class="body">';
				
                echo '<div class="bodyContents">';
				$this->loadAdminNav();
				echo '<div class="divAdminBodyContents">';
                $this->loadBody();
				echo '</div>';
                echo '</div>';
                $this->loadFooter();
        }
		
		public function loadAdminNav()
		{
			?>
            <div class="divAdminNav" >
            <ul>
                    <li><a href="AdminAnnouncements.php">Announcements</a></		li>
        <li><a href="AdminReports.php">Reports</a></li>
        <li><a href="AdminAddUser.php">Add User</a></li>
        <li><a href="AdminEditUser.php">Edit User</a></li>
        <li><a href="AdminAddCampus.php">Add Campus</a></li>
        <li><a href="AdminAddDepartement.php">Add Departement</a></li>
            </ul>
            </div>
            <?php
		}
		
}
?>