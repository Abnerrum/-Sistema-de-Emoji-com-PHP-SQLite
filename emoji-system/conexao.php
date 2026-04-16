<?php

try {
    $conn = new PDO("sqlite:banco.db");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Criar tabelas
    $conn->exec("
        CREATE TABLE IF NOT EXISTS mensagens (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            texto TEXT
        );

        CREATE TABLE IF NOT EXISTS reacoes (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            mensagem_id INTEGER,
            emoji TEXT
        );
    ");

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>