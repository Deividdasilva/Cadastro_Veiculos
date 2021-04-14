<?php

    require '../models/veiculo.models.php';

    if($_POST){
        $veiculos = new Veiculos();

        switch($_POST["accion"]){
            case "CONSULTAR":
                echo json_encode($veiculos->Consultar());
            break;
            case "CONSULTAR_ID":
                echo json_encode($veiculos->ConsultarPorId($_POST["idVeiculo"]));
            break;
            case "SALVAR":
                $chassi = $_POST["chassi"];
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $ano = $_POST["ano"];
                $placa = $_POST["placa"];
                $caracteristicas = $_POST["caracteristicas"];

                if($chassi == ""){
                    echo json_encode("Inserir Chassi do veiculo");
                    return;
                }

                if($marca == ""){
                    echo json_encode("Inserir marca do veiculo");
                    return;
                }

                if($modelo == ""){
                    echo json_encode("Inserir modelo do veiculo");
                    return;
                }

                if($ano == ""){
                    echo json_encode("Inserir ano do veiculo");
                    return;
                }

              
                if($caracteristicas == ""){
                  echo json_encode("Inserir caracteristicas do veiculo");
                  return;
                }

                $resposta = $veiculos->Salvar($chassi, $marca, $modelo, $ano, $placa, $caracteristicas);
                echo json_encode($resposta);
                break;

                case "EDITAR":
                $chassi = $_POST["chassi"];
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $ano = $_POST["ano"];
                $placa = $_POST["placa"];
                $caracteristicas = $_POST["caracteristicas"];
                $idVeiculo = $_POST["idVeiculo"];

                if($chassi == ""){
                  echo json_encode("Inserir Chassi do veiculo");
                    return;
                }

                if($marca == ""){
                    echo json_encode("Inserir marca do veiculo");
                    return;
                }

                if($modelo == ""){
                    echo json_encode("Inserir modelo do veiculo");
                    return;
                }

                if($ano == ""){
                    echo json_encode("Inserir ano do veiculo");
                    return;
                }

              
                if($caracteristicas == ""){
                  echo json_encode("Inserir caracteristicas do veiculo");
                  return;
                }

                $resposta = $veiculos->Editar($idVeiculo, $chassi, $marca, $modelo, $ano, $placa, $caracteristicas);
                echo json_encode($resposta);
                break;

                case "DELETAR":
                    $idVeiculo = $_POST["idVeiculo"];
                    $resposta = $veiculos->Deletar($idVeiculo);
                    echo json_encode($resposta);
                break;
        }
    }

?>