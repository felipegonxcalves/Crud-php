<?php

    function requestData(){
        return $data = [
            'nome' => filter_input(INPUT_POST, 'nome'),
            'dt_nascimento' => filter_input(INPUT_POST, 'dt_nascimento'),
            'sexo' => filter_input(INPUT_POST, 'sexo'),
            'logradouro' => filter_input(INPUT_POST, 'logradouro'),
            'bairro' => filter_input(INPUT_POST, 'bairro'),
            'nro' => filter_input(INPUT_POST, 'nro'),
            'cidade' => filter_input(INPUT_POST, 'cidade')
        ];
    }

    $clienteAll = function () use ($conn){
        $result = $conn->prepare("SELECT * FROM clientes c, endereco_cliente ec WHERE c.id = ec.cliente_id");
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    };

    $clienteCreate = function () use ($conn){
        $data = requestData();

        try{
            $conn->beginTransaction();
            $sqlCliente = "INSERT INTO clientes (nome, dt_nascimento, sexo) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sqlCliente);
            $stmt->bindValue(1, $data['nome']);
            $stmt->bindValue(2, $data['dt_nascimento']);
            $stmt->bindValue(3, $data['sexo']);
            $stmt->execute();
            $idCliente = $conn->lastInsertId();

            $sqlClienteEndereco = "INSERT INTO endereco_cliente (logradouro, nro, bairro, cidade, cliente_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sqlClienteEndereco);
            $stmt->bindValue(1, $data['logradouro']);
            $stmt->bindValue(2, $data['nro']);
            $stmt->bindValue(3, $data['bairro']);
            $stmt->bindValue(4, $data['cidade']);
            $stmt->bindValue(5, $idCliente);
            $stmt->execute();

            $conn->commit();

        }catch (PDOExecption  $e){
            $conn->rollBack();
            echo "Error: {$e->getMessage()}";
        }

    };

    $clienteOne = function ($id) use ($conn){

        $stmt = $conn->prepare("SELECT * FROM clientes c, endereco_cliente ec WHERE c.id = ec.cliente_id AND c.id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    };

    $clienteEdit = function ($id) use ($conn){
        $data = requestData();

        try{
            $conn->beginTransaction();
            $sqlCliente = "UPDATE clientes SET nome=?, dt_nascimento=?, sexo=? WHERE id=?";
            $stmt = $conn->prepare($sqlCliente);
            $stmt->bindValue(1, $data['nome']);
            $stmt->bindValue(2, $data['dt_nascimento']);
            $stmt->bindValue(3, $data['sexo']);
            $stmt->bindValue(4, $id);
            $stmt->execute();

            $sqlClienteEndereco = "UPDATE endereco_cliente SET logradouro=?, nro=?, bairro=?, cidade=? WHERE cliente_id=?";
            $stmt = $conn->prepare($sqlClienteEndereco);
            $stmt->bindValue(1, $data['logradouro']);
            $stmt->bindValue(2, $data['nro']);
            $stmt->bindValue(3, $data['bairro']);
            $stmt->bindValue(4, $data['cidade']);
            $stmt->bindValue(5, $id);
            $stmt->execute();

            $conn->commit();

        }catch (PDOExecption  $e){
            $conn->rollBack();
            echo "Error: {$e->getMessage()}";
        }

    };
