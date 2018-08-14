<?php

/**
* 
*/
class Usuario {
	

	public $id_usuario;
	private $login;
	private $senha;
	private $cadastro;

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($value){
		$this->id_usuario = $value;
	}

	public function getLogin (){
		return $this->login;
		}

	public function setLogin ($login){
		$this->login = $login;
	}

	public function getSenha (){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getCadastro(){
		return $this->cadastro;
	}

	public function setCadastro($cadastro){
		$this->cadastro = $cadastro;
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM usuarios WHERE id_usuario = :ID",array(
			":ID"=>$id
		));
		if(isset($results[0])){

			$row = $results[0];

			$this->setId_usuario($row['id_usuario']);
			$this->setLogin($row['login']);
			$this->setSenha($row['senha']);
			$this->setCadastro(new DateTime($row['cadastro']));

		}
	}

	public function __toString(){

		return json_encode(array(
			"id_usuario"=>$this->getId_usuario(),
			"login" => $this->getLogin(),
			"senha" => $this->getSenha(),
			"cadastro" =>$this->getCadastro()->format('d/m/Y H:i:s')
		));
	}
}


?>