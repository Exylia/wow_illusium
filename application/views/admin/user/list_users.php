<div class="col-md-9">
    <table class="table">
        <thead>
            <tr>
                <th><?= lang('user_username') ?></th>

                <th><?= lang('user_email') ?></th>

                <th><?= lang('user_acl') ?></th>

                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $index => $user) : ?>
                <tr>
                    <td><?= $user->username ?></td>

                    <td><?= $user->email ?></td>

                    <td><?= str_replace('|', ' | ', $user->acl) ?></td>

                    <td width="165px">
                        <div class="text-xs-center">
                            <div class="col-xs-4">
                                <a href="<?= site_url('admin/user/view/' . $user->id) ?>" title="<?= lang('view') ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </div>

                                <div class="col-xs-4">
                                    <a href="<?= site_url('admin/user/edit/' . $user->id) ?>"  title="<?= lang('edit') ?>">
                                        <li class="fa fa-pencil" aria-hidden="true"></li>
                                    </a>
                                </div>

                                <div class="col-xs-4">
                                    <?php if ($this->session->userdata('id') != $user->id) : ?>
                                        <a href="<?= site_url('admin/user/delete/' . $user->id) ?>" class="delete_user_confirm"  title="<?= lang('delete') ?>">
                                            <i class="fa fa-times" aria-hidden="true"></i>

                                        </a>
                                    <?php else : ?>
                                        <span>&nbsp;</span>
                                    <?php endif; ?>
                                </div>
                            </tr>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="float-lg-right">
        <a class="btn btn-primary" href="<?= site_url('admin/user/add') ?>">
            <span><?= lang('add_user') ?></span>
        </a>
    </div>
</div>

<script>
    $(function (){
        $('.delete_user_confirm').click(function (){
            return confirm ('<?= addslashes(lang('user_delete_confirm')) ?>');
        });
    });
</script>