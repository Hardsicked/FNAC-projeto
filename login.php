<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>FAR Sistemas Integrados</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/fnac.css">
		
		<!-- Custom styles for this template -->
		<link href="css/scrolling-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<!-- Bootstrap core JavaScript -->
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<!--<script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

		<!-- Custom JavaScript for this theme -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="js/scrolling-nav.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/jquery.fancybox.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#errolog').hide(); //Esconde o elemento com id errolog
				$('#formlogin').submit(function(){ 	//Ao submeter formulário
					var login=$('#user').val();	//Pega valor do campo email
					var senha=$('#pass').val();	//Pega valor do campo senha
					$.ajax({			//Função AJAX
						url:"forms/login/connect_login.php",			//Arquivo php
						type:"post",				//Método de envio
						data: "login="+login+"&senha="+senha,	//Dados
			   			success: function (result){			//Sucesso no AJAX
			                		if(result==1){						
			                			location.href='sel.php'	//Redireciona
			                		}else{
			                			$('#errolog').show();		//Informa o erro
			                		}
			            		}
					})
					return false;	//Evita que a página seja atualizada
				})
			})
		</script>
		<style>
			form{
				padding: 15px 10px 15px 10px;
				border: 1px solid black;
				border-radius: 30px;
				box-shadow: 5px 5px #cfd2d3;
			}
			input[type=text]{
				padding: 12px 20px;
	  			margin: 8px 0;
	  			border-radius: 30px;
	  			box-sizing: border-box;
	  			background-color: #75d1ff;
  				color: white;
  			}
  			input[type=password]{
				padding: 12px 20px;
	  			margin: 8px 0;
	  			border-radius: 30px;
	  			box-sizing: border-box;
	  			background-color: #75d1ff;
  				color: white;
  			}
		</style>


		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="row" style="padding-top: 10px"><center><h2 style="color: blue;">FAR Sistemas Integrados</h2></center>
			</div>
			<div class="row" style="padding-top: 35%;">
				<div class="col-md-12">
					<form id="formlogin" style=""><center>
							<h4 id="errolog">Usuário ou senha errados!</h2>
							<p>Usuário:</p>
							<input type="text" name="user" id="user" required/>
							<p>Senha:</p>
							<input type="password" name="pass" id="pass" required />
							<br>
							<input type="submit" value="Entrar"  />
						</center>
					</fieldset>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>