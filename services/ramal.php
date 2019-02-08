<?php

if($_POST){
    $cod_post = $_POST['cod_post'];
}else{
    $cod_post = $_GET['cod_post'];
}

class ramal{
    
    public $nome;
    public $departamento;
    public $ramal;
    public $email;
    public $corporativo;
    public $id;
    public $query;
    

    public function cadastrar(){
        require "conexao.php";      
        $sql = "INSERT INTO dbo.ramal(nome,departamento,ramal,email,corporativo) VALUES ('$this->nome','$this->departamento','$this->ramal','$this->email','$this->corporativo')";
        $result = sqlsrv_query($con, $sql);

        if($result == true ) {
            echo
            "<script>   
                alert('Ramal cadastrado com sucesso!');
                window.location.href=' ../listar_ramais_modal.php';
            </script>";
        
        
        }else{
            echo
            "<script>   
                alert('Falha ao cadastrar ramal!');
                window.location.href=' ../listar_ramais_modal.php';
            </script>";        
        
        }  

    }

    public function editar(){
        require "conexao.php";
        $sql = "UPDATE dbo.ramal SET nome='$this->nome', departamento='$this->departamento', ramal='$this->ramal', email='$this->email', corporativo='$this->corporativo' WHERE id='$this->id'";
        $result = sqlsrv_query($con, $sql);
        $linha = sqlsrv_rows_affected($result);

        if($linha == true ) {
            echo
            "<script>   
                alert('Ramal alterado com sucesso!');
                window.location.href=' ../listar_ramais_modal.php';
            </script>";
        
        
        }else{
            echo
            "<script>   
                alert('Falha ao alterar ramal!');
                window.location.href=' ../listar_ramais_modal.php';
            </script>";
        
        
        }
        
    }

    public function apagar(){
        require "conexao.php";
        $this->id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!empty($this->id)){

            $result_usuario = "DELETE FROM dbo.ramal WHERE id='$this->id'";
            $resultado_usuario = sqlsrv_query($con, $result_usuario);

            if($resultado_usuario == true) {
                echo
                "<script>   
                alert('Ramal apagado com sucesso');
                window.location.href=' ../listar_ramais_modal.php';
                </script>";

            }else{

                echo
                "<script>
                alert('Erro ao apagar ramal');
                window.location.href=' ../listar_ramais_modal.php';        
                </script>";

            }
        }else{
            echo
            "<script>
                alert('Necessario selecionar um ramal');
                window.location.href=' ../listar_ramais_modal.php';
            </script>";
        }

    }

    public function pesquisar(){
        require "conexao.php";
        $sql = "SELECT * FROM dbo.ramal";
        $this->query = sqlsrv_query($con, $sql);

    }

    public function listar(){
        require "conexao.php";
        $this->query;

    }

    
}

$ramal = new ramal();
$ramal->id = $_POST['id'];
$ramal->nome = $_POST['nome'];
$ramal->departamento = $_POST['departamento'];
$ramal->ramal = $_POST['ramal'];
$ramal->email = $_POST['email'];
$ramal->corporativo = $_POST['corporativo'];


if($cod_post == "1"){

    $ramal->cadastrar();

} elseif($cod_post == "2"){

    $ramal->editar();
    
} elseif($cod_post == "3"){
    $ramal->apagar();
}










?>