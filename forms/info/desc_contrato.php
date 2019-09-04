<?php
	include "../../php/connect.php";
	$contra = $_GET["cd"];
	$sqli = "SELECT desc_contrato FROM tbcontrato WHERE cdContrato = ".$contra;
	$qry = mysqli_query($link,$sqli);
	?>
	<div class="container">
		<div class="col-12">
			<h4>
				<?php
				while($res = mysqli_fetch_assoc($qry)){
				echo $res["desc_contrato"];
				}
				?>
			</h4>
		</div>
	</div>