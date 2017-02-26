<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class PostsController extends AppController{
    public function index(){
        $query = $this->Posts->find()->where(['resId =' => 0]);
        $posts = $this->paginate($query);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }
    
    public function post(){
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);

            if ($post->postId == -1) {
                $post->postId = $this->Posts->find()
                    ->order(['postId' => 'desc'])
                    ->select(['postId'])
                    ->first()['postId'] + 1;
                $post->resId = 0;
            }

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Posted'));
                if ($post->resId ===0) {
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['controller' => 'Posts', 'action' => 'detail', $post->postId]);
                }
            } else {
                $this->Flash->error(__('Try Again.'));
            }
        }
        $this->set(compact('post'));
        $this->set('_serialize', ['post']);
    }
    
    public function detail($postId = null){
        $new_post = $this->Posts->newEntity();
        $posts = $this->Posts->find()
            ->where(['postId =' => $postId])
            ->order(['resId' => 'asc']);

        $this->set(compact('posts', 'new_post'));
        $this->set('_serialize', ['post']);
    }

    public function delete($id = null){
        
        $query = 'SELECT * FROM `posts` WHERE `id` =' . $id. ';';
        $post = $this->_connect()->query($query)->fetchAll('assoc');
        // $this->log($post, LOG_DEBUG);
        
        $this->request->allowMethod(['post', 'delete']);
        $del_post = $this->Posts->get($id);
        var_dump($post[0]['password']);

        if($post[0]['password'] == $this->request->data('password')){
            if($del_post->resId === 0) {
                if ($this->Posts->deleteAll(array('postId' => $del_post->postId))) {
                    $this->Flash->success(__('Deleted.'));
                } else {
                    $this->Flash->error(__('Failed. Try again.'));
                }
                return $this->redirect(['action' => 'index']);
            } else if ($this->Posts->delete($del_post)) {
                $this->Flash->success(__('Deleted.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Failed'));
                return $this->redirect($this->Posts);
            } 
        }else{
            $this->Flash->error(__('Password Incorrect'));
            $this->redirect(['action' => 'index']);
        }
    }
    public function find() {
        $posts = [];
        $find = '';
        
        if($this->request->is('post')) {
            $find = $this->request->data['word'];
            
            $query = 'SELECT * FROM `posts` WHERE `title` like "%' . $find . '%" OR content like "%'. $find .'%";';
            $posts = $this->_connect()->query($query)->fetchAll('assoc');
           
        }

        $this->set('find_posts', $posts);
        $this->set('find', $find);
    }
    
    // SQLinjection 用
    // connection を作る必要があるため、一応Functionにしておいた。
    // query を実行する場合は $qu
    // 「$posts = $this->_connect()->query($query)->fetchAll('assoc');」と呼べばOK
    private function _connect(){
        $conn = ConnectionManager::get('default');
        return $conn;
    }
}