<?php

declare(strict_types=1);

class Partida{
    public function inserirPartida(int $id_time1, int $id_time2, $data, $horario) : int
    {
        $pdo = require "conexao.php";
        
        try{
            if(($id_time1 == 0) || $id_time2 == 0){
                return 1;
            }else if(($id_time1 == $id_time2)){
                return 2;
            }else{
                $sql = "INSERT INTO partida (id, id_time1, id_time2, data, horario) values 
                (null, :id_time1, :id_time2, :data, :horario)";

                $stm = $pdo->prepare($sql);
                $stm->bindValue(":id_time1", $id_time1);
                $stm->bindValue(":id_time2", $id_time2);
                $stm->bindValue(":data", $data);
                $stm->bindValue(":horario", $horario);
                $stm->execute();

                return 0;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}