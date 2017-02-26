<div class="posts">
<h2>
    スレッド詳細
</h2>

<?php foreach ($posts as $post): ?>
<?= $this->element('one_article', ['post' => $post]) ?>
<?php endforeach; ?>

<h3>返信する</h3>
    <?php $new_post->postId = $post->postId; ?>
    <?php $new_post->resId = $post->resId + 1; ?>
    <?php $new_post->title = "Re:".$post->title; ?>
    <?= $this->element('form', ['post' => $new_post, 'action' => 'post']) ?>
</div>