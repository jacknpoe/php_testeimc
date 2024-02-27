<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Teste de Classe \jacknpoe\IMC (Índice de Massa Corpórea)</title>
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
				$peso = floatval( str_replace( ',', '.', $_POST['peso']));
				$altura = floatval( str_replace( ',', '.', $_POST['altura']));

				require_once( 'imc.php');
				$IMC = new \jacknpoe\IMC( $peso, $altura);
				$resultado = "IMC de " . number_format( $IMC->IMC, 14, ",", ".") . ", seu quadro é de: " . $IMC->getQuadro() . 
					"</br>" . "Seu peso ideal é " . number_format( $IMC->ideal, 14, ",", ".") . " kg";
			}
		?>
		<h1>Calculadora de IMC (Índice de Massa Corpórea)<br></h1>

		<form action="php_testeimc.php" method="POST" style="border: 0px">
			<p>Peso: <input type="text" name="peso" value="<?php echo htmlspecialchars( $peso, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, "ISO-8859-1"); ?>" style="width: 50px" autofocus> quilos</p>
			<p>Altura: <input type="text" name="altura" value="<?php echo htmlspecialchars( $altura, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, "ISO-8859-1"); ?>" style="width: 50px"> metros</p>
			<p><input type="submit" name="calcular" value="Calcular"></p>
		</form>

		<br><p>Resultado: <?php echo $resultado; ?></p><br><br>
		<p><a href="https://github.com/jacknpoe/php_testeimc">Repositório no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>