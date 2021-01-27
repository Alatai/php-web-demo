<?php if (isset($users)): ?>
    <div class="uk-container">
        <div class="uk-margin-medium" uk-grid>
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Time</th>
                    <th>Admin</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user["name"]; ?></td>
                        <td><?php echo $user["email"]; ?></td>
                        <td><?php echo $user["created_at"]; ?></td>
                        <?php if ($user["admin"] == 1): ?>
                            <td>Administrator</td>
                        <?php else: ?>
                            <td>User</td>
                        <?php endif; ?>
                        <td><a href="/user/delete/<?php echo $user["id"]; ?>">DELETE | 削除</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>