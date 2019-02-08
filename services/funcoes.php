<?php


function pesquisar_ramal(){
    require "conexao.php";
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $departamento = filter_input(INPUT_POST, 'departamento', FILTER_SANITIZE_STRING);
    $result_usuario = "SELECT * FROM dbo.ramal WHERE nome LIKE '%$nome%' and departamento LIKE '$departamento%' ORDER BY departamento , nome  " ;
    $resultado_usuario = sqlsrv_query($con, $result_usuario);
    while($row_usuario = sqlsrv_fetch_array($resultado_usuario)){
        echo "<tr>";
        echo "<td>" . $row_usuario['nome'] . "</td>";
        echo "<td>" . $row_usuario['ramal'] . "</td>";
        echo "<td>" . $row_usuario['departamento'] . "</td>";
        echo "<td>" . $row_usuario['email'] . "</td>";
        echo "<td>" . $row_usuario['corporativo'] . "</td>";
        echo "<td>";
        echo "<button type=button class='btn btn-xs btn-warning' data-toggle=modal data-target='#exampleModal' data-whatever=" . $row_usuario['id'] . " data-whatevernome=" . $row_usuario['nome'] . " data-whateverdepartamento=" . $row_usuario['departamento'] . " data-whateverramal="  . $row_usuario['ramal'] . " data-whateveremail=" . $row_usuario['email'] . " data-whatevercorporativo=" . $row_usuario['corporativo'] . "	>Editar</button>";
        echo "<button type=button class='btn btn-xs btn-danger' style='margin-left: 5px'> <a href=services/ramal.php?id=" . $row_usuario['id'] ."&cod_post=3 data-confirm='Tem certeza de que deseja excluir o item selecionado?' style='color: inherit'</a> Apagar</button>";
        echo "</td>";
        echo "</tr>";
    }
    
}

?>