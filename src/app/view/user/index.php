<?php if (isset($users)): ?>
    <main>
        <div class="user-container">
            <div>
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created Time</th>
                        <th>Type</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($i = 0; $i < count($users); $i++): ?>
                        <?php if ($i % 2 == 0): ?>
                            <tr>
                                <td><?php echo $users[$i]["name"]; ?></td>
                                <td><?php echo $users[$i]["email"]; ?></td>
                                <td><?php echo $users[$i]["created_at"]; ?></td>
                                <?php if ($users[$i]["admin"] == 1): ?>
                                    <td>Administrator</td>
                                <?php else: ?>
                                    <td>User</td>
                                <?php endif; ?>
                                <td><a href="/user/delete/<?php echo $users[$i]["id"]; ?>">削除</a></td>
                            </tr>
                        <?php else: ?>
                            <tr class="odd">
                                <td><?php echo $users[$i]["name"]; ?></td>
                                <td><?php echo $users[$i]["email"]; ?></td>
                                <td><?php echo $users[$i]["created_at"]; ?></td>
                                <?php if ($users[$i]["admin"] == 1): ?>
                                    <td>Administrator</td>
                                <?php else: ?>
                                    <td>User</td>
                                <?php endif; ?>
                                <td><a href="/user/delete/<?php echo $users[$i]["id"]; ?>">削除</a></td>
                            </tr>
                        <?php endif; ?>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php endif; ?>