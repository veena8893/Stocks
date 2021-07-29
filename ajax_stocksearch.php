<?php
session_start();
	require_once('include/connection.php');
	if(isset($_POST['name']) and $_POST['name']!='')
	{
		$sql = "SELECT Name,`Market Cap`, `Stock P/E`, `Dividend Yield`, `ROCE %`, `ROE Previous Annum`, `Debt to Equity`, `EPS`, `Reserves`, `Debt` FROM `Stocks` 
      			WHERE Name LIKE '%".$_POST['name']."%'";
		$stmt=$db->prepare($sql);
		$stmt->execute();
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box">
			<div class="box-body">
				<table id="scntaddlist" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th><?php echo $row['Name']; ?></th>
						</tr>
				  </thead>
					<tbody>
<?php
echo "						<tr><td>Market Cap</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['Market Cap']."</td></tr>
						<tr><td>Stock P/E</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['Stock P/E']."</td></tr>
						<tr><td>Dividend Yield</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['Dividend Yield']."</td></tr>
						<tr><td>ROCE %</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['ROCE %']."</td></tr>
						<tr><td>ROE Previous Annum</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['ROE Previous Annum']."</td></tr>
						<tr><td>Debt to Equity</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['Debt to Equity']."</td></tr>
						<tr><td>EPS</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['EPS']."</td></tr>
						<tr><td>Reserves</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['Reserves']."</td></tr>
						<tr><td>Debt</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>".$row['Debt']."</td></tr>";
	}
?>
</tbody>
			  </table>
		  </div>
	  </div>
	</div>
