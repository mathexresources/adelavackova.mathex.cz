<?php
$albumId = $_GET['id'] ?? null;
if (!$albumId) {
    echo "Album ID is required.";
    exit;
}

$album = new Album($albumId, $db);

if ($album->isDeleted()) {
    echo "This album is no longer available.";
    exit;
}
?>

<!-- Hero -->
<div class="album-hero">
    <img src="<?= htmlspecialchars($album->getAlbumPath() . $album->getCoverImage()) ?>"
         alt="<?= htmlspecialchars($album->getName()) ?>">
    <div class="album-hero-overlay">
        <div>
            <h1><?= htmlspecialchars($album->getName()) ?></h1>
            <p><?= htmlspecialchars($album->getLocation()) ?><?= $album->getLocation() ? ' &nbsp;·&nbsp; ' : '' ?><?= $album->getCreatedHumanReadable() ?></p>
        </div>
    </div>
</div>

<!-- Content -->
<section style="padding: 4rem 2rem;">
    <div class="content-wrap">
        <div class="row g-5">
            <!-- Description -->
            <div class="col-md-5">
                <span class="section-label">Popis</span>
                <p class="fs-5 lh-lg"><?= nl2br(htmlspecialchars($album->getDescriptionFull())) ?></p>
                <p class="mt-4" style="font-size:0.8rem; letter-spacing:0.1em; text-transform:uppercase; color:var(--muted);">
                    <i class="fas fa-user me-2"></i><?= ucfirst(htmlspecialchars($album->getCreatedByName())) ?>
                </p>
                <a href="/albums" style="font-size:0.78rem; letter-spacing:0.12em; text-transform:uppercase; color:var(--muted);">
                    <i class="fas fa-arrow-left me-1"></i> Zpět
                </a>
            </div>

            <!-- Photo grid -->
            <div class="col-md-7">
                <span class="section-label">Fotografie &nbsp;(<?= $album->getPhotoCount() ?>)</span>
                <?php $photos = $album->getPhotos(); ?>
                <?php if (count($photos) > 0): ?>
                <div class="photo-grid">
                    <?php foreach ($photos as $index => $photo): ?>
                    <div class="photo-grid-item">
                        <img src="<?= htmlspecialchars($album->getAlbumPath() . $photo) ?>"
                             alt="Foto <?= $index + 1 ?>"
                             loading="lazy"
                             data-bs-toggle="modal"
                             data-bs-target="#photoModal"
                             data-index="<?= $index ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                    <p style="color:var(--muted)">Album je prázdné.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Photo Modal -->
<div class="modal fade overflow-hidden" id="photoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-black">
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                    data-bs-dismiss="modal" aria-label="Close" style="z-index:5;"></button>
            <div class="modal-body mySwiper overflow-hidden p-0">
                <div class="swiper-wrapper">
                    <?php foreach ($photos as $photo): ?>
                    <div class="swiper-slide">
                        <img src="<?= htmlspecialchars($album->getAlbumPath() . $photo) ?>"
                             class="w-100 h-100 object-fit-contain" alt="">
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
            </div>
        </div>
    </div>
</div>
