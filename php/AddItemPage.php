<?php
include_once 'BasicPage.php';


class AddItemPage extends BasicPage
{
		public function loadScripts()
		{
			?>
            	<script src="../js/jquery-1.9.1.min.js"></script>
				<script src="../js/AddItem.js"></script>
			<?php
		}
        //put the form elements in here for each page
        public function loadBody()
        {
                ?>
                <!--
                Divider for the left panel with the searching criteria.
                -->
                <div name="addItemForm">
                
                <h2>
                Add Item
                </h2>
                <form id="addItemForm" name="addItemForm" method="post"  onsubmit="return validateForm()" action="queries/AddItemPageQuery.php" >

                <!--
                The following series of code is where we establish all of the search fields.
                
                They are as follows: 	Assigned To, Campus, Department, Inventory #, 
                						Manufacturer, Model, Serial #, LAN MAC, and WLAN MAC
                -->
<!--                Inventory #: 
                <input name="invNumber" type="text" size="20">
                <br>-->
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
                <input name="assignedTo" type="text" size="20" id="assignedTo"><span style="color:red;" id="assignedToError"> </span>
                
                <br>
                Manufacturer: 
                <input name="manufacturer" type="text" size="20">
                <!--<select name="manufacturer">
  				<option value="toshiba">Toshiba</option>
  				<option value="acer">Acer</option>
                <option value="asus">Asus</option>
                <option value="dell">Dell</option>
                <option value="hp">HP</option>
                <option value="mac">Mac</option>
				</select>-->
                <br>
                Item Type:<br/>
                <!--<input name="item" type="text" size="20">-->
                <select name="item">
                <?php
				$options = $this->database->getItemTypes();
				echo $options->getOptionList();
				?>
                </select>
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
                <!--<input name="Status" type = "text" size = "20">-->
                <select name="Status">
                 
                <?php
				$options = $this->database->getStatuses();
				echo $options->getOptionList();
				?>
                </select>
                <br/>
                Comments:
                <br/>
                <textarea id="Comment" name="Comment" rows='10' cols="80"></textarea><span style="color:red;" id="commentError"> </span>

                <br/>
                <input name="addItem" type="submit" value="Add Item">
                
                </form>
                </div>
        <?php
        }
}

//Create the class and load page elements

$addItemPage= new AddItemPage();
$addItemPage->loadPage();
?>