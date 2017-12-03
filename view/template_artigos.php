<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Paginação PHP</title>
</head>
<body>
	<?php if(!isset($pagina)): ?>
			<?php foreach($artigos as $artigo): ?>
				<h1><?php echo htmlentities($artigo->getTitulo()); ?></h1>
				<h5><span class="glyphicon glyphicon-time"></span><?php $artigo->getData_Artigo(); ?></h5>
				<p><?php echo htmlentities($artigo->getDescricao()); ?></p>
				<a href="controllers/artigo.php?artigo_url=<?php echo htmlentities($artigo->getNome()); ?>"> Ler artigo completo </a>
			<?php endforeach; ?>
	<?php endif; ?>
	
	<?php if(isset($pagina) && $pagina <= $indices): ?>
		<?php foreach($array_sessao[$pagina] as $artigo): ?>
			<h1><?php echo htmlentities($artigo->getTitulo()); ?></h1>
			<h5><span class="glyphicon glyphicon-time"></span><?php echo $artigo->getData_Artigo(); ?></h5>
			<p><?php echo htmlentities($artigo->getDescricao()); ?></p>
			<a href="controllers/artigo.php?artigo_url=<?php echo htmlentities($artigo->getNome()); ?>">Ler artigo completo</a>
		<?php endforeach; ?>
	<?php endif; ?>
	<hr>
	
	<?php if($numero_artigos_pag > 6): ?>
	<br><?php if(isset($pagina) && $pagina > 1): ?>
			<?php if($pagina <= $indices): ?>
			<a href="index.php?rota=artigos&pagina=<?php echo $pagina - 1; ?>">Anterior</a>
			<?php else: ?>
				<?php echo ""; ?>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php foreach ($paginas_inverte as $paginas): ?>
			<a href="index.php?rota=artigos&pagina=<?php echo $paginas; ?>"><span class="btn btn-primary"><?php echo $paginas; ?></span></a>
		<?php endforeach; ?>
		
		<?php if(isset($pagina) && $pagina > 1 && $indices > $pagina): ?>
			<?php if($pagina <= $indices): ?>
				<a href="index.php?rota=artigos&pagina=<?php echo $pagina + 1; ?>">Proxima</a>
			<?php else:  ?>
				<?php echo ""; ?>
			<?php endif; ?>
		<?php elseif(!isset($pagina) or $pagina == 1): ?>
			<a href="index.php?rota=artigos&pagina=2">Próxima</a>
		<?php endif; ?>
	<?php endif; ?>
</body>
</html>