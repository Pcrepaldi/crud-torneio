<?php
    require "classes/Partida.php";
    $partida = new Partida();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $partida->excluirPartida($_GET['id']);
    }

    header("Location: index.php");

