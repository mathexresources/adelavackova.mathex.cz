<?php
require_once '../fileHead.php';

if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header('Location: /login');
    die('<script>window.location = "/login";</script>');
    exit();
}

if (!isset($_SESSION['user']['admin']) || $_SESSION['user']['admin'] < 10) {
    header('Location: /admin');
    die('<script>window.location = "/admin";</script>');
    exit();
}

$types = $db->query("SELECT at.*, COUNT(a.id) as album_count FROM album_types at LEFT JOIN albums a ON a.type_id = at.id AND a.deleted = 0 GROUP BY at.id ORDER BY at.id")->fetch_all(MYSQLI_ASSOC);
?>
<?php require_once 'components/sidebar.php'; ?>
<div class="container container-fade">
    <?php require_once 'components/breadcrumbs.php'; ?>
    <div class="row">
        <h1 class="my-3">Typy alb</h1>
        <div class="col-5">
            <table class="table table-striped">
                <colgroup>
                    <col style="width: 10%;">
                    <col style="width: 55%;">
                    <col style="width: 20%;">
                    <col style="width: 15%;">
                </colgroup>
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Název</th>
                    <th scope="col">Alba</th>
                    <th scope="col">Akce</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($types as $type): ?>
                    <tr>
                        <th scope="row"><?= $type['id'] ?></th>
                        <td><?= htmlspecialchars($type['name']) ?></td>
                        <td><?= $type['album_count'] ?></td>
                        <td>
                            <?php if ($type['album_count'] == 0): ?>
                                <a href="/save/deleteAlbumType.php?id=<?= $type['id'] ?>"
                                   class="btn btn-link text-dark text-danger-hover"
                                   onclick="return confirm('Opravdu smazat typ \'<?= htmlspecialchars($type['name']) ?>\'?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            <?php else: ?>
                                <span class="btn btn-link text-muted disabled" title="Nelze smazat – typ je přiřazen k albumům">
                                    <i class="fa fa-trash"></i>
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-7">
            <h2>Přidat typ</h2>
            <form action="/save/albumTypes.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Název</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-dark mb-3">Přidat</button>
            </form>
        </div>
    </div>
</div>
