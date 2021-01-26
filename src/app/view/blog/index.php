<div class="uk-container">
    <div class="uk-margin-medium" uk-grid>
        <div class="uk-width-1-1 uk-width-2-3@s">
            <form action="/blog/index" method="POST">
                <input id="currentPage" name="currentPage" hidden>
                <ul class="uk-list uk-list-divider uk-list-large">
                    <?php if (isset($pageResult)):foreach ($pageResult->getListData() as $blog): ?>
                        <li>
                            <article class="uk-article">
                                <h1 class="uk-article-title">
                                    <a class="uk-link-reset" href="/blog/read?id=<?php echo $blog["id"]; ?>"><?php echo $blog["title"]; ?></a>
                                </h1>
                                <p class="uk-article-meta">Written by
                                    <?php echo $blog["writer"]; ?>&nbsp;<?php echo $blog["created_at"]; ?>
                                </p>
                                <p class="uk-text-lead"><?php echo $blog["summary"]; ?></p>
                                <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                    <div>
                                        <a class="uk-button uk-button-text"
                                           href="/blog/read?id=<?php echo $blog["id"]; ?>">MORE</a>
                                    </div>
                                    <div>
                                        <a class="uk-button uk-button-text"
                                           href="/blog/edit?id=<?php echo $blog["id"]; ?>">EDIT</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                    <?php endforeach ?>
                    <?php endif ?>
                </ul>

                <div class="uk-margin-large">
                    <ul class="uk-pagination uk-flex-center" uk-margin>
                        <?php if (isset($pageResult)): ?>
                            <li>
                                <a href="javascript:paging(<?php echo $pageResult->getPrePage(); ?>);">
                                    <span uk-pagination-previous></span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $pageResult->getTotalPage(); $i++): ?>
                                <li>
                                    <a href="javascript:paging(<?php echo $i ?>);"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <li>
                                <a href="javascript:paging(<?php echo $pageResult->getNextPage(); ?>);">
                                    <span uk-pagination-next></span>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
            </form>
        </div>

        <div class="uk-width-1-1 uk-width-1-3@s">
            <div class="uk-card uk-card-body">
                <h4>Blog Search</h4>
                <div class="uk-inline">
                    <label class="uk-form-label" for="keyword"></label>
                    <input class="uk-input" type="text" id="keyword" name="keyword" placeholder="検索" size="31">
                </div>
                <br>
                <br>
                <button type="submit" class="uk-button uk-button-default">検索</button>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title">Time line</h3>
                <ul class="uk-list uk-list-divider">
                    <li><a href="">2019年12月</a></li>
                    <li><a href="">2019年11月</a></li>
                    <li><a href="">2019年10月</a></li>
                    <li><a href="">2019年9月</a></li>
                    <li><a href="">2019年8月</a></li>
                    <li><a href="">2019年7月</a></li>
                    <li><a href="">2019年6月</a></li>
                </ul>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title">SNS</h3>
                <ul class="uk-list">
                    <li><a href="">微博</a></li>
                    <li><a href="">微信</a></li>
                    <li><a href="">推特</a></li>
                    <li><a href="">facebook</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
