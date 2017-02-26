<div class="posts">
    
    <h1><?= __('投稿一覧') ?></h1><br>

<?php foreach ($posts as $post): ?>
    <?= $this->element('one_article', ['post' => $post]) ?>
<?php endforeach; ?>
    <?= h($this->Paginator->numbers(array('first' => 'First page'))); ?>
    <div class="large-3 medium-4">
    <?php
        echo $this->Html->link('追加',array('controller' => 'Posts', 'action' => 'post'));
    ?>
    </div>
    <div class="large-3 medium-4">
    <?php
        echo $this->Html->link('検索',array('controller' => 'Posts', 'action' => 'find'));
    ?>
    </div>
</div>