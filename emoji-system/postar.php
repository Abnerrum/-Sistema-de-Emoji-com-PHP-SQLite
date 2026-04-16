<?php
include 'conexao.php';

$texto = $_POST['texto'];

$stmt = $conn->prepare("INSERT INTO mensagens (texto) VALUES (?)");
$stmt->execute([$texto]);

header("Location: index.php");

