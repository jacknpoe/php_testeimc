<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Teste de Classe \jacknpoe\IMC (�ndice de Massa Corp�rea)</title>
 		<link rel="stylesheet" href="php_testeimc.css"/>
		<link rel="icon" type="image/png" href="php_testeimc.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			header( "Content-Type: text/html; charset=ISO-8859-1", true);

			$resultado = '';
			$peso = '0';
			$altura = '0';

			if( isset( $_POST[ 'calcular']))
			{
				$peso = $_POST['peso'];
				$altura =  $_POST['altura'];

				require_once( 'imc.php');
				$IMC = new \jacknpoe\IMC( floatval( str_replace( ',', '.', $peso)), floatval( str_replace( ',', '.', $altura)));
				$resultado = "IMC de " . number_format( $IMC->IMC, 14, ",", ".") . ", seu quadro � de: " . $IMC->getQuadro();
			}
		?>
		<h1>Calculadora de IMC (�ndice de Massa Corp�rea)<br></h1>

		<form action="php_testeimc.php" method="POST" style="border: 0px">
			<p>Peso: <input type="text" name="peso" value="<?php echo htmlspecialchars( $peso, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, "ISO-8859-1"); ?>" style="width: 50px" autofocus> quilos</p>
			<p>Altura: <input type="text" name="altura" value="<?php echo htmlspecialchars( $altura, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, "ISO-8859-1"); ?>" style="width: 50px"> metros</p>
			<p><input type="submit" name="calcular" value="Calcular"></p>
		</form>

		<br><p>Resultado: <?php echo $resultado; ?></p><br><br>
		<p><a href="https://github.com/jacknpoe/php_testeimc">Reposit�rio no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>