<?= $this->Form->create($post, array(
    'url' => array('action' => $action),
    'type' => 'file',
    )) ?>
<fieldset>
<?php
        //hidden で渡したい
        echo $this->Form->hidden('postId'); 
        echo $this->Form->hidden('resId');
        //表示させる
        echo $this->Form->input('title');
        echo $this->Form->input('name');
        echo $this->Form->input('content');
        echo $this->Form->input('password');
        echo $this->Form->label('del_flag', '削除NG');
        echo $this->Form->checkbox('del_flag');

    ?>
</fieldset>
<?= $this->Form->button(__('投稿する')) ?>
<?= $this->Form->end() ?>