<?php
    require_once "./layout/header.php";
?>
    <section>
        <div class="container">
            <h1>Cadastro de Times</h1>
            <form method="get" action="cadastrarTime.php">
                <input type="text" class="input-txt" name="nome" placeholder="Nome do Time" required="required">
                <div class="botoes">
                    <a href="index.php"><input type="button" value="Voltar" class="btn-default"></a>
                    <input type="submit" value="Cadastrar" class="btn-default btn-sucess">
                </div>
                <?php
                    require "./classes/Time.php";
                    $nome = $_GET['nome'];

                    $time = new Time();

                    if(!empty($nome) && $nome!='' && $nome!=null){
                        if($time->inserirTime($nome)){
                            echo "<div class='message message-sucess'>Cadastro realizado com sucesso</div>";
                        }else{
                            echo "<div class='message message-error'>Erro ao cadastrar</div>";
                        }
                    }
                ?>
            </form>
        </div>
    </section>    
    </body>
</html>