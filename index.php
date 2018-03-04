<?php 

function getInfo($atributo){
	$dados = array("titulo"=>"SiteModelo","descricao"=>"Programando com PHP.");
	return $dados[$atributo];
}

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
	$html = "";

	foreach($usuarios as $chave => $usuario){
		$nome = $usuario["nome"];
		$email = $usuario["email"];
		$html .= "<li>Nome: $nome - E-mail: $email</li>";
	}


	echo $html;
}

function exibeUsuario2(){
	$usuarios = getUsuarios();
	$html = "";

	for($y = 0; $y < count($usuarios); $y++ ){
		$nome = $usuarios[$y]['nome'];
		$email = $usuarios[$y]['email'];
		$html .= "<li>Nome: $nome - E-mail: $email</li>";
	}


	echo $html;
}



?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo getInfo("titulo") ?></title>
</head>
<body>
<h2><?php echo getInfo("titulo") ?></h2>
<p><?php echo getInfo("descricao") ?></p>
<ul>
	<?php exibeUsuario2() ?>
</ul>



</body>
</html>

