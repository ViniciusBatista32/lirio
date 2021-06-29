<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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

			var_dump($retorno);
			break;
	}

	?>

	<form action="index.php" method="get">
		<label for="nome">Criar Dispositivo</label>

		<br>

		<input name="nome" type="text" id="nome" />
		<button name="action" value="criar">Criar</button>
	</form>

</body>

</html>