<main>
    <div class="blog-container">
        <div class="row">
            <div class="blog-left">
                <form id="blogs" action="/blog/index" method="POST">
                    <input id="currentPage" name="currentPage" hidden>
                    <ul>
                        <?php if (isset($pageResult)):foreach ($pageResult->getListData() as $blog): ?>
                            <li>
                                <article>
                                    <h1>
                                        <a href="/blog/read/<?php echo $blog["id"]; ?>"><?php echo $blog["title"]; ?></a>
                                    </h1>
                                    <p class="author">Written by
                                        <?php echo $blog["writer"]; ?>&nbsp;<?php echo $blog["created_at"]; ?>
                                    </p>
                                    <p><?php echo $blog["summary"]; ?></p>
                                    <div class="options">
                                        <div>
                                            <a href="/blog/read/<?php echo $blog["id"]; ?>">MORE</a>
                                        </div>
                                        <div>
                                            <a href="/blog/edit/<?php echo $blog["id"]; ?>">EDIT</a>
                                        </div>
                                        <div>
                                            <a href="/blog/delete/<?php echo $blog["id"]; ?>">DELETE</a>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        <?php endforeach ?>
                        <?php endif ?>
                    </ul>

                    <div class="pagination">
                        <ul>
                            <?php if (isset($pageResult)): ?>
                                <li>
                                    <a href="javascript:paging(<?php echo $pageResult->getPrePage(); ?>);"><</a>
                                </li>
                                <?php for ($i = 1; $i <= $pageResult->getTotalPage(); $i++): ?>
                                    <li>
                                        <a href="javascript:paging(<?php echo $i ?>);"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li>
                                    <a href="javascript:paging(<?php echo $pageResult->getNextPage(); ?>);">></a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </form>
            </div>

            <div class="blog-right">
                <div>
                    <h3>Search</h3>
                    <form action="/blog/index" method="POST">
                        <div>
                            <i class="fas fa-search"></i>
                            <input type="text" name="keyword" placeholder="題名を入力して検索" size="31"
                                   value="<?php if (isset($keyword)) echo $keyword; ?>">
                        </div>
                        <div>
                            <button type="submit" class="uk-button uk-button-default">検索</button>
                        </div>
                    </form>
                </div>

                <div>
                    <h3>SNS</h3>
                    <ul>
                        <li><a target="_blank" href="https://weibo.com/login.php">Weibo</a></li>
                        <li><a target="_blank" href="https://wx.qq.com/">Wechat</a></li>
                        <li><a target="_blank" href="https://twitter.com/?lang=zh-cn">Twitter</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>