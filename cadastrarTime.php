<?php
    require_once "./layout/header.php";
?>
    <section>
        <div class="container">
            <h1>Cadastro de Times</h1>
            <form method="get" action="cadastrarTime.php">
                <input type="text" class="input-txt" name="nome" placeholder="Nome do Time">
                <div class="botoes">
                    <a href="index.php"><input type="button" value="Voltar" class="btn-default"></a>
                    <input type="submit" value="Cadastrar" class="btn-default btn-sucess">
                </div>
                <?php
                    require "./classes/Time.php";
                    $nome = $_GET['nome'];

                    $time = new Time();

                    $mensagens = array();
                    $mensagens[] = "Cadastro realizado com sucesso";
                    $mensagens[] = "Erro ao cadastrar: Nome não pode estar vazio";
                    $mensagens[] = "Erro ao cadastrar: Números não podem ser cadastrados";
                    $mensagens[] = "Erro ao cadastrar: Nome deve ter menos de 100 caracteres";

                    $cod = $time->inserirTime($nome);

                    switch($cod){
                        case 0:
                            echo "<div class='message message-sucess'>$mensagens[0]</div>";
                            break;
                        case 1:
                            echo "<div class='message message-error'>$mensagens[1]</div>";
                            break;
                        case 2:
                            echo "<div class='message message-error'>$mensagens[2]</div>";
                            break;
                        case 3:
                            echo "<div class='message message-error'>$mensagens[3]</div>";
                            break;
                    }   
                ?>
            </form>
        </div>
    </section>    
    </body>
</html>