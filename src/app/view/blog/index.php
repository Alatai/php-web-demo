<div class="uk-container">
    <div class="uk-margin-medium" uk-grid>
        <div class="uk-width-1-1 uk-width-2-3@s">
            <ul class="uk-list uk-list-divider uk-list-large">
                <?php if (isset($pageResult)):foreach ($pageResult->getListData() as $blog): ?>
                    <li>
                        <article class="uk-article">
                            <h1 class="uk-article-title">
                                <a class="uk-link-reset" href=""><?php echo $blog["title"]; ?></a>
                            </h1>
                            <p class="uk-article-meta">Written by
                                <a href="#"><?php echo $blog["writer"]; ?></a>
                                <?php echo $blog["created_at"]; ?>
                            </p>
                            <p class="uk-text-lead"><?php echo $blog["summary"]; ?></p>
                            <p><?php echo $blog["content"]; ?></p>
                            <div class="uk-grid-small uk-child-width-auto" uk-grid>
                                <div>
                                    <a class="uk-button uk-button-text" href="#">阅读更多</a>
                                </div>
                                <div>
                                    <a class="uk-button uk-button-text" href="#">5 条评论</a>
                                </div>
                            </div>

                        </article>
                    </li>
                <?php endforeach ?>
                <?php endif ?>
            </ul>

            <div class="uk-margin-large">
                <ul class="uk-pagination uk-flex-center" uk-margin>
                    <li><a href="#"><span uk-pagination-previous></span></a></li>
                    <li><a href="#">1</a></li>
                    <li class="uk-disabled"><span>...</span></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li class="uk-active"><span>7</span></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#"><span uk-pagination-next></span></a></li>
                </ul>
            </div>
        </div>
        <div class="uk-width-1-1 uk-width-1-3@s">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                        <!-- <img class="uk-border-circle" width="40" height="40" -->
                            <!-- src="http://getuikit.dev-tang.com/skin/ukv3/-tang.com/skin/ukv3/images/avatar.jpg"> -->
                        </div>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom">XXXX</h3>
                            <p class="uk-text-meta uk-margin-remove-top"></p>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <p></p>
                </div>
                <div class="uk-card-footer">
                    <a href="#" class="uk-button uk-button-text">查看更多该作者的文章 <span class="uk-margin-small-right uk-icon"
                                                                                  uk-icon="chevron-right"></span></a>
                </div>
            </div>
            <div class="uk-card uk-card-body">
                <h3 class="uk-card-title">归档</h3>
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
                <h3 class="uk-card-title">社交平台</h3>
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
