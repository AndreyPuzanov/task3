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
            require_once ROOT.'/view/form.php';
        } elseif ($this->uri == 'add-user'){
            require_once 'view/user.php';
            $newUser = new User();
            $user = $newUser->create($_POST['name'], $_POST['email']);
        } elseif ($this->uri == 'add-category'){
            $newCategory = new Category();
            $category = $newCategory->create($_POST['category']);
            require_once 'view/category.php';
        } elseif ($this->uri == 'posts'){
            $post = new Post();
            $data = $post->getAllPosts();
            require_once 'view/posts.php';
        } elseif ($this->uri == 'add-post'){
            require_once 'view/add_post.php';
            $newPost = new Post();
            $post = $newPost->create($_POST['user_id'], $_POST['content'], $_POST['category_id']);
        } elseif (preg_match('{\d}', $this->uri)){
            $post = new Post();
            $postId = explode('/',$this->uri);
            $data = $post->getPostById($postId[1]);
            require_once 'view/view-post.php';
        }
    }
}