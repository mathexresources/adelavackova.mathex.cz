<?php
require_once '../fileHead.php';

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('Location: /login');
    die('<script>window.location = "/login";</script>');
    exit();
}

$contact = $db->query("SELECT * FROM contacts LIMIT 1")->fetch_assoc();
?>
<?php require_once 'components/sidebar.php'; ?>
<div class="container container-fade">
    <?php require_once 'components/breadcrumbs.php'; ?>
    <div class="row">
        <h1 class="my-3">Kontaktní údaje</h1>
        <div class="col-md-6">
            <form action="/save/contactDetails.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= htmlspecialchars($contact['email'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefon</label>
                    <input type="text" class="form-control" id="phone" name="phone"
                           value="<?= htmlspecialchars($contact['phone'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram (URL)</label>
                    <input type="url" class="form-control" id="instagram" name="instagram"
                           value="<?= htmlspecialchars($contact['instagram'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="facebook" class="form-label">Facebook (URL)</label>
                    <input type="url" class="form-control" id="facebook" name="facebook"
                           value="<?= htmlspecialchars($contact['facebook'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="linkedin" class="form-label">LinkedIn (URL)</label>
                    <input type="url" class="form-control" id="linkedin" name="linkedin"
                           value="<?= htmlspecialchars($contact['linkedin'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Adresa / Lokace</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="<?= htmlspecialchars($contact['address'] ?? '') ?>">
                </div>
                <button type="submit" class="btn btn-dark mb-3">Uložit</button>
            </form>
        </div>
    </div>
</div>
