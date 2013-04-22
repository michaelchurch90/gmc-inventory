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
		public function loadPageTitle()
 		{
                echo "<title>Admin</title>";
        }
		public function loadAdminNav()
		{
			?>
            <div class="divAdminNav" >
            <ul>
        <li><a href="AdminAnnouncements.php">Announcements</a></li>
        <li><a href="AdminReports.php">Reports</a></li>
        <li><a href="AdminAddUser.php">Add Users</a></li>
        <li><a href="AdminEditUser.php">Edit Users</a></li>
        <li><a href="AdminAddCampus.php">Campuses</a></li>
        <li><a href="AdminAddDepartement.php">Departments</a></li>
        <li><a href="AdminStatuses.php">Status Types</a></li>
        <li><a href="AdminItems.php">Item Types</a></li>
            </ul>
            </div>
            <?php
		}
		
}
?>