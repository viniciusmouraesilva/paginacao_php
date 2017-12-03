<?php
try {
	$pdo = new PDO(DSN,USUARIO,SENHA);
}catch(PDOException $ex) {
	exit('Não foi possível conectar com o banco');
}