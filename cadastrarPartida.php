<?php
    require_once "./layout/header.php";
?>
    <section>
        <div class="container">
            <h1>Cadastro de Partidas</h1>
            <form method="post" action="cadastrarPartida.php" id="form-partida">
                <select name="time_1" id="select">
                    <?php
                        require "./classes/Time.php";

                        $time = new Time();

                        $times = $time->listarTime();
                        $total = count($time->listarTime());
                        var_dump($time);

                        echo "<option value='0' selected='selected'>Selecione...</option>";
                        for($i=0; $i<$total; $i++){
                            echo "<option value='".$times[$i]['id']."'>".$times[$i]['nome']."</option>";
                        }

                        echo "</select>";
                        echo "<span> X </span>";
                        echo "<select name='time_2' id='select'>";

                        echo "<option value='0' select='selected'>Selecione...</option>";
                        for($i=0; $i<$total; $i++){
                            echo "<option value='".$times[$i]['id']."'>".$times[$i]['nome']."</option>";
                        }
                    ?>
                </select>
                <div>
                </div class="data-horario">
                    <input type="date" name="data"></input>
                    <input type="time" name="horario"></input>
                <div class="botoes">
                    <a href="index.php"><input type="button" value="Voltar" class="btn-default"></a>
                    <input type="submit" value="Cadastrar" class="btn-default btn-sucess">
                </div>
            </form>
        </div>
    </section>
    <?php
        require "./classes/Partida.php";

        $partida = new Partida();

        $time_1 = $_POST['time_1'];
        $time_2 = $_POST['time_2'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];

        $partida->inserirPartida($time_1, $time_2, $data, $horario);
    ?>
    </body>
</html>