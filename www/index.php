<?php
require_once '../fileHead.php';
$page = $_SERVER['REQUEST_URI'] ?? '';
$page = ltrim($page, '/');
$page = rtrim($page, '/');
$pageArr = explode('?', $page);
$page = $pageArr[0];
$pageget = $pageArr[1] ?? [];
if ($page == '') {
    $page = 'home';
}

if (preg_match('/^album\/(\d+)$/', $page, $matches)) {
    $_GET['id'] = $matches[1];
    $page = 'album';
}
?>
<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/trumbowyg/dist/ui/trumbowyg.min.css">

    <?php if (file_exists('./css/' . $page . '.css')): ?>
        <link rel="stylesheet" href="/css/<?= $page ?>.css">
    <?php elseif (str_starts_with($page, 'join/')): ?>
        <link rel="stylesheet" href="/css/join.css">
    <?php endif; ?>

    <script src="https://kit.fontawesome.com/e8daec485b.js" crossorigin="anonymous"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/trumbowyg/dist/trumbowyg.min.js"></script>
    <script src="/js/dataTables.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <title><?= htmlspecialchars($CONF_TITLE) ?></title>
    <meta name="description" content="<?= htmlspecialchars($CONF_META_DESCRIPTION) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($CONF_META_KEYWORDS) ?>">
    <link rel="shortcut icon" href="/img/logo/favicon.png" type="image/x-icon">

    <meta property="og:title" content="<?= htmlspecialchars($CONF_TITLE) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($CONF_META_DESCRIPTION) ?>">
    <meta property="og:url" content="https://<?= htmlspecialchars($CONF_DOMAIN) ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= htmlspecialchars($CONF_OG_IMAGE) ?>">
</head>
<body<?php if (in_array($page, $CONF_NO_HEADER_PAGES)): ?> class="admin-page"<?php endif; ?>>

<?php
if ($CONF_DEBUG) {
    print_r($_SESSION);
    echo '<br>page: ' . $page;
}

if (file_exists($page . '.php')) {
    require_once './components/header.php';
    require_once $page . '.php';
    require_once './components/footer.php';
    if (file_exists('./js/' . $page . '.js')) {
        echo '<script src="js/' . $page . '.js"></script>';
    }
} else {
    require_once '404.php';
}
?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
