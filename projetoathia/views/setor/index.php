<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Setores</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
</head>
<body>
    <?php include BASE_PATH . 'public/components/menu.php'; ?>

    <section class="container">
        <h1>Setores</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Ações</th></tr>
            <?php foreach ($setores as $s): ?>
                <tr class="select">
                    <td><?= $s['id'] ?></td>
                    <td><?= $s['descricao'] ?></td>
                    
                    <td>
                        <a href="<?= BASE_URL ?>/setor/edit/<?= $s['id'] ?>"><img class="botControl" src="<?= BASE_URL ?>/public/imagens/botEdit.png" alt="Editar Setor" title="Editar Setor"></a>
                        <a href="<?= BASE_URL ?>/setor/delete/<?= $s['id'] ?>" onclick="return confirm('Excluir setor?')"><img class="botControl" src="<?= BASE_URL ?>/public/imagens/botDel.png" alt="Excluir Setor" title="Excluir Setor"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</body>
</html>
