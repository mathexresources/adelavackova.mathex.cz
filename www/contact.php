<?php
require_once '../fileHead.php';
$contact = $db->query("SELECT * FROM contacts LIMIT 1")->fetch_assoc();
?>
<section style="padding: 5rem 2rem;">
    <div class="content-wrap">
        <span class="section-label">Kontakt</span>
        <h1 class="contact-title"><?= htmlspecialchars($CONF_TITLE) ?></h1>

        <?php if (!empty($contact['email'])): ?>
        <a href="mailto:<?= htmlspecialchars($contact['email']) ?>" class="contact-row">
            <i class="fa fa-envelope fa-fw"></i>
            <?= htmlspecialchars($contact['email']) ?>
        </a>
        <?php endif; ?>

        <?php if (!empty($contact['phone'])): ?>
        <a href="tel:<?= htmlspecialchars($contact['phone']) ?>" class="contact-row">
            <i class="fa fa-phone fa-fw"></i>
            <?= htmlspecialchars($contact['phone']) ?>
        </a>
        <?php endif; ?>

        <?php if (!empty($contact['instagram'])): ?>
        <a href="<?= htmlspecialchars($contact['instagram']) ?>" target="_blank" class="contact-row">
            <i class="fa-brands fa-instagram fa-fw"></i>
            Instagram
        </a>
        <?php endif; ?>

        <?php if (!empty($contact['facebook'])): ?>
        <a href="<?= htmlspecialchars($contact['facebook']) ?>" target="_blank" class="contact-row">
            <i class="fa-brands fa-facebook fa-fw"></i>
            Facebook
        </a>
        <?php endif; ?>

        <?php if (!empty($contact['linkedin'])): ?>
        <a href="<?= htmlspecialchars($contact['linkedin']) ?>" target="_blank" class="contact-row">
            <i class="fa-brands fa-linkedin fa-fw"></i>
            LinkedIn
        </a>
        <?php endif; ?>

        <?php if (!empty($contact['address'])): ?>
        <div class="contact-row">
            <i class="fa fa-location-dot fa-fw"></i>
            <?= htmlspecialchars($contact['address']) ?>
        </div>
        <?php endif; ?>
    </div>
</section>
