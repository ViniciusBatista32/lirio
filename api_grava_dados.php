<?php
require("conn.php");
require("crudLirio.php");

$action  = isset($_REQUEST['action'])  ? $_REQUEST['action']  : NULL;
$api_key = isset($_REQUEST['api_key']) ? $_REQUEST['api_key'] : NULL;
$dados	 = isset($_REQUEST['dados'])   ? $_REQUEST['dados']   : NULL;

switch ($action) {
	case "gravar":
		if (!empty($api_key) && !empty($dados)) {
			$instance = new \CrudLirio();
			return $instance->gravaDados($api_key, $dados);
		}
		break;
	default:
		break;
}
