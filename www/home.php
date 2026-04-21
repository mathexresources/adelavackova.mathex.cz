<?php
$images = [];
$albums = $db->query('SELECT id FROM albums ORDER BY id DESC')->fetch_all(MYSQLI_ASSOC);
foreach ($albums as $id) {
    $album = new Album($id['id'], $db);
    $imgs = $album->getPhotos();
    foreach ($imgs as $img) {
        $images[] = $album->getAlbumPath() . $img;
    }
}

$aspectRatio = 600 / 1080;
$validImages = [];
foreach ($images as $image) {
    [$width, $height] = getimagesize($_SERVER['DOCUMENT_ROOT'] . $image);
    if ($width >= 300 && $height >= 540) {
        $ratio = $width / $height;
        if ($ratio >= ($aspectRatio - 0.1) && $ratio <= ($aspectRatio + 0.1)) {
            $validImages[] = $image;
        }
    }
}
if (count($validImages) < 9) {
    $defaultImagesDir = $_SERVER['DOCUMENT_ROOT'] . '/img/home';
    $defaultImages = array_diff(scandir($defaultImagesDir), ['.', '..']);
    shuffle($defaultImages);
    foreach ($defaultImages as $img) {
        if (count($validImages) >= 9) break;
        $validImages[] = '/img/home/' . $img;
    }
}
$stripImages = array_slice($validImages, 0, 9);
?>

<!-- Hero -->
<section class="site-hero">
    <div class="content-wrap">
        <p class="hero-tagline mb-4"><?= htmlspecialchars($CONF_TAGLINE) ?></p>
        <h1 class="hero-name"><?= htmlspecialchars($CONF_TITLE) ?></h1>
        <a href="/albums" class="hero-cta">Zobrazit práce</a>
    </div>
</section>

<!-- Image strip -->
<div class="swiper swiper-home">
    <div class="swiper-wrapper">
        <?php foreach ($stripImages as $image): ?>
            <div class="swiper-slide">
                <img src="<?= htmlspecialchars($image) ?>" loading="lazy" alt="">
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Recent work -->
<section style="padding: 5rem 2rem;">
    <div class="content-wrap">
        <span class="section-label">Nejnovější práce</span>
        <div class="portfolio-grid">
            <?php
            $recentAlbums = $db->query('SELECT id FROM albums ORDER BY id DESC LIMIT 6')->fetch_all(MYSQLI_ASSOC);
            foreach ($recentAlbums as $row):
                $album = new Album($row['id'], $db);
            ?>
            <a class="portfolio-item" href="/album?id=<?= $album->getId() ?>">
                <img src="<?= htmlspecialchars($album->getAlbumPath() . $album->getCoverImage()) ?>"
                     alt="<?= htmlspecialchars($album->getName()) ?>"
                     loading="lazy">
                <span class="item-count"><?= $album->getPhotoCount() ?> <i class="fas fa-images"></i></span>
                <div class="item-info">
                    <h5><?= htmlspecialchars($album->getName()) ?></h5>
                    <span class="item-meta">
                        <?php if ($album->getAlbumTypeId()): ?><?= htmlspecialchars($album->getAlbumTypeName()) ?><?php endif; ?>
                    </span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <div class="mt-4">
            <a href="/albums" class="btn btn-outline-light">Celá galerie &nbsp;<i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
</section>
