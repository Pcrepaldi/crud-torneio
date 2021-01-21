<?php

declare(strict_types=1);

class Partida{
    public function inserirPartida($id_time1, $id_time2, $data, $horario) : int
    {
        $pdo = require "conexao.php";
        
        try{
            if(($id_time1 == 0) || $id_time2 == 0){
                return 1;
            }else if(($id_time1 == $id_time2)){
                return 2;
            }else{
                $sql = "INSERT INTO times_partida (id, id_time1, id_time2) values 
                (null, :id_time1, :id_time2)";

                $stm = $pdo->prepare($sql);
                $stm->bindValue(":id_time1", $id_time1);
                $stm->bindValue(":id_time2", $id_time2);
                $stm->execute();

                $sql = "SELECT MAX(id) from times_partida";
                $stm = $pdo->query($sql);

                $maximo = $stm->fetchAll();

                $sql = "INSERT INTO partida (id, id_times_partida, data, horario) values 
                (null, :maximo, :data, :horario)";

                $stm = $pdo->prepare($sql);
                $stm->bindValue(":maximo", $maximo[0][0]);
                $stm->bindValue(":data", $data);
                $stm->bindValue(":horario", $horario);
                $stm->execute();

                return 0;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarPartida()
    {
        try{
            $pdo = require "conexao.php";

            $sql = "SELECT 
            partida.id, 
            partida.id_times_partida, 
            DATE_FORMAT(STR_TO_DATE(partida.data, '%Y-%m-%d'), '%d/%m/%Y') as data, 
            TIME_FORMAT(partida.horario, '%H:%i') as horario
            FROM partida ORDER BY data";

            $stm = $pdo->query($sql);

            return $stm->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function listarTimesPartida($n)
    {
        try{
            $pdo = require "conexao.php";

            $sql = "SELECT time.nome FROM times_partida INNER JOIN time ON time.id = id_time".$n.";";

            $stm = $pdo->query($sql);

            return $stm->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }
}