<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Emoji System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>💬 Sistema de Emoji</h1>

<form action="postar.php" method="post">
    <input type="text" name="texto" placeholder="Digite uma mensagem" required>
    <button>Postar</button>
</form>

<hr>

<?php
$result = $conn->query("SELECT * FROM mensagens ORDER BY id DESC");

foreach ($result as $msg):
?>

<div class="mensagem">
    <p><?= htmlspecialchars($msg['texto']) ?></p>

    <!-- Botões de emoji -->
    <div class="emojis">
        <a href="reagir.php?id=<?= $msg['id'] ?>&emoji=👍">👍</a>
        <a href="reagir.php?id=<?= $msg['id'] ?>&emoji=❤️">❤️</a>
        <a href="reagir.php?id=<?= $msg['id'] ?>&emoji=😂">😂</a>
    </div>

    <!-- Contagem -->
    <div class="contagem">
        <?php
        $reacoes = $conn->prepare("
            SELECT emoji, COUNT(*) as total 
            FROM reacoes 
            WHERE mensagem_id = ?
            GROUP BY emoji
        ");
        $reacoes->execute([$msg['id']]);

        foreach ($reacoes as $r) {
            echo $r['emoji'] . " (" . $r['total'] . ") ";
        }
        ?>
    </div>

</div>

<hr>

<?php endforeach; ?>

</div>

</body>
</html>