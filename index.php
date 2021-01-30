<?php require_once "./layout/header.php" ?>
<section>
    <div class="container-index">
        <?php
            require_once "./classes/Partida.php";
            require_once "./classes/Time.php";
            $partida = new Partida();
            $time = new Time();

            $filtrar = null;
            if(isset($_GET['filtrar'])){
                $filtrar = $_GET['filtrar'];
            }

            $partidas = $partida->listarPartida($filtrar);

            $total = count($partidas);

            for($i=0; $i<$total; $i++){
                echo '<div class="card-partida">
                        <div class="card-data">
                            <span class="span-card-data">'.$partidas[$i]['data'].'</span>
                        </div>
                        <div class="card-time">
                            <span class="span-card-times">'.$partidas[$i]['time_1'].' X '.$partidas[$i]['time_2'].'</span>
                        </div>
                        <div class="card-horario">
                            <span class="span-card-horario">'.$partidas[$i]['horario'].'</span>
                        </div>
                    </div>';
            }
        ?>
    </div>
<?php require_once "./layout/footer.php";?>