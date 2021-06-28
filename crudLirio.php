<?php
  class CrudLirio{
    // create section
    public function gravaEstado($api_key){
      $sql = "INSERT INTO `lirio`.`estado` VALUES (NULL,?)";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$api_key);

      // $i = 1;
      // foreach ($arr as $value) {
      //   $stmt->bindValue($i,$value);
      //   $i++;
      // }

      if($stmt->execute() === false){
        // return "Falha ao Cadastrar o Produto. <br>";
      }else{
        // return "Produto Cadastrado. <br>";
      }
    }
    // create section

    // read section
    public function read($arr){
      $sql = "SELECT * FROM `loja` . `produto` $arr[1] ORDER BY id";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$arr[0]);

      if($stmt->execute() === false){
        return false;
      }else{
        return array($stmt->rowCount(),$stmt->fetchAll(\PDO::FETCH_ASSOC));
      }
    }
    // read section

    // update section
    public function update($arr){
      $sql = "UPDATE `loja`.`produto` SET nome = ?, valor = ?, quantidade = ? WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $i = 1;
      foreach ($arr as $value) {
        $stmt->bindValue($i,$value);
        $i++;
      }

      if($stmt->execute() === false){
        return false;
      }else{
        $instance = new \CrudLog;
        $instance->create($arr[3],"update");

        return $arr[3];
      }
    }
    // update section

    // delete section
    public function delete($id){
      $sql = "DELETE FROM `loja` . `produto` WHERE id = ?";
      $stmt = Conexao::getConn()->prepare($sql);

      $stmt->bindValue(1,$id);

      if($stmt->execute() === false){
        return "Falha ao Deletar o Produto. <br>";
      }else{
        $instance = new \CrudLog;
        $instance->create($id,"delete");

        $ret = "Item com o id '$id' foi deletado! <br>";
        return $ret;
      }
    }
    // delete section

    // reset id section
    public function resetId(){
      function sql($sql){
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
