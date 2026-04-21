<?php
require_once '../fileHead.php';
if (isset($CONF_NO_HEADER_PAGES) && in_array($page, $CONF_NO_HEADER_PAGES)) {
    return;
}
?>
<nav class="site-navbar">
    <div class="nav-inner">
        <a href="/" class="brand"><?= htmlspecialchars($CONF_SHORT_NAME) ?></a>
        <ul class="nav-links">
            <?php
            $fePage = $page ?? 'home';
            $nav = $CONF_NAV;
            if (!empty($_SESSION['admin'])) {
                $nav['admin'] = 'Administrace';
            }
            foreach ($nav as $key => $value) {
                $active = ($key === $fePage || ($key === '' && $fePage === 'home')) ? 'active' : '';
                echo '<li><a href="/' . $key . '" class="' . $active . '">' . htmlspecialchars($value) . '</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>
