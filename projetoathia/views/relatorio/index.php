<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Relatório de Empresas e Setores</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
</head>
<body>
    <?php include BASE_PATH . 'public/components/menu.php'; ?>
    <section class="container">
        <h1>Relatório de Empresas e Setores Vinculados</h1>
        
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Razão Social</th>
                    <th>Nome Fantasia</th>
                    <th>CNPJ</th>
                    <th>Setores Vinculados</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($relatorio as $empresa): ?>
                    <tr class="select">
                        <td><?= htmlspecialchars($empresa['empresa_id']) ?></td>
                        <td><?= htmlspecialchars($empresa['razao_social']) ?></td>
                        <td><?= htmlspecialchars($empresa['nome_fantasia']) ?></td>
                        <td><?= htmlspecialchars($empresa['cnpj']) ?></td>
                        <td><?= htmlspecialchars($empresa['setores'] ?? '-') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</body>
</html>
