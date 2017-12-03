<?php
require_once 'helpers/config.php';
require_once 'helpers/banco.php';
require_once 'model/repositorio_artigos.php';
require_once 'model/Artigo.php';

$artigos_pag = new Artigo();
$repositorio_artigos = new RepositorioArtigos($pdo);

$artigos_pag = $repositorio_artigos->buscar_artigos();
$numero_artigos_pag = count($artigos_pag);
	
$s = 1;
$artigo = [];
$array_sessao = [];
$indices = 0;
	
for($i=0;$i<sizeof($artigos_pag);$i++){
	$artigo[$i] = $artigos_pag[$i];
	if(count($artigo) == 6){
		foreach($artigo as $valor){
			$array_sessao[$s][] = $valor;
		}
	$s++;
	$artigo = [];
	}
}


if(count($artigo)>0){
	foreach($artigo as $valor){
		$array_sessao[$s][] = $valor;
	}
}
	
$indices = count($array_sessao);
	
if(array_key_exists('pagina',$_GET) && $_GET['pagina'] <= $indices && filter_input(INPUT_GET,'pagina',FILTER_VALIDATE_INT)){
	if($_GET['pagina'] > 0){
		$pagina = (int)$_GET['pagina'];
	}else{
		$artigos = new Artigo();
		$artigos = $repositorio_artigos->buscar_artigos_pag_inicial();
	}	
}else{
	$artigos = new Artigo();
	$artigos = $repositorio_artigos->buscar_artigos_pag_inicial();
}
	
$paginas = [];

while($indices>=1){
	$paginas[] = $indices;
	$indices--;
}
	
$indices = count($array_sessao);
	
$paginas_inverte = array_reverse($paginas);

require 'view/template_artigos.php';