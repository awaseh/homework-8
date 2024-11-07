<?php

namespace app\models;

class Post {
    public function getAllPostsByTitle($params) {
        $allPosts = [
            [
                'id' => '1',
                'title' => 'First Post',
                'content' => 'This is my first post'
            ],
            [
                'id' => '2',
                'title' => 'Second Post',
                'content' => 'This is my second post'
            ],
        ];

        if (!empty($params['title'])) {
            return array_filter($allPosts, function ($post) use ($params) {
                if ($post['title'] === $params['title']) {
                    return $post;
                };
                return null;
            });
        }

        return $allPosts;
    }

    public function savePosts() {
    }
}