<?php
 require "../authenticate/cadastro.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Controle de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h1 class="h4 mb-4 text-center">Criar Conta</h1>

                        <?php if ($sucesso): ?>
                           <div class="alert alert-success">
                              Cadastro realizado com sucesso!
                             <a href="login.php" class="alert-link">Fazer login</a>
                           </div>
                        <?php endif; ?>

                         <?php if (!empty($erros)): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach ($erros as $erro): ?>
                                      <li><?= htmlspecialchars($erro) ?></li>
                                     <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                 
                     <!--  entra aquii se nao tiver sucesso -->
                    <?php if (!$sucesso): ?>
                    <form method="POST" action="cadastro_in.php" novalidate>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="coloque seu nome aqui" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="<?= htmlspecialchars($email ?? '') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>

                        <div class="mb-3">
                            <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
                            <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                    </form>
                    <?php endif; ?>
                   

                    <p class="text-center mt-3 mb-0">
                        Já tem conta? <a href="login.php">Entrar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>