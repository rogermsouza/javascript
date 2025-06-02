<!DOCTYPE html>
<html>
<head>
    <title>Criar Empresa</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
</head>
<body>
    <?php include BASE_PATH . 'public/components/menu.php'; ?>
    <section class="container">
        <h1>Criar Empresa</h1>
        <form method="POST" action="<?= BASE_URL ?>/empresa/store">

            <!-- Dados básicos -->
            <input type="text" name="razao_social" placeholder="Razão Social"><br>
            <input type="text" name="nome_fantasia" placeholder="Nome Fantasia"><br>
            <input type="text" name="cnpj" placeholder="CNPJ"><br>

            <h3>Setores:</h3>
            <?php foreach ($setores as $setor): ?>
                <label>
                    <input type="checkbox" name="setores[]" value="<?= $setor['id'] ?>">
                    <?= $setor['descricao'] ?>
                </label><br>
            <?php endforeach; ?>


            <button type="submit">Salvar</button>
        </form>
    </section>

</body>
</html>
