<?php
if (isset($CONF_NO_FOOTER_PAGES) && in_array($page, $CONF_NO_FOOTER_PAGES)) {
    return;
}
?>
<footer class="site-footer">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div>
            <span class="footer-brand"><?= htmlspecialchars($CONF_SHORT_NAME) ?></span>
            <p class="footer-small mt-1">&copy; <?= date('Y') ?> &nbsp;·&nbsp; Made by <a href="<?= htmlspecialchars($CONF_CREATOR_INSTAGRAM) ?>" target="_blank"><?= htmlspecialchars($CONF_CREATOR_NAME) ?></a></p>
        </div>
        <div class="footer-socials">
            <?php if (!empty($CONF_SOCIAL_INSTAGRAM)): ?>
                <a href="<?= htmlspecialchars($CONF_SOCIAL_INSTAGRAM) ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
            <?php endif; ?>
            <?php if (!empty($CONF_SOCIAL_FACEBOOK)): ?>
                <a href="<?= htmlspecialchars($CONF_SOCIAL_FACEBOOK) ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>
            <?php if (!empty($CONF_SOCIAL_TWITTER)): ?>
                <a href="<?= htmlspecialchars($CONF_SOCIAL_TWITTER) ?>" target="_blank" title="Twitter / X"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>
        </div>
    </div>
</footer>
