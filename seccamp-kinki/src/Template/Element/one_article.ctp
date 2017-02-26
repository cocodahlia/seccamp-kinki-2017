<?php if ($post->resId === 0):?>
    <div class="panel panel-default">
<?php else: ?>
    <div class="panel panel-default">
<?php endif; ?>
    <div class="panel-heading">
        <h3 class="panel-title">
        <a href="<?php echo $this->Url->build(['controller' => 'Posts', 'action' => 'detail', $post->postId])?>">
            <?= $post->title ?>
        </a>
        </h3>
        <div>
            投稿者名: <?= h($post->name) ?>
            <br>
            投稿日時: <?= h($post->created) ?> 
        </div>
    </div>
    <div class='panel-boby'>
        <div style="padding:10px">
            <?= $post->content ?>
        </div>
        <div>
            
        <font size="2"><b>
            <?php if($this->request->action === "index"):?>
                <a href="<?php echo $this->Url->build([
                    'controller' => 'Posts', 'action' => 'detail', $post->postId])?>">
                    スレッドを表示
                </a>
            <?php endif; ?>
            <?php if($post->del_flag == 0): ?>
                <?=$this->Form->create('Post', ['url' => ['action' => 'delete', $post->id, 'type' => 'post']])?>
                <?=$this->Form->input('password', ['label' => '削除パスワード']);?>
                <?=$this->Form->submit('削除')?>
                <?=$this->Form->end()?>
            <?php endif; ?>
    
        </b></font>
        </div>
    </div>
</div>