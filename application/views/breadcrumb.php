<?php var_dump($breadcrumb) ?>

<ol class="breadcrumb">
    <li>
        <a href="<?= site_url() ?>">
            <span class="glyphicon glyphicon-home">&nbsp;<?= $this->lang->line('home') ?></span>
        </a>
    </li>

    <?php if (!empty($breadcrumb)) : ?>
        <?php foreach ($breadcrumb as $item) : ?>
            <li>
                <a href="<?= $item['url'] ?>">
                    <?= $item['label'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ol>