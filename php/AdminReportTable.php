<?php
include_once 'AdminBase.php';

class AdminReports extends AdminBase
{
	
	public function loadBody()
	{
		?>
        <h2>Report</h2>
        <table width="50" border="2">
  <tr>
    <th scope="col">Inventory #</th>
    <th scope="col">Campus</th>
    <th scope="col">Department</th>
    <th scope="col">Assigned To</th>
    <th scope="col">Manufacturer</th>
    <th scope="col">Model</th>
    <th scope="col">Serial #</th>
    <th scope="col">LAN MAC</th>
    <th scope="col">WLAN MAC</th>
  </tr>
  <tr>
    <td>987321</td>
    <td>Milledgeville</td>
    <td>Finance</td>
    <td>Joey Schmoe</td>
    <td>Dell</td>
    <td>XPS M140</td>
    <td>E8LC10</td>
    <td>00:21:9B:7D:CD:5F</td>
    <td>DD:CC:B2:A4:55:3C</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
        
        <?php
	}
}

$adminReports = new AdminReports();
$adminReports->loadPage();
?>