<?php
require_once '../fileHead.php';

$contact = $db->query("SELECT * FROM contacts LIMIT 1")->fetch_assoc();
?>
<div class="container animate__animated animate__backInRight py-5 mb-5">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-6">
            <h1 class="dancing-script mb-4" style="font-size: 4rem">Kontakt</h1>
            <ul class="list-unstyled mt-4">
                <?php if (!empty($contact['email'])): ?>
                <li class="mb-3 d-flex align-items-center gap-3">
                    <i class="fa fa-envelope fa-fw fs-5"></i>
                    <a href="mailto:<?= htmlspecialchars($contact['email']) ?>" class="text-dark text-decoration-none">
                        <?= htmlspecialchars($contact['email']) ?>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (!empty($contact['phone'])): ?>
                <li class="mb-3 d-flex align-items-center gap-3">
                    <i class="fa fa-phone fa-fw fs-5"></i>
                    <a href="tel:<?= htmlspecialchars($contact['phone']) ?>" class="text-dark text-decoration-none">
                        <?= htmlspecialchars($contact['phone']) ?>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (!empty($contact['instagram'])): ?>
                <li class="mb-3 d-flex align-items-center gap-3">
                    <i class="fa-brands fa-instagram fa-fw fs-5"></i>
                    <a href="<?= htmlspecialchars($contact['instagram']) ?>" target="_blank" class="text-dark text-decoration-none">
                        Instagram
                    </a>
                </li>
                <?php endif; ?>
                <?php if (!empty($contact['facebook'])): ?>
                <li class="mb-3 d-flex align-items-center gap-3">
                    <i class="fa-brands fa-facebook fa-fw fs-5"></i>
                    <a href="<?= htmlspecialchars($contact['facebook']) ?>" target="_blank" class="text-dark text-decoration-none">
                        Facebook
                    </a>
                </li>
                <?php endif; ?>
                <?php if (!empty($contact['linkedin'])): ?>
                <li class="mb-3 d-flex align-items-center gap-3">
                    <i class="fa-brands fa-linkedin fa-fw fs-5"></i>
                    <a href="<?= htmlspecialchars($contact['linkedin']) ?>" target="_blank" class="text-dark text-decoration-none">
                        LinkedIn
                    </a>
                </li>
                <?php endif; ?>
                <?php if (!empty($contact['address'])): ?>
                <li class="mb-3 d-flex align-items-center gap-3">
                    <i class="fa fa-location-dot fa-fw fs-5"></i>
                    <span><?= htmlspecialchars($contact['address']) ?></span>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
