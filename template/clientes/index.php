<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Bem Vindo</title>
</head>
<body>
    <h1 class="text-center">Clientes</h1>

    <p class="container">
        <a href="/admin/cliente/cadastrar" class="btn btn-primary">Novo Cliente</a>
    </p>

    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Sexo</th>
                    <th>Logradouro</th>
                    <th>Cidade</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if (!empty($clientes)){
                    foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente['nome'] ?></td>
                            <td><?php echo $cliente['dt_nascimento'] ?></td>
                            <td><?php echo $cliente['sexo'] ?></td>
                            <td><?php echo $cliente['logradouro'] ?></td>
                            <td><?php echo $cliente['cidade'] ?></td>
                            <td>
                                <a href="/admin/cliente/<?php echo $cliente['id']; ?>/editar" class="btn btn-primary">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach;
                }else{ ?>
                        <tr>
                            <td colspan="6" class="text-center">Nenhum registro encontrado</td>
                        </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>
