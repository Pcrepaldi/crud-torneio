<?php

declare(strict_types=1);

class Time{
    public function inserirTime(string $nome) : int
    {
        $pdo = require "conexao.php";

        try{
            if(empty($nome) || $nome === null){
                return 1;
            }else if(is_numeric($nome)){
                return 2;
            }else if(strlen($nome) > 50){
                return 3;
            }else{
                $sql = "INSERT INTO time (nome) values (:nome)";

                $stm = $pdo->prepare($sql);
                $stm->bindValue(":nome", $nome);
                $stm->execute();

                return 0;
            }
        }catch(PDOException $e)
        {
            echo "Erro ao cadastrar time: " . $e->getMessage();
        }
    }

    public function listarTime()
    {
        try{
            $pdo = require "conexao.php";

            $sql = "SELECT * FROM time ORDER BY nome";
            $stm = $pdo->query($sql);
    
            return $stm->fetchAll(); /* Retorna um array de arrays, onde cada row
                                     ** do banco é um índice do primeiro array                        
                                     */
    
            //return $stm; // Retorna um objeto
        }catch(Exception $e){
            $e->getMessage();
        }
        
    }
}