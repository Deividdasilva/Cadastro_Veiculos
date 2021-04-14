<?php

    require 'connection.php';

    class Veiculos{

        public function Consultar(){
            $connection = new Connection();
            $stmt = $connection->prepare("SELECT * FROM veiculos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idVeiculo){
            $connection = new Connection();
            $stmt = $connection->prepare("SELECT * FROM veiculos where idVeiculo = :idVeiculo");
            $stmt->bindValue(":idVeiculo", $idVeiculo, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function Salvar($chassi, $marca, $modelo, $ano, $placa, $caracteristicas){

            $connection = new Connection();
            $stmt = $connection->prepare("INSERT INTO `veiculos`
                                                (`chassi`,
                                                `marca`,
                                                `modelo`,
                                                `ano`,
                                                `placa`,
                                                `caracteristicas`)
                                    VALUES (:chassi,
                                            :marca,
                                            :modelo,
                                            :ano,
                                            :placa,
                                            :caracteristicas);");
            $stmt->bindValue(":chassi", $chassi, PDO::PARAM_STR);
            $stmt->bindValue(":marca", $marca, PDO::PARAM_STR);
            $stmt->bindValue(":modelo", $modelo, PDO::PARAM_STR);
            $stmt->bindValue(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindValue(":placa", $placa, PDO::PARAM_STR);
            $stmt->bindValue(":caracteristicas", $caracteristicas, PDO::PARAM_STR);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error";
            }

        }

      
        public function Editar($idVeiculo, $chassi, $marca, $modelo, $ano, $placa, $caracteristicas){

            $connection = new Connection();
            $stmt = $connection->prepare("UPDATE `veiculos`
                                        SET `chassi` = :chassi,
                                        `marca` = :marca,
                                        `modelo` = :modelo,
                                        `ano` = :ano,
                                        `placa` = :placa,
                                        `caracteristicas` = :caracteristicas
                                        WHERE `idVeiculo` = :idVeiculo;");
            $stmt->bindValue(":chassi", $chassi, PDO::PARAM_STR);
            $stmt->bindValue(":marca", $marca, PDO::PARAM_STR);
            $stmt->bindValue(":modelo", $modelo, PDO::PARAM_STR);
            $stmt->bindValue(":ano", $ano, PDO::PARAM_STR);
            $stmt->bindValue(":placa", $placa, PDO::PARAM_STR);
            $stmt->bindValue(":caracteristicas", $caracteristicas, PDO::PARAM_STR);
            $stmt->bindValue(":idVeiculo", $idVeiculo, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error";
            }

        }

        public function Deletar($idVeiculo){

            $connection = new Connection();
            $stmt = $connection->prepare("DELETE FROM veiculos WHERE idVeiculo = :idVeiculo");
            $stmt->bindValue(":idVeiculo", $idVeiculo, PDO::PARAM_INT);

            if($stmt->execute()){
                return "OK";
            }else{
                return "Error";
            }

        }

    }

?>