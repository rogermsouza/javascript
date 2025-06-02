<!DOCTYPE html>
<html>
<head>
    <title>Editar Empresa</title>
        <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
</head>
<body>
    <?php include BASE_PATH . 'public/components/menu.php'; ?>
    <section class="container">
        
        
        <h1>Editar Empresa</h1>
        

        <form method="POST" action="<?= BASE_URL ?>/empresa/update/<?= $empresa['id'] ?>">

            <label>Razão Social:</label>
            <input type="text" name="razao_social" value="<?= $empresa['razao_social'] ?>"><br>

            <label>Nome Fantasia:</label>
            <input type="text" name="nome_fantasia" value="<?= $empresa['nome_fantasia'] ?>"><br>

            <label>CNPJ:</label>
            <input type="text" name="cnpj" value="<?= $empresa['cnpj'] ?>"><br>

            <label>Setores:</label><br>
            <?php foreach ($setores as $setor): ?>
                <input type="checkbox" name="setores[]" value="<?= $setor['id'] ?>"
                    <?= in_array($setor['id'], $empresaSetores) ? 'checked' : '' ?>>
                <?= $setor['descricao'] ?><br><br>
            <?php endforeach; ?>

            <button type="submit">Atualizar</button>
        </form>
    </section>

</body>
</html>
