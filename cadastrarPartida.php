<?php
    require_once "./layout/header.php";
?>
    <section>
        <div class="container">
            <h1>Cadastro de Partidas</h1>
            <form method="post" action="cadastrarPartida.php" id="form-partida">
                <div class="div-select">
                    <select name="time_1" id="select">
                        <?php
                            require "./classes/Time.php";
                            $time = new Time();
                            $times = $time->listarTime();
    
                            $total = count($time->listarTime());

                            echo "<option value='0' selected='selected'>Selecione...</option>";
                            for($i=0; $i<$total; $i++){
                                echo "
                                <option value='".$times[$i]['id']."'>".$times[$i]['nome']."</option>";
                            }
                        ?>
                    </select>
                    <span>X</span>
                    <select name="time_2" id="select">
                        <?php
                            echo "<option value='0' selected='selected'>Selecione...</option>";
                            for($i=0; $i<$total; $i++){
                                echo "
                                <option value='".$times[$i]['id']."'>".$times[$i]['nome']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="data-horario">
                    <div id="data">
                        <label for="">Data da Partida</label>
                        <input type="date" name="data" class="input" required></input>
                    </div>
                    <div id="horario">
                        <label for="">Horário</label>
                        <input type="time" name="horario" class="input" required></input>
                    </div>
                </div>
                <div class="botoes">
                    <a href="index.php"><input type="button" value="Voltar" class="btn-default"></a>
                    <input type="submit" value="Cadastrar" class="btn-default btn-sucess">
                </div>
                <?php
                    require "./classes/Partida.php";

                    $partida = new Partida();

                    $mensagens = array();
                    $mensagens[] = "Cadastro realizado com sucesso";
                    $mensagens[] = "Erro ao cadastrar: Selecione os dois times para cadastrar";
                    $mensagens[] = "Erro ao cadastrar: Times iguais não podem se enfrentar";

                    $time_1 = $_POST['time_1'];
                    $time_2 = $_POST['time_2'];
                    $data = $_POST['data'];
                    $horario = $_POST['horario'];

                    $cod = $partida->inserirPartida($time_1, $time_2, $data, $horario);

                    switch($cod){
                        case 0:
                            echo "<div class='message partida message-sucess'>$mensagens[0]</div>";
                            break;
                        case 1:
                            echo "<div class='message partida message-error'>$mensagens[1]</div>";
                            break;
                        case 2:
                            echo "<div class='message partida message-error'>$mensagens[2]</div>";
                            break;
                    }
                ?>
            </form>
        </div>
    </section>
    </body>
</html>