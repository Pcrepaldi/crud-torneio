<?php require_once "./layout/header.php" ?>
<section>
    <div class="container-index">
        <?php
            require_once "./classes/Partida.php";
            require_once "./classes/Time.php";
            $partida = new Partida();
            $time = new Time();

            $partidas = $partida->listarPartida();
            $times1 = $partida->listarTimesPartida(1);
            $times2 = $partida->listarTimesPartida(2);

            $total = count($partidas);

            for($i=0; $i<$total; $i++){
                echo '<div class="card-partida">
                        <div class="card-data">
                            <span class="span-card-data">'.$partidas[$i]['data'].'</span>
                        </div>
                        <div class="card-time">
                            <span class="span-card-times">'.$times1[$i]['nome'].' X '.$times2[$i]['nome'].'</span>
                        </div>
                        <div class="card-horario">
                            <span class="span-card-horario">'.$partidas[$i]['horario'].'</span>
                        </div>
                    </div>';
            }
        ?>
    </div>
<?php require_once "./layout/footer.php";?>