<?php
require_once '../../fileHead.php';

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('Location: /login');
    die('<script>window.location = "/login";</script>');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email     = $_POST['email'] ?? '';
    $phone     = $_POST['phone'] ?? '';
    $instagram = $_POST['instagram'] ?? '';
    $facebook  = $_POST['facebook'] ?? '';
    $linkedin  = $_POST['linkedin'] ?? '';
    $address   = $_POST['address'] ?? '';

    $existing = $db->query("SELECT id FROM contacts LIMIT 1")->fetch_assoc();

    if ($existing) {
        $stmt = $db->prepare("UPDATE contacts SET email=?, phone=?, instagram=?, facebook=?, linkedin=?, address=? WHERE id=?");
        $stmt->bind_param("ssssssi", $email, $phone, $instagram, $facebook, $linkedin, $address, $existing['id']);
    } else {
        $stmt = $db->prepare("INSERT INTO contacts (email, phone, instagram, facebook, linkedin, address) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $email, $phone, $instagram, $facebook, $linkedin, $address);
    }

    $stmt->execute();
    $stmt->close();
}

header('Location: /contactDetails');
die('<script>window.location = "/contactDetails";</script>');
