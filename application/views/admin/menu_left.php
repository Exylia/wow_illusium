<div class="col-md-3">
    <div class="card bg-faded">
        <ul class="nav nav-pills nav-stacked">
            <li class="nav-item">
                <a class="nav-link <?= ((!empty($rubrique) && $rubrique === 'admin_user') ? 'active' : '') ?>" href="<?= site_url('admin/user') ?>"><?= lang('rubrique_admin_user') ?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ((!empty($rubrique) && $rubrique === 'admin_event') ? 'active' : '') ?>" href="<?= site_url('admin/event') ?>"><?= lang('rubrique_admin_event') ?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ((!empty($rubrique) && $rubrique === 'admin_roster') ? 'active' : '') ?>" href="<?= site_url('admin/roster') ?>"><?= lang('rubrique_admin_roster') ?></a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= ((!empty($rubrique) && $rubrique === 'admin_api_blizzard') ? 'active' : '') ?>" href="<?= site_url('admin/api_blizzard') ?>"><?= lang('rubrique_admin_api_blizzard') ?></a>
            </li>
        </ul>
    </div>
</div>