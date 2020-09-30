<?php
session_start();
	include_once("conexao_bd.php");
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING) ;
		$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ;
		$Dt_Nasc= filter_input(INPUT_POST, 'Dt_Nasc', FILTER_SANITIZE_STRING) ;

//echo "nome: $nome <br>";
//echo "E-mail: $email <br>";

		$result_usuario ="INSERT INTO  cad_aluno (Nome, email, Dt_Nasc ) VALUES ( '$nome', '$email','$Dt_Nasc')";
		$resultado_usuario = mysqli_query($con, $result_usuario);

	if(mysqli_insert_id($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: cadastrar_aluno.php");
	}
	else
	{
		$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cadastrar_aluno.php");
	}
