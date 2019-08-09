<?php

    require __DIR__ . "/clienteDb.php";

    if (route('/admin/cliente')){
        $clientes = $clienteAll();
        return include __DIR__ . "/../../template/clientes/index.php";

    }elseif (route('/admin/cliente/cadastrar')){ // CADASTRO
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $clienteCreate();
            return header('location: /admin/cliente');
        }

        return include __DIR__ . "/../../template/clientes/cadastro.php";

    }elseif ($params = route('/admin/cliente/(\d+)/editar')){ // EDITAR
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $clienteEdit($params[1]);
            return header('location: /admin/cliente');
        }

        $cliente = $clienteOne($params[1]);
        return include __DIR__ . "/../../template/clientes/editar.php";
    }
