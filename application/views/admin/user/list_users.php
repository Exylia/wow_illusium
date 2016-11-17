<div class="col-md-9">
    <h2><?= lang('page_title') ?></h2>

    <div class="pull-right">
        <a class="btn btn-default" href="<?= site_url('admin/user/add') ?>">
            <span><?= lang('add_user') ?></span>
        </a>
    </div>

    <table class="table table-hover table-characters">
        <thead>
            <tr>
                <th class="col-md-4"><?= lang('username') ?></th>

                <th class="col-md-4"><?= lang('email') ?></th>

                <th class="col-md-2"><?= lang('acl') ?></th>

                <th class="col-md-2">&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $index => $user) : ?>
                <tr>
                    <td><?= $user->username ?></td>

                    <td><?= $user->email ?></td>

                    <td><?= str_replace('|', ' | ', $user->acl) ?></td>

                    <td class="list-action">
                        <table>
                            <tr>
                                <td width="33%">
                                    <a href="<?= site_url('admin/user/view/' . $user->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= lang('view') ?>">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </a>
                                </td>

                                <td width="33%">
                                    <a href="<?= site_url('admin/user/edit/' . $user->id) ?>" data-toggle="tooltip" data-placement="top" title="<?= lang('edit') ?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>

                                <td width="33%">
                                    <?php if ($this->session->userdata('id') != $user->id) : ?>
                                        <a href="<?= site_url('admin/user/delete/' . $user->id) ?>" class="delete_user_confirm" data-toggle="tooltip" data-placement="top" title="<?= lang('delete') ?>">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    <?php else : ?>
                                        <span>&nbsp;</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(function (){
        $('.delete_user_confirm').click(function (){
            return confirm ('<?= addslashes(lang('user_delete_confirm')) ?>');
        });
    });
</script>