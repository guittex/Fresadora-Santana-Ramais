<?php
include_once("services/conexao.php");
$id =  $_GET['id'];
$result_usuario = "SELECT * FROM dbo.ramal WHERE id = '$id'";
$resultado_usuario = sqlsrv_query ($con, $result_usuario);
$row_usuario = sqlsrv_fetch_array($resultado_usuario);



?>


<!DOCTYPE html>
<html lang="pt-br">

<?php

	include_once("header.php");

?>	
	
<body background="img/papel.jpg" style=background-repeat:no-repeat;background-size:100%>
<?php

	include_once("menu.php");

?>



<h1 class="titulo-obrigado">Editar Cliente</h1>

<div class="C-base" style="margin-left:0 auto;"> 

    <form method="POST" action="services/ramal.php">

        <input type="hidden" name="cod_post" value="2">

        <input type="hidden" name="id" value="<?php echo $row_usuario['id'];?>">

        <p><label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $row_usuario['nome'];?>"  /></p>

        <p><label for="email">Departamento:</label>
            <input type="text" name="departamento" id="departamento"  value="<?php echo $row_usuario['departamento'];?>"/></p>

        <p><label for="telefone">Ramal:</label>
            <input type="text" name="ramal" id="ramal" value="<?php echo $row_usuario['ramal'];?>"/></p>


        <p><label for="celular">E-mail:</label>
            <input type="email" name="email" id="email" value="<?php echo $row_usuario['email'];?>"/></p>


        <p><label for="telefone">Corporativo:</label>
            <input type="text" name="corporativo" id="corporativo" value="<?php echo $row_usuario['corporativo'];?>"/></p>

		

        <input class="btn-C" type="submit" value="Editar" style="cursor: pointer;">
    </form>


</div>




<?php
include_once("footer.php");
?>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(".btn-menu").click(function(){
        $(".menu").show();
    });

    $(".btn-close").click(function(){
        $(".menu").hide();
    });
</script>
</body>
</html>