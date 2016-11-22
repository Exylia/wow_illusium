<ul class="nav nav-tabs">
    <li role="presentation" <?= ((!empty($page) && $page === 'general') ? 'class="active"' : '') ?>>
        <a href="<?= site_url('admin/api_blizzard') ?>"><?= lang('onglet_general') ?></a>
    </li>

    <li role="presentation" <?= ((!empty($page) && $page === 'raid') ? 'class="active"' : '') ?>>
        <a href="<?= site_url('admin/api_blizzard/raid') ?>"><?= lang('onglet_raid') ?></a>
    </li>

    <li role="presentation" <?= ((!empty($page) && $page === 'traduction') ? 'class="active"' : '') ?>>
        <a href="<?= site_url('admin/api_blizzard/traduction') ?>"><?= lang('onglet_traduction') ?></a>
    </li>
</ul>