<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Cadastro Cliente</title>
</head>
<body>
    <h1 class="text-center">Cadastro de Cliente</h1>

    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="clienteNome">Nome</label>
                    <input type="text" class="form-control" id="clienteNome" name="nome" placeholder="Digite seu nome" autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="clienteDtNascimento">Data nascimento</label>
                    <input type="date" class="form-control" id="clienteDtNascimento" name="dt_nascimento" autocomplete="off">
                </div>

                <div class="form-group col-md-6">
                    <label for="clienteSexo">Sexo</label>
                    <select name="sexo" id="clienteSexo" class="form-control" autocomplete="off">
                        <option value="Não informado">Não informado</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="clienteLogradouro">Logradouro</label>
                    <input type="text" class="form-control" id="clienteLogradouro" name="logradouro" placeholder="Seu logradouro" autocomplete="off">
                </div>

                <div class="form-group col-md-5">
                    <label for="clienteBairro">Bairro</label>
                    <input type="text" class="form-control" id="clienteBairro" name="bairro" placeholder="Seu bairro" autocomplete="off">
                </div>

                <div class="form-group col-md-2">
                    <label for="clienteNro">Nº</label>
                    <input type="text" class="form-control" id="clienteNro" name="nro" autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="clienteCidade">Cidade</label>
                    <input type="text" class="form-control" id="clienteCidade" name="cidade" placeholder="Sua cidade" autocomplete="off">
                </div>
            </div>

            <p><button type="submit" class="btn btn-success">Cadastrar</button></p>
        </form>

        <p class="">
            <a href="/admin/cliente" class="btn btn-danger">Cancelar</a>
        </p>
    </div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
