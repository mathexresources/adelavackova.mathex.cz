<?php
require_once '../../fileHead.php';

if (!isset($_SESSION['admin']) || !$_SESSION['admin'] || !isset($_SESSION['user']['admin']) || $_SESSION['user']['admin'] < 10) {
    header('Location: /login');
    die('<script>window.location = "/login";</script>');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');

    if ($name !== '') {
        $stmt = $db->prepare("INSERT INTO album_types (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->close();
    }
}

header('Location: /albumTypes');
die('<script>window.location = "/albumTypes";</script>');
