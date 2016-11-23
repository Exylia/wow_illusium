<ul class="nav nav-tabs">
    <li class="nav-item" role="presentation">
        <a class="nav-link <?= ((!empty($page) && $page === 'general') ? 'active' : '') ?>" href="<?= site_url('admin/api_blizzard') ?>"><?= lang('onglet_general') ?></a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link <?= ((!empty($page) && $page === 'raid') ? 'active' : '') ?>" href="<?= site_url('admin/api_blizzard/raid') ?>"><?= lang('onglet_raid') ?></a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link <?= ((!empty($page) && $page === 'traduction') ? 'active' : '') ?>" href="<?= site_url('admin/api_blizzard/traduction') ?>"><?= lang('onglet_traduction') ?></a>
    </li>
</ul>