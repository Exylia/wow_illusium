<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-hover table-characters">
            <thead>
                <tr>
                    <th class="col-md-4 text-center">Username</th>

                    <th class="col-md-4 text-center">Email</th>

                    <th class="col-md-4 text-center">role</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $index => $user) : ?>
                    <tr>
                        <td><?= $user->username ?></td>

                        <td><?= $user->email ?></td>

                        <td><?= str_replace('|', ' | ', $user->acl) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>