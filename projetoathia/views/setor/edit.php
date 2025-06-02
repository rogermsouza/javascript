<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Editar Setor</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
</head>
<body>
    <?php include BASE_PATH . 'public/components/menu.php'; ?>

    <section class="container">
        <h1>Editar Setor</h1>
        <form method="POST" action="<?= BASE_URL ?>/setor/update/<?= $setor['id'] ?>">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="<?= $setor['descricao'] ?>"><br>
            <label>Setor Pai:</label>
            <input type="number" name="setor_pai_id" value="<?= $setor['setor_pai_id'] ?>"><br>
            <button type="submit">Atualizar</button>
        </form>
    </section>
</body>
</html>
