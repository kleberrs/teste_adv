<?php
session_start();
	include_once("conexao_bd.php");
		$id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_NUMBER_INT) ;
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING) ;
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ;
		$Dt_Nasc = filter_input(INPUT_POST, 'Dt_Nasc', FILTER_SANITIZE_STRING) ;

		$result_usuario ="UPDATE `cad_aluno` SET `nome`='$nome', `email`='$email', `Dt_Nasc`='$Dt_Nasc' WHERE `id_aluno`='$id_aluno'";
//"UPDATE cad_aluno SET nome = $nome, email = $email, Dt_Nasc = $Dt_Nasc WHERE id_aluno= '$id_aluno'";
		$resultado_usuario = mysqli_query($con, $result_usuario);

	if(mysqli_affected_rows($con)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: Listar_aluno.php");
	}

	else

	{
		$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: editar_aluno.php");
	}

