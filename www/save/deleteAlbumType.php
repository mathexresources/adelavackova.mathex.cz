<?php
require_once '../../fileHead.php';

if (!isset($_SESSION['admin']) || !$_SESSION['admin'] || !isset($_SESSION['user']['admin']) || $_SESSION['user']['admin'] < 10) {
    header('Location: /login');
    die('<script>window.location = "/login";</script>');
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $inUse = $db->prepare("SELECT COUNT(*) as cnt FROM albums WHERE type_id = ? AND deleted = 0");
    $inUse->bind_param("i", $id);
    $inUse->execute();
    $count = $inUse->get_result()->fetch_assoc()['cnt'];
    $inUse->close();

    if ($count === 0) {
        $stmt = $db->prepare("DELETE FROM album_types WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

header('Location: /albumTypes');
die('<script>window.location = "/albumTypes";</script>');
