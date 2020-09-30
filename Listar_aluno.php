<?php 
session_start();
	include_once("conexao_bd.php");

?>


	<!DOCTYPE html>

<html lang="pt-br"> 
	<head> 
		<meta charset="utf-8">
		<title> LISTAR     </title>
	</head>
	<body>

		<h1> LISTAR USUARIOS   </h1>
<?php 
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];	
			unset($_SESSION['msg']);
		 }
		    ;
		 $result_usuario = "SELECT * FROM cad_aluno"; 
		 $resultado_usuario = mysqli_query($con, $result_usuario);

		 while($row_usuario  = mysqli_fetch_assoc($resultado_usuario)) {
		 	echo "Matricula: " . $row_usuario['id_aluno']  . "<br>";
		 	echo "Nome: " . $row_usuario['nome']  . "<br>";
		 	echo "E-mail: " . $row_usuario['email']  . "<br>";
		 	echo "Nascimento: " . $row_usuario['Dt_Nasc']  . "<br>";
		 	echo "<a href='visualizar_aluno.php?id_aluno=" . $row_usuario['id_aluno'] . "'>Visualizar</a><br><hr>";
		 }

		 $result_pg = "SELECT COUNT (id_aluno ) AS num_result FROM cad_aluno";
		 $resultado_pg = mysqli_query ($con, $result_pg);
		
?>	


	</body>

</html>