<?php
include_once 'AdminBase.php';

class AdminReports extends AdminBase
{
			public function loadScripts()
		{
			?>
            	<script src="../js/jquery-1.9.1.min.js"></script>
				<script src="../js/AdminReportQuery.js"></script>
			<?php
		}
	public function loadBody()
	{
		?>
        <h2>Generate Report</h2>
        <form name="reportForm" method="post" action="queries/AdminGenerateReportQuery.php">

                <!--
                The following series of code is where we establish all of the search fields.
                
                They are as follows: 	Assigned To, Campus, Department, Inventory #, 
                						Manufacturer, Model, Serial #, LAN MAC, and WLAN MAC
                -->
                Inventory #: 
                <input name="invNumber" type="text" size="20">
                <br>
                Campus: 
                <select name="campus">
                <?php
				$result=$this->database->getCampuses();
				$options = $result->getOptionList();
				echo $options;
  				//<option value="0">Milledgeville</option>				
				?>
				</select>
                
                <br>
                Department: 
                <select name="dept">
  				<?php
								$result=$this->database->getDepartments();
				$options = $result->getOptionList();
				echo $options;
				//<option value="0">HR</option>
				?>
                
				</select>
                
                <br>
                Assigned To: 
                <input name="assignedTo" type="text" size="20">
                
                <br>
                Manufacturer: 
                <input name="manufacturer" type="text" size="20">
               <!-- <select name="manufacturer">
  				<option value="toshiba">Toshiba</option>
  				<option value="acer">Acer</option>
                <option value="asus">Asus</option>
                <option value="dell">Dell</option>
                <option value="hp">HP</option>
                <option value="mac">Mac</option>
				</select>-->
                
                <br>
                Model: 
                <input name="model" type="text" size="20">
                
                <br>
                Serial #: 
                <input name="serialNum" type="text" size="20">
                
                <br>
                LAN MAC: 
                <input name="lanMAC" type="text" size="20">
                
                <br>
                WLAN MAC: 
                <input name="wanMAC" type="text" size="20">
                
                <br>
                
                <input name="submitSearch" type="submit" value="Generate">
                
                </form>
                
                <div class="outputDiv">
                </div>
        
        <?php
	}
}

$adminReports = new AdminReports();
$adminReports->loadPage();
?>