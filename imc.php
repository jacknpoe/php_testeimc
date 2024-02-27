<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Reb�lo
	// Objetivo: c�lculo e avalia��o do IMC
	// Altera��es:
	// 0.1   25/04/2023 - Come�o da primeira implementa��o

	namespace jacknpoe;

	//***********************************************************************************************
	// Classe IMC

	class IMC
	{
		public $IMC = 0;
		public $ideal = 0;

		function __construct( $peso = 0.0, $altura = 0.0)		// vamos ver se tem como sobrecarregar!
		{
			if( $altura == 0.0)
			{
				$this->IMC = 0;
				$this->ideal = 0;
			} else
			{
				$this->IMC = $peso / pow( $altura, 2);
				$this->ideal = 21.75 * $altura * $altura;
			}
		}

		function getQuadro()
		{
			if( $this->IMC < 18.5)
			{
				return "magreza";
			}
			if( $this->IMC < 25.0)
			{
				return "normalidade";
			}
			if( $this->IMC < 30.0)
			{
				return "sobrepeso";
			}
			if( $this->IMC < 40.0)
			{
				return "obesidade";
			}
			return "obesidade m�rbida";
		}
	}
?>