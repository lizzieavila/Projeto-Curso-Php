<?php

function getConexao(){
	$conexao = new \PDO("mysql:host=localhost;dbname=php_basico","root","");

	return $conexao;
}