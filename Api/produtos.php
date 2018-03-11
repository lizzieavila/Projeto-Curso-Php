<?php

function getProdutos(){
	$conexao = getConexao();
	$select = "select * from produto";
	$ret = $conexao->query($select);
	$produtos = $ret->fetchAll();

	return $produtos;
}

function buscaProdutos($busca){
	$produtos = getProdutos();
	$resultados = [];
	foreach($produtos as $produto){
		//$existe = in_array($busca,$produto);
		$existe = in_array(strtolower($busca),array_map('strtolower',$produto));
		if($existe){
			array_push($resultados, $produto);
		}
	}
	return $resultados;

}
function adicionarProdutos($dados){
	$conexao = getConexao();
	
	$insert = "Insert into produtos (titulo,descricao,valor) values (:titulo,:descricao,:valor)";
	$stmt = $conexao->prepare($insert);

	$stmt->bindValue(':titulo',$dados['titulo']);
	$stmt->bindValue(':descricao',$dados['descricao']);
	$stmt->bindValue(':valor',$dados['valor']);
	$stmt->execute();
	return $conexao->lastInsertId();
}
function buscaProdutoId($id){
	$conexao = getConexao();

	$select = "select * from produto where id=:id";
	$stmt = $conexao->prepare($select);
	$stmt->bindValue(':id',$id);
	$stmt->execute();
	return $stmt->fetch(\PDO::FETCH_ASSOC);

}
function salvarProduto($dados){
	$conexao = getConexao();
	$update = "Update produtos set titulo=:titulo, descricao=:descricao, valor=:valor where id=:id";
	$stmt = $conexao->prepare($update);
	$stmt->bindValue(':titulo',$dados['titulo']);
	$stmt->bindValue(':descricao',$dados['descricao']);
	$stmt->bindValue(':valor',$dados['valor']);
	$stmt->bindValue(':id',(int)$dados['id']);

	$ret = $stmt->execute();

	return $ret;	
	
}
function deletarProduto($id){
	$conexao = getConexao();
	$delete = "Delete from produtos where id=:id";
	$stmt = $conexao->prepare($delete);
	$stmt->bindValue(':id',(int)$id);
	$ret = $stmt->execute();
	return $ret;
}