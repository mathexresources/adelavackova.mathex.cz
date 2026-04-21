<?php
$images = [];
// Get last 3 albums
$albums = $db->query('SELECT id FROM albums ORDER BY id DESC')->fetch_all(MYSQLI_ASSOC);
foreach ($albums as $id) {
    $album = new Album($id['id'], $db);
    $imgs = $album->getPhotos();
    foreach ($imgs as $img) {
        $path = $album->getAlbumPath() . $img;
        $images[] = $path;
    }
}

// Check resolution and aspect ratio (around 600x1080)
$aspectRatio = 600 / 1080;
$validImages = [];
foreach ($images as $image) {
    [$width, $height] = getimagesize($_SERVER['DOCUMENT_ROOT'].$image);
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
$images = array_slice($validImages, 0, 9); // Always max 9 images
?>


<div class="wrapper svgBg">
    <div class="container mt-5 h-75" style="min-width: 90vw; min-height: 75vh">
        <div class="row">
            <div class=" col text-center animate__animated animate__backInUp">
                <img src="/img/home/hero.svg" alt="Portfolio" class="img-fluid shadow rounded" style="height: 640px; width: auto;">
            </div>
        </div>
    </div>
</div>
<div class="container animate__animated animate__backInRight py-5 mb-5">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <h1 class="dancing-script" style="font-size: 4rem">
                Adéla Bartůňková
            </h1>
            <ul class="list-unstyled mt-5">
                <li class="mb-3">
                    <strong>Zaměření</strong>
                    <ul>
                        <li>Grafický design, Fotografická tvorba, 3D Grafika, Film a video, Kresba, Malba</li>
                    </ul>
                </li>
                <li class="mb-3">
                    <strong>Práce v programech</strong>
                    <ul>
                        <li>Adobe Illustrátor, Adobe InDesign, Adobe Photoshop, Adobe Premiere Pro, Adobe Lightroom, Blender, Procreate</li>
                    </ul>
                </li>
                <li>
                    <strong>Vzdělání</strong>
                    <ul>
                        <li>Odborná střední škola podnikání a mediální tvorby Kolín s.r.o.</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-md-4 text-center">
            <div class="oval-wrapper mx-auto shadow" style="width: 300px; height: 400px; overflow: hidden; border-radius: 50% / 40%; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
                <img src="/img/home/sili.jpg" class="img-fluid shadow" alt="Adéla Bartůňková" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>


<div class="container animate__animated animate__backInLeft mt-5 pt-5" style="min-width: 90vw">
            <h1 class="display-5 ephesis">Výběr</h1>
</div>

<div class="swiper rounded mySwiper animate__animated animate__backInLeft shadow">
    <div class="swiper-wrapper">
        <?php foreach ($images as $image): ?>
            <div class="swiper-slide">
                <img src="<?= $image ?>" loading="lazy"  style="object-fit: cover;">
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-gradient-overlay"></div>
</div>
<div class="container animate__animated animate__backInLeft mt-5 pt-5" style="min-width: 90vw">
    <h1 class="display-5 ephesis" >Galerie</h1>
    <div class="row g-4">
        <?php
        $albums = $db->query('SELECT id FROM albums ORDER BY albums.id DESC LIMIT 4')->fetch_all(MYSQLI_ASSOC);
        foreach ($albums as $id) {
            $album = new Album($id['id'], $db);
            ?>
            <div class="col-lg-3 col-md-6 col-12 fade-in-up">
                <div class="card card-hover position-relative h-100"
                     onclick="window.location.href = '/album?id=<?= $album->getId() ?>'">
                    <img src="<?= $album->getAlbumPath() . $album->getCoverImage() ?>"
                         class="card-img-top object-fit-cover rounded-top"
                         style="height: 250px;"
                         alt="<?= htmlspecialchars($album->getName()) ?>">

                    <!-- Optional badge for photo count -->
                    <span class="position-absolute top-0 end-0 m-2 badge bg-dark bg-opacity-50 text-white">
                    <?= $album->getPhotoCount() ?> <i class="fas fa-images"></i>
                </span>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold"><?= htmlspecialchars($album->getName()) ?></h5>

                        <?php if ($album->getLocation() != ''): ?>
                            <h6 class="card-subtitle text-muted mb-2"><?= htmlspecialchars($album->getLocation()) ?></h6>
                        <?php endif; ?>

                        <!-- Author and date -->
                        <div class="d-flex align-items-center text-muted small mb-2 gap-3">
                            <span><i class="fas fa-user me-1"></i><?= ucfirst($album->getCreatedByName()) ?></span>
                            <span><i class="fas fa-calendar-alt me-1"></i><?= $album->getCreatedHumanReadable() ?></span>
                            <?php if ($album->getAlbumTypeId() != 0): ?>
                                <span class="badge text-bg-secondary"><i class="fas fa-filter me-1"></i><?= $album->getAlbumTypeName() ?></span>
                            <?php endif; ?>
                        </div>

                        <p class="card-text mt-auto"><?= $album->getDescription() ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="albums" class="btn btn-outline-dark mt-3" style="border-radius: 0.5rem;">Celá galerie <i class="fa fa-arrow-right"></i></a>
</div>