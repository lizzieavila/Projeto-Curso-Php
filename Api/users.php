<?php

function getUsuarios(){
	$dados = [
		["nome"=>"Guilherme","email"=>"gui@mail.com"],
		["nome"=>"Maria","email"=>"maria@mail.com"],
		["nome"=>"Pedro","email"=>"pedro@mail.com"]
	];

	return $dados;
}

function exibeUsuario(){
	$usuarios = getUsuarios();
	$data = "";

	foreach($usuarios as $chave => $usuario){
		$nome = $usuario["nome"];
		$email = $usuario["email"];
		$data .= "<li>Nome: $nome - E-mail: $email</li>";
	}


	echo $data;
}

function exibeUsuario2(){
	$usuarios = getUsuarios();
	$data = "";

	for($y = 0; $y < count($usuarios); $y++ ){
		$nome = $usuarios[$y]['nome'];
		$email = $usuarios[$y]['email'];
		$data .= "<li>Nome: $nome - E-mail: $email</li>";
	}


	echo $data;
}