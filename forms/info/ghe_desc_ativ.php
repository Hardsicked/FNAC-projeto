<?php
	include "../../php/connect.php";
	$cdghe = $_GET["ghe"];
	$sqli = "SELECT descAtiv FROM tbghe WHERE cdGHE = ".$cdghe;
	$qry = mysqli_query($link,$sqli);
	?>
	<div class="container">
		<div class="col-12">
			<h4>
				<?php
				while($res = mysqli_fetch_assoc($qry)){
					echo $res["descAtiv"];
				}
				?>
			</h4>
		</div>
	</div>