<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- master css -->
	<link rel="stylesheet" href="style/master.css">

	<title>Lírio</title>
</head>
<body>
	<?php
	require("conn.php");
	require("crudLirio.php");

	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
	$nome 	= isset($_REQUEST['nome'])	 ? $_REQUEST['nome']   : NULL;

	switch ($action) {
		case 'criar':
			if (!empty($nome)) {
				$instance = new \CrudLirio();
				$retorno = $instance->criaDispositivo($nome);

				if ($retorno !== false) {
					header("Location: campanhas.php");
					echo "Sua chave de API é: " . $retorno[0]['api_key'];
				} else {
					header("Location: campanhas.php");
				}
			}

			break;

		default:
			$instance = new \CrudLirio();
			$retorno = $instance->listaDispositivos($nome);
	}

	?>
	<div class="vertical-align margins-5">
		<center>
			<p class="roboto h1">Inserir novo Dispositivo</p>

			<form action="index.php" method="get">
				<div class="input-group mb-3">
					<input name="nome" type="text" id="nome" class="form-control" placeholder="Nome do Dispositivo">
				</div>
				<button class="btn btn-primary" name="action" value="criar">Criar</button>
			</form>
		</center>
	</div>

	<!-- popper js -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<!-- bootstrap js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
	integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>