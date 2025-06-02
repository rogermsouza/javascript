<?php
    require_once __DIR__ . '/../../config/config.php'; // para pegar BASE_URL
?>

<!DOCTYPE html>
<html>
<head>
    <title>Empresas</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
</head>
<body>
    <?php include BASE_PATH . 'public/components/menu.php'; ?>

    <section class="container">
        <h1>Lista de Empresas</h1>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($empresas as $empresa): ?>
                <tr class="select">
                    <td><?= $empresa['id'] ?></td>
                    <td><?= $empresa['razao_social'] ?></td>
                    <td><?= $empresa['nome_fantasia'] ?></td>
                    <td><?= $empresa['cnpj'] ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>/empresa/edit/<?= $empresa['id'] ?>"><img class="botControl" src="<?= BASE_URL ?>/public/imagens/botEdit.png" alt="Editar Empresa" title="Editar Empresa"></a>
    </a>
                        
                        <a href="<?= BASE_URL ?>/empresa/delete/<?= $empresa['id'] ?>" onclick="return confirm('Tem certeza?')"><img class="botControl" src="<?= BASE_URL ?>/public/imagens/botDel.png" alt="Excluir Empresa" title="Excluir Empresa"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</body>
</html>
