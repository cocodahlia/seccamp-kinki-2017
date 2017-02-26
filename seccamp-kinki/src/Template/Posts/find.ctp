<div class="posts index large-9 medium-8 columns content">
    <h1>記事検索</h1>

    <p>
    <?= $this->element('search', ['find' => $find]); ?>

    <?= $this->Form->create(null, array(
        'url' => array('action' => 'find'),
        )) ?>
    <div class="input-group">
    <input type="text" class="form-control" name="word" placeholder="キーワード">
    <span class="input-group-btn">
        <button class="btn btn-default" type="submit">
            検索する
        </button>
    </span>
    </div>
    <hr>
    <?php if (isset($find_posts)): ?>
    <?php foreach ($find_posts as $find_post): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="<?php echo $this->Url->build(['controller' => 'Posts', 'action' => 'detail', $find_post['postId']])?>">
                        <?= $find_post['title'] ?>
                    </a>
                </h3>
                <div>
                    投稿者名: <?= h($find_post['name']) ?>
                    <br>
                    投稿日時: <?= h($find_post['created']) ?> 
                </div>
            </div>
            <div class='panel-boby'>
                <div style="padding:10px">
                    <?= $find_post['content'] ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

    <?= $this->element('search', ['find' => $find]); ?>

</div>