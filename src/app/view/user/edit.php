<main>
    <div class="uedit-container">
        <div style="max-width:350px;">
            <?php if (isset($user)): ?>
            <form action="/user/update" method="POST">
                <input id="id" name="id" value="<?php echo $user["id"]; ?>" hidden>
                <h2>編集 | EDIT</h2>
                <?php else: ?>
                <form action="/user/add" method="POST">
                    <h2>追加 | ADD</h2>
                    <?php endif; ?>
                    <div>
                        <input name="name" type="text" placeholder="名前 | Name"
                               value="<?php echo isset($user) ? $user["name"] : ""; ?>">
                    </div>
                    <div>
                        <input name="email" type="email" placeholder="メールアドレス | Email"
                               value="<?php echo isset($user) ? $user["email"] : ""; ?>">
                    </div>
                    <div>
                        <input name="password" type="password" placeholder="パスワード | Password"
                               value="<?php echo isset($user) ? $user["password"] : ""; ?>">
                    </div>
                    <div>
                        <button class="uk-button uk-button-secondary uk-width-1-1">提出</button>
                    </div>
                </form>
        </div>
    </div>
</main>