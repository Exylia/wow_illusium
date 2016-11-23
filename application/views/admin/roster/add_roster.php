<div class="col-md-9">
    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul>
                <?php foreach ($error as $key => $value) : ?>
                    <li> <?php echo $value ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif;?>

    <form action="" method="POST">
        <div class="form-group row <?php echo (!empty($error['name']) ? 'has-error' : '') ?>">
            <label for="name" class="col-md-4 col-form-label"><?= lang('roster_name') ?></label>
            <div class="col-md-8">
                <input
                    name="name"
                    type="text"
                    value="<?= !empty($values['name']) ? $values['name'] : '' ?>"
                    class="form-control"
                >
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-3 offset-lg-4 form-group">
                <a href="<?= site_url('admin/roster') ?>" class="btn btn-secondary btn-block">
                    <span><?= lang('return') ?></span>
                </a>
            </div>

            <div class="col-lg-3 offset-lg-2 form-group">
                <button type="submit" class="btn btn-primary btn-block"><?= lang('create') ?></button>
            </div>
        </div>
    </form>
</div>