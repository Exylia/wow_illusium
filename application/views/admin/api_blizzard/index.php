<div class="col-md-9">
    <h2><?= lang('rubrique_admin_api_blizzard') ?></h2>

    <?php $this->load->view('admin/api_blizzard/onglet', array('page' => empty($page) ? '' : $page)) ?>
</div>