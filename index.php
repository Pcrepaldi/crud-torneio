<?php require_once "./layout/header-index.php" ?>
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
        ?>
        <?php if($total == 0): ?>
            <h3>Cadastre partidas para começar...</h3>
        <?php endif; ?>
        <?php foreach($partidas as $p): ?>
            <div class="card-partida">
                <div class="card-data">
                    <span class="span-card-data"><?php echo $p['data']; ?></span>
                </div>
                <div class="card-time">
                    <span class="span-card-times"><?php echo $p['time_1'].' X '.$p['time_2']; ?></span>
                </div>
                <div class="card-horario">
                    <span class="span-card-horario"><?php echo $p['horario']; ?></span>
                </div>
                <div>
                    <a href="./editarPartida.php?id_p=<?php echo $p['id_partida']?>&id_tp=<?php echo $p['id_times_partida'] ?>">
                        <input type="button" id="acessar" value="Acessar">
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php require_once "./layout/footer.php";?>