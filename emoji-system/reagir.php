<?php
include 'conexao.php';

$mensagem_id = $_GET['id'];
$emoji = $_GET['emoji'];

$stmt = $conn->prepare("INSERT INTO reacoes (mensagem_id, emoji) VALUES (?, ?)");
$stmt->execute([$mensagem_id, $emoji]);

header("Location: index.php");