<?php
include_once 'BasicPage.php';
include_once 'Database.php';

class SearchScreen extends BasicPage
{
		public function loadScripts()
		{
			?>
            	<script src="../js/jquery-1.9.1.min.js"></script>
				<script src="../js/SearchPage.js"></script>
			<?php
		}

        public function loadBody()
        {
                ?>
                <!--
                Divider for the left panel with the searching criteria.
                -->
                <div name="searchForm">
                
                <h2>
                Search Inventory
                </h2>
                <form id="searchForm" name="searchForm" method="post" action="queries/SearchPageQuery.php">

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
                <option value="any">Any</option>
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
                <option value="any">Any</option>
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
                
               
                                Status:
                <input name="status" type = "text" size = "20" >
                <br/>
                Comments:
                <br/>
                <textarea name="Comments" rows='5' cols="40" width="100px">
        		</textarea>
                <br/>
                 <input name="submitSearch" type="submit" value="Search">
                </form>
                </div>
                
                
                <!--
                Following divider is for the results from the search, pulled from DB.
                Possibly to be moved to another page
                -->
                <div class='outputDiv'>                
                </div>
                
        <?php
        }
}

//Create the class and load page elements

$searchScreen = new SearchScreen();
$searchScreen->loadPage();
?>