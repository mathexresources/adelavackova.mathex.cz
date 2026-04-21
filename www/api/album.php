<?php
require_once '../../fileHead.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user']['admin']) || !$_SESSION['user']['admin']) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit();
}

if (!isset($_POST['action'], $_POST['albumId'])) {
    echo json_encode(['success' => false, 'message' => 'Missing required parameters.']);
    exit();
}


if ($_POST['action'] === 'delete') {
    $id = $_POST['albumId'];
    if (!is_numeric($id)) {
        echo json_encode(['success' => false, 'message' => 'Invalid album ID.']);
        exit();
    }
    $album = new Album($id, $db);
    $album->switchDeleted();
    echo json_encode(['success' => true, 'message' => 'Album visibility toggled.', 'albumId' => $id]);
    exit();
}

if ($_POST['action'] === 'destroy') {
    $id = $_POST['albumId'];
    if (!is_numeric($id)) {
        echo json_encode(['success' => false, 'message' => 'Invalid album ID.']);
        exit();
    }
    $album = new Album($id, $db);
    if ($album->getCreatedById() != $_SESSION['user']['id'] && $_SESSION['user']['admin'] != 10) {
        echo json_encode(['success' => false, 'message' => 'Permission denied.']);
        exit();
    }
    $album->destroy();
    echo json_encode(['success' => true, 'message' => 'Album permanently deleted.']);
    exit();
}

if ($_POST['action'] === 'create') {
    //create album in database
    $userId = $_SESSION['user']['id'];
    $sql = "INSERT INTO albums (name, created_by, texts) VALUES ('Nové album', $userId, '{}')";
    $db->query($sql);
    $albumId = $db->insert_id;
    $albumsPath = $_SERVER['DOCUMENT_ROOT'] . '/img/albums/';
    mkdir($albumsPath . $albumId);
    //copy thumbnail.jpg to new album
    copy($albumsPath . 'default/thumbnail.jpg', $albumsPath . $albumId . '/thumbnail.jpg');
    echo json_encode(['success' => true, 'id' => $albumId, 'message' => 'Album created successfully.', 'albumId' => $albumId]);
    exit();
}

if ($_POST['action'] === 'update') {
    $id = $_POST['albumId'];
    $key = $_POST['key'];
    $value = $_POST['value'];
    $sql = "UPDATE albums SET $key = '$value' WHERE id = $id";
    $db->query($sql);
    echo json_encode(['success' => true]);
    exit();
}

echo json_encode(['success' => false, 'message' => 'Invalid action.']);
exit();
