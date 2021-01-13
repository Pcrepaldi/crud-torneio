<?php

declare(strict_types=1);

class Partida{
    public function inserirPartida(int $id_time1, int $id_time2, $data, $horario){
        $pdo = require "conexao.php";
        
        try{
            if(!empty($id_time1) && !empty($id_time2)){
                $sql = "INSERT INTO jogo (id, id_time1, id_time2, data, horario) values 
                (null, :id_time1, :id_time2, :data, :horario)";

                $stm = $pdo->prepare($sql);
                $stm->bindValue(":id_time1", $id_time1);
                $stm->bindValue(":id_time2", $id_time2);
                $stm->bindValue(":data", $data);
                $stm->bindValue(":horario", $horario);
                $stm->execute();

                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}