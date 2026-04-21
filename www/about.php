<section style="padding: 5rem 2rem;">
    <div class="content-wrap">
        <div class="row g-5 align-items-start">
            <!-- Text column -->
            <div class="col-md-7 order-md-1 order-2">
                <span class="section-label">Kdo jsem</span>
                <h1 class="about-name mb-5"><?= htmlspecialchars($CONF_TITLE) ?></h1>

                <div class="mb-5">
                    <p style="font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase; color:var(--muted); margin-bottom:0.75rem;">Zaměření</p>
                    <div>
                        <?php foreach ($CONF_SKILLS as $skill): ?>
                            <span class="skill-tag"><?= htmlspecialchars($skill) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="mb-5">
                    <p style="font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase; color:var(--muted); margin-bottom:0.75rem;">Programy</p>
                    <div>
                        <?php foreach ($CONF_TOOLS as $tool): ?>
                            <span class="skill-tag"><?= htmlspecialchars($tool) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div>
                    <p style="font-size:0.72rem; letter-spacing:0.18em; text-transform:uppercase; color:var(--muted); margin-bottom:0.75rem;">Vzdělání</p>
                    <p><?= htmlspecialchars($CONF_EDUCATION) ?></p>
                </div>
            </div>

            <!-- Portrait column -->
            <div class="col-md-5 order-md-2 order-1">
                <div class="about-portrait">
                    <img src="<?= htmlspecialchars($CONF_PORTRAIT) ?>"
                         alt="<?= htmlspecialchars($CONF_TITLE) ?>">
                </div>
            </div>
        </div>
    </div>
</section>
