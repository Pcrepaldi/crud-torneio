<?php 
    require_once "./layout/header.php"; 
    require "./classes/Time.php";
    require "./classes/Partida.php";

    $time = new Time();
    $partida = new Partida();

    $id_p = $_GET['id_p'];
    $id_tp = $_GET['id_tp'];

    $p = null;
    if(isset($_POST['time_1']) && isset($_POST['time_2']) && isset($_POST['data']) && isset($_POST['horario'])){
        $time_1 = addslashes($_POST['time_1']);
        $time_2 = addslashes($_POST['time_2']);
        $data = addslashes($_POST['data']);
        $horario = $_POST['horario'];

        $p = $partida->atualizarPartida($id_tp, $time_1, $time_2, $data, $horario);
    }

?>
<section>
    <div class="container">
        <h1>Editar Partida</h1>
        <form method="post" id="form-partida">
            <div class="div-select">
                <select name="time_1" id="select">
                    <?php

                        $times = $time->listarTime();

                        $total = count($times);

                        $partidas = $partida->listarPartidaId($id_p);

                        echo "<option value='0'>Selecione...</option>";
                        for($i=0; $i<$total; $i++){

                            if($partidas[0]['id_time1'] == $times[$i]['id']){
                                echo "
                                <option value='".$times[$i]['id']."' selected='selected'>".$times[$i]['nome']."</option>
                                ";
                            }else{
                                echo "
                                <option value='".$times[$i]['id']."'>".$times[$i]['nome']."</option>
                                ";
                            }
                        }
                    ?>
                </select>
                <span>X</span>
                <select name="time_2" id="select">
                    <?php
                        echo "<option value='0' selected='selected'>Selecione...</option>";
                        for($i=0; $i<$total; $i++){
                            if($partidas[0]['id_time2'] == $times[$i]['id']){
                                echo "
                                <option value='".$times[$i]['id']."' selected='selected'>".$times[$i]['nome']."</option>
                                ";
                            }else{
                                echo "
                                <option value='".$times[$i]['id']."'>".$times[$i]['nome']."</option>
                                ";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="data-horario">
                <div id="data">
                    <label for="">Data da Partida</label>
                    <input type="date" name="data" class="input" value="<?php echo $partidas[0]['data']?>" required></input>
                </div>
                <div id="horario">
                    <label for="">Horário</label>
                    <input type="time" name="horario" class="input" value="<?php echo $partidas[0]['horario']?>" required></input>
                </div>
            </div>
            <div class="botoes">
                <a href="index.php"><input type="button" value="Voltar" class="btn-default"></a>
                <a type="submit" href="excluirPartida.php?id=<?php echo $id_tp; ?>"><input type="button" value="Excluir" class="btn-default btn-danger"></a>
                <input type="submit" value="Atualizar" class="btn-default btn-sucess">
            </div>
            <?php if($p):?>
                <div class='message partida message-sucess'>Partida Atualizada com Sucesso!</div>
            <?php endif; ?>
            <?php if(!is_null($p) && !$p):?>
                <div class='message partida message-error'>Preencha todos os campos!</div>
            <?php endif; ?>
        </form>
    </div>
<?php require_once "./layout/footer.php"; ?>

