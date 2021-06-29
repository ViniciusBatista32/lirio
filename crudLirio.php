<?php
class CrudLirio
{
	// create section
	public function gravaDados($api_key, $dados)
	{
		$sql = "INSERT INTO `lirio`.`dados` VALUES (NULL,?)";
		$stmt = Conexao::getConn()->prepare($sql);

		$stmt->bindValue(1, $api_key);

		// $i = 1;
		// foreach ($arr as $value) {
		//   $stmt->bindValue($i,$value);
		//   $i++;
		// }

		if ($stmt->execute() === false) {
			return false;
		} else {
			return true;
		}
	}
	// create section

	public function listaDispositivos($api_key = NULL)
	{
		$sql = "SELECT * FROM `lirio`.`dispositivos` WHERE 1 = 1";

		$arr = array();

		if (!empty($api_key)) {
			$sql .= " AND api_key = ?";
			$arr[] = $api_key;
		}

		$stmt = Conexao::getConn()->prepare($sql);

		if (!empty($arr)) {
			$i = 1;
			foreach ($arr as $value) {
				$stmt->bindValue($i, $value);
				$i++;
			}
		}

		if ($stmt->execute() === false) {
			return $stmt->errorInfo();
		} else {
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		}
	}

	public function criaDispositivo($nome)
	{
		$sql = "INSERT INTO `lirio` . `dispositivos` VALUES(NULL,?,?)";
		$stmt = Conexao::getConn()->prepare($sql);

		$api_key = uniqid("");

		$stmt->bindValue(1, $api_key);
		$stmt->bindValue(2, $nome);

		if ($stmt->execute() === false) {
			return $stmt->errorInfo();
		} else {
			return $this->listaDispositivos($api_key);
		}
	}

	// read section
	public function read($arr)
	{
		$sql = "SELECT * FROM `loja` . `produto` $arr[1] ORDER BY id";
		$stmt = Conexao::getConn()->prepare($sql);

		$stmt->bindValue(1, $arr[0]);

		if ($stmt->execute() === false) {
			return false;
		} else {
			return array($stmt->rowCount(), $stmt->fetchAll(\PDO::FETCH_ASSOC));
		}
	}
	// read section

	// update section
	public function update($arr)
	{
		$sql = "UPDATE `loja`.`produto` SET nome = ?, valor = ?, quantidade = ? WHERE id = ?";
		$stmt = Conexao::getConn()->prepare($sql);

		$i = 1;
		foreach ($arr as $value) {
			$stmt->bindValue($i, $value);
			$i++;
		}

		if ($stmt->execute() === false) {
			return false;
		} else {
			return $arr[3];
		}
	}
	// update section

	// delete section
	public function delete($id)
	{
		$sql = "DELETE FROM `loja` . `produto` WHERE id = ?";
		$stmt = Conexao::getConn()->prepare($sql);

		$stmt->bindValue(1, $id);

		if ($stmt->execute() === false) {
			return "Falha ao Deletar o Produto. <br>";
		} else {
			$ret = "Item com o id '$id' foi deletado! <br>";
			return $ret;
		}
	}
	// delete section

	// reset id section
	public function resetId()
	{
		function sql($sql)
		{
			$stmt = Conexao::getConn()->prepare($sql);
			$stmt->execute();
		}
		$sql = "ALTER TABLE `loja`.`produto` DROP `id`";
		sql($sql);

		$sql = "ALTER TABLE `loja`.`produto` ADD `id` INT(255) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)";
		sql($sql);
	}
	// reset id section
}
