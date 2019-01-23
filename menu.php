<?php
session_start();


?>

<script>

</script>

<header class="cabecalho">
		
        <a href="listar_ramais_modal.php"><img alt="logo da impacta" src="img/logo-fresadora.jpg"></a>           
        <button class="btn-menu"><i class="fa fa-bars fa-lg " aria-hidden="true"></i></button>
        <nav class="menu">
            <a class="btn-close"><i class="fa fa-times"></i></a>

            <ul>
			
                <?php
                    if(isset($_SESSION["newsession"])) {
                        $logado = $_SESSION["newsession"]
                        ?>
                        
                        <?php
                    }else{ ?>
	                        <li><a href="listar_ramais_modal.php">Ramais</a></li>                      
                        <?php
                    }
                ?>
            <ul>
        </nav>
</header>