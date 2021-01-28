<?php if (isset($blog)): ?>
    <main>
        <div class="read-container">
            <article>
                <h1>
                    <a href=""><?php echo $blog["title"]; ?></a>
                </h1>
                <p class="author">Written by
                    <a href="#"><?php echo $blog["writer"]; ?></a>
                    <?php echo $blog["created_at"]; ?>
                </p>
                <p class="summary"><?php echo $blog["summary"]; ?></p>
                <p class="content"><?php echo $blog["content"]; ?></p>
                <div class="options">
                    <div>
                        <a href="/blog/edit/<?php echo $blog["id"]; ?>">EDIT</a>
                    </div>
                    <div>
                        <a href="/blog/delete/<?php echo $blog["id"]; ?>">DELETE</a>
                    </div>
                </div>
            </article>
        </div>
    </main>
<?php endif ?>