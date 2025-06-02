<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Criar Setor</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
</head>
<body>
    <?php include BASE_PATH . 'public/components/menu.php'; ?>

    <section class="container">
        <h1>Novo Setor</h1>
        <form method="POST" action="<?= BASE_URL ?>/setor/store">
            <label>Descrição:</label>
            <input type="text" name="descricao"><br>
            
            <button type="submit">Salvar</button>
        </form>
    </section>
</body>
</html>
