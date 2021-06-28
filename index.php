<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lírio</title>
</head>

<?php
require("conn.php");
require("crudLirio.php");

$action  = isset($_REQUEST['action'])  ? $_REQUEST['action']  : NULL;
$api_key = isset($_REQUEST['api_key']) ? $_REQUEST['api_key'] : NULL;

switch($action){
    case "gravar":
        if(!empty($api_key)){
            $instance = new \CrudLirio();
            return $instance->gravaEstado($api_key);
        }
        break;
    default:
        break;
        
}
?>
<body>
    
</body>
</html>