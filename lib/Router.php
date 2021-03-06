<?php

class Router
{
    private $uri;
    private function getURI()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
    public function run()
    {
        $this->uri = $this->getURI();
        if($this->uri == ''){
            require_once ROOT.'/view/default.php';
        } elseif ($this->uri == 'add-user'){
            $newUser = new User();
            if(!empty($_POST)){
                $user = $newUser->addData($_POST['name'], $_POST['email']);
            }
            require_once 'view/User/user.php';
        } elseif ($this->uri == 'add-category'){
            $newCategory = new Category();
            if(!empty($_POST)){
                $category = $newCategory->addData($_POST['category'], $_POST['email'], $_POST['login']);
            }
            require_once 'view/Category/category.php';
        } elseif ($this->uri == 'posts'){
            $post = new Post();
            $posts = $post::getAll();
            require_once 'view/Post/posts.php';
        } elseif ($this->uri == 'add-post'){
            require_once 'view/Post/add_post.php';
            $newPost = new Post();
            if(!empty($_POST)){
                $post = $newPost->setData($_POST['user_id'], $_POST['content'], $_POST['category_id']);
            }
        } elseif (preg_match('{\d}', $this->uri)){
            $post = new Post();
            $postId = explode('/',$this->uri);
            $post->load($postId[1]);
            require_once 'view/Post/view-post.php';
        }
    }
}