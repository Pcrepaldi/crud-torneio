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

    public function listarPartida($filtrar)
    {
        try{
            $pdo = require "conexao.php";

            $sql = "SELECT 
            partida.id as id_partida, 
            times_partida.id_time1, 
            time1.nome as time_1, 
            times_partida.id_time2, 
            time2.nome as time_2,
            DATE_FORMAT(STR_TO_DATE(partida.data, '%Y-%m-%d'), '%d/%m/%Y') as data, 
            TIME_FORMAT(partida.horario, '%H:%i') as horario 
            FROM partida 
            INNER JOIN times_partida ON (times_partida.id = partida.id_times_partida)
            INNER JOIN time time1 ON (time1.id = id_time1)
            INNER JOIN time time2 ON (time2.id = id_time2)"
            ;

            /*"ORDER BY partida.data;";*/

            if(!empty($filtrar)){
                $filtrar = "%$filtrar%";
                $sql .= " WHERE (time1.nome LIKE ? OR time2.nome LIKE ?) ";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $filtrar);
                $stm->bindValue(2, $filtrar);
                $stm->execute();
            }else{
                $stm = $pdo->query($sql);
            }

            return $stm->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}