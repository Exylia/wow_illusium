<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= site_url() ?>">
            <span class="glyphicon glyphicon-home">&nbsp;</span><span><?= lang('home') ?></span>
        </a>
    </li>

    <?php if (!empty($breadcrumb)) : ?>
        <?php foreach ($breadcrumb as $item) : ?>
            <?php if (!empty($item['active']) && $item['active'] === 1) : ?>
                <li class="breadcrumb-item active">
                    <?= $item['label'] ?>
                </li>
            <?php else : ?>
                <li class="breadcrumb-item">
                    <a href="<?= $item['url'] ?>">
                        <?= $item['label'] ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</ol>