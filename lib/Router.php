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
        } elseif ($this->uri == 'add-category'){
            require_once 'view/category.php';
        } elseif ($this->uri == 'posts'){
            $post = new Post();
            $data = $post->getAllPosts();
            require_once 'view/posts.php';
        } elseif ($this->uri == 'add-post'){
            require_once 'view/add_post.php';
        } elseif (preg_match('[\d+]', $this->uri)){
            $post = new Post();
            $data = $post->getPostById($this->uri);
            require_once 'view/post.php';
        }
    }
}