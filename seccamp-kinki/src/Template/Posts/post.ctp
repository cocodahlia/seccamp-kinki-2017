<h1><?= __('新規記事作成') ?></h1><hr>
<div class="posts">
    <?php $post->postId = -1; ?>
    <?= $this->element('form', ['post' => $post, 'action' => 'post']) ?>
</div>