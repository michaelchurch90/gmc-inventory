  <?php include_once "../Database.php";
  $database = new Database();
   ?>
   
   <h2>
                Edit Data
                </h2>
                <form id="updateForm" name="updateForm" method="post" action="queries/UpdateItemQuery.php">

                <!--
                The following series of code is where we establish all of the search fields.
                
                They are as follows: 	Assigned To, Campus, Department, Inventory #, 
                						Manufacturer, Model, Serial #, LAN MAC, and WLAN MAC
                -->
                Inventory #: 
                <input disalbed  name="invNumber" type="text" size="20" value="<?php echo $_POST['Inventory'];?>">
                <br/>
                Campus: 
                <select name="campus">
                <?php
				$result=$database->getCampuses();
				$options = $result->getOptionList();
				echo $options;
  				//<option value="0">Milledgeville</option>				
				?>
				</select>
                
                <br/>
                Department: 
                <select name="dept">
  				<?php
								$result=$database->getDepartments();
				$options = $result->getOptionList();
				echo $options;
				//<option value="0">HR</option>
				?>
                
				</select>
                
                <br/>
                Assigned To: 
                <input name="assignedTo" type="text" size="20" value="<?php echo $_POST['AssignedTo'];?>">
                
                <br/>
                Manufacturer: 
                <input name="manufacturer" type="text" size="20" value="<?php echo $_POST['Manufacturer'];?>">
               <!-- <select name="manufacturer">
  				<option value="toshiba">Toshiba</option>
  				<option value="acer">Acer</option>
                <option value="asus">Asus</option>
                <option value="dell">Dell</option>
                <option value="hp">HP</option>
                <option value="mac">Mac</option>
				</select>-->
                <br/>
                Item
                <input name="item" type="text" size="20" value="<?php echo $_POST['Item'];?>">
                <br/>
                <br/>
                Model: 
                <input name="model" type="text" size="20" value="<?php echo $_POST['Model'];?>">
                
                <br/>
                Serial #: 
                <input name="serialNum" type="text" size="20" value="<?php echo $_POST['Serial'];?>">
                
                <br/>
                LAN MAC: 
                <input name="lanMAC" type="text" size="20" value="<?php echo $_POST['Lan'];?>">
                
                <br/>
                WLAN MAC: 
                <input name="wanMAC" type="text" size="20" value="<?php echo $_POST['WLan'];?>">
                
                <br/>
                Status:
                <input name="Status" type = "text" size = "20" value = "<?php echo $_POST['Status'];?>">
                <br/>
                Comments:
                <br/>
                <textarea name="Comment" rows='10' cols="80"><?php echo $_POST['Comment'];?>
        		</textarea>
                <br/>
                <input name="submitSearch" type="submit" value="Change">
                
                </form>