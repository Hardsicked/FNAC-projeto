<?php
	include "../../php/connect.php";
	$contra = $_GET["cd"];
	$sqli = "SELECT * FROM tbcontrato WHERE cdContrato = ".$contra;
	$qry = mysqli_query($link,$sqli);
	?>
	<div class="container">
		<div class="col-12">
			<h4>
				<?php
				while($res = mysqli_fetch_assoc($qry)){
					echo $res["resumo"];
				}
				?>
			</h4>
		</div>
	</div>