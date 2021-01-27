<div class="">
    <div class="uk-container" style="max-width:350px;">
        <?php if (isset($user)): ?>
        <form action="/user/update" method="POST">
            <input id="id" name="id" value="<?php echo $user["id"]; ?>" hidden>
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">編集 | EDIT</legend>
        <?php else: ?>
        <form class="" action="/user/add" method="POST">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">追加 | ADD</legend>
        <?php endif; ?>
                <div class="uk-margin">
                    <input class="uk-input" name="name" type="text" placeholder="名前 | Name"
                           value="<?php echo isset($user) ? $user["name"] : ""; ?>">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" name="email" type="email" placeholder="メールアドレス | Email"
                           value="<?php echo isset($user) ? $user["email"] : ""; ?>">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" name="password" type="password" placeholder="パスワード | Password"
                           value="<?php echo isset($user) ? $user["password"] : ""; ?>">
                </div>
                <div class="uk-margin" style="max-width:250px;">
                    <button class="uk-button uk-button-secondary uk-width-1-1">提出</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>