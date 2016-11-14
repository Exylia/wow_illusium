<div class="row">
    <div class="col-md-10 col-md-offset-1">
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

        <form action="" class="form-horizontal" method="POST">
            <div class="form-group <?php echo (!empty($error['username']) ? 'has-error' : '') ?>">
                <label for="username" class="col-md-2 control-label">Nom d'utilisateur</label>
                <div class="col-md-10">
                    <input
                        name="username"
                        type="text"
                        value="<?= !empty($values['username']) ? $values['username'] : '' ?>"
                        class="form-control"
                        placeholder="Nom d'utilisateur"
                    >
                </div>
            </div>

            <div class="form-group <?php echo (!empty($error['email']) ? 'has-error' : '') ?>">
                <label  for="email" class="col-md-2 control-label">Adresse e-mail</label>
                <div class="col-md-10">
                    <input
                        name="email"
                        type="email"
                        value="<?= !empty($values['email']) ? $values['email'] : '' ?>"
                        class="form-control"
                        placeholder="exemple@wxyz.com"
                    >
                </div>
            </div>

            <div class="form-group <?php echo (!empty($error['password']) ? 'has-error' : '') ?>">
                <label for="password" class="col-md-2 control-label">Mot de passe</label>
                <div class="col-md-10">
                    <input
                        name="password"
                        type="password"
                        value="<?= !empty($values['password']) ? $values['password'] : '' ?>"
                        class="form-control"
                    >
                </div>
            </div>

            <div class="form-group <?php echo (!empty($error['password_confirm']) ? 'has-error' : '') ?>">
                <label for="password_confirm" class="col-md-2 control-label">Confirmation mot de passe</label>
                <div class="col-md-10">
                    <input
                        name="password_confirm"
                        type="password"
                        value="<?= !empty($values['password_confirm']) ? $values['password_confirm'] : '' ?>"
                        class="form-control"
                    >
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                </div>
            </div>
        </form>
    </div>
</div>