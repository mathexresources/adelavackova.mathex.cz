<section style="padding: 5rem 2rem;">
    <div class="content-wrap">
        <span class="section-label">Galerie</span>
        <h1 class="hero-name mb-5" style="font-size: clamp(2.5rem, 6vw, 5rem);">Alba</h1>

        <!-- Filter tabs -->
        <div class="filter-tabs mb-0">
            <button class="filter-btn active" data-type="all">Vše</button>
            <?php
            foreach ($db->query('SELECT * FROM album_types ORDER BY name')->fetch_all(MYSQLI_ASSOC) as $row) {
                echo '<button class="filter-btn" data-type="' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</button>';
            }
            ?>
        </div>

        <div id="no-albums" class="alert alert-warning mt-4" role="alert" style="display:none;">
            V této kategorii nejsou žádná alba.
        </div>

        <div class="portfolio-grid mt-0" style="margin-top: 0 !important;">
            <?php
            $albums = $db->query('SELECT id FROM albums ORDER BY id DESC')->fetch_all(MYSQLI_ASSOC);
            foreach ($albums as $row):
                $album = new Album($row['id'], $db);
            ?>
            <a class="portfolio-item album album-id-<?= $album->getAlbumTypeId() ?>"
               href="/album?id=<?= $album->getId() ?>">
                <img src="<?= htmlspecialchars($album->getAlbumPath() . $album->getCoverImage()) ?>"
                     alt="<?= htmlspecialchars($album->getName()) ?>"
                     loading="lazy">
                <span class="item-count"><?= $album->getPhotoCount() ?> <i class="fas fa-images"></i></span>
                <div class="item-info">
                    <h5><?= htmlspecialchars($album->getName()) ?></h5>
                    <span class="item-meta">
                        <?php if ($album->getLocation()): ?><?= htmlspecialchars($album->getLocation()) ?><?php endif; ?>
                        <?php if ($album->getAlbumTypeId()): ?>
                            <?php if ($album->getLocation()): ?> &middot; <?php endif; ?>
                            <?= htmlspecialchars($album->getAlbumTypeName()) ?>
                        <?php endif; ?>
                    </span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
