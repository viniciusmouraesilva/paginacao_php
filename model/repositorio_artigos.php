<?php
class RepositorioArtigos {

	private $pdo;
	
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	
	public function buscar_artigos(){
		
		$sqlBuscar = "SELECT * FROM artigos ORDER BY data_artigo DESC";
		
		$query = $this->pdo->prepare($sqlBuscar);
		
		$query->execute();
		
		$artigos = [];
		$i = 0;
		while($artigo = $query->FetchObject('Artigo')){
			$artigos[$i] = $artigo;
			$i++;
		}
		return $artigos;
	}
	
	public function buscar_artigos_pag_inicial() {
		
		$sqlBuscar = "SELECT * FROM artigos ORDER BY data_artigo DESC LIMIT 6";
	
		$query = $this->pdo->prepare($sqlBuscar);
		
		$query->execute();
		
		$artigos = [];
		
		while($artigo = $query->FetchObject('Artigo')){
			$artigos[] = $artigo;
		}	
		
		return $artigos;
	}
	
}