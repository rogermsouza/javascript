<?php require_once __DIR__ . '/../../config/config.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Buscar Empresas</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/style.css" />
</head>
<body>
    <?php include BASE_PATH . 'public/components/menu.php'; ?>
    <div class="container">
        <h1>Buscar Empresas</h1>

        <form method="GET" action="<?= BASE_URL ?>/empresa/search">
            <div class="form-group">
                <label for="term">Termo de busca:</label>
                <input type="text" id="term" name="term" value="<?= htmlspecialchars($term ?? '') ?>" placeholder="Nome, Razão Social ou CNPJ" />
            </div>

            <div class="form-group">
                <label for="setor_id">Setor:</label>
                <select id="setor_id" name="setor_id">
                    <option value="">-- Todos os setores --</option>
                    <?php foreach ($setores as $setor): ?>
                        <option value="<?= $setor['id'] ?>" <?= (isset($setor_id) && $setor_id == $setor['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($setor['descricao']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit">Buscar</button>
        </form>

        <hr>
        <h2>Resultados da Busca</h2>

    <?php if (isset($empresas)): ?>
        <?php if (count($empresas) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                        <th>Setores</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empresas as $empresa): ?>
                        <tr class="select">
                            <td><?= htmlspecialchars($empresa['razao_social']) ?></td>
                            <td><?= htmlspecialchars($empresa['cnpj']) ?></td>
                            <td><?= htmlspecialchars($empresa['setores'] ?? 'Nenhum') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-results" style="margin-top: 20px; font-weight: bold; color: #555;">
                Nenhuma empresa encontrada para os critérios informados.
            </div>
        <?php endif; ?>
    <?php endif; ?>


    </div>
</body>
</html>
