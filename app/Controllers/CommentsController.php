<?php

namespace App\Controllers;


use App\Services\CommentServices\StoreCommentsService;

class CommentsController
{
    public function store(array $vars)
    {
        $articleId = (int)$vars['id'];
        (new StoreCommentsService())->executeService($articleId);

        header('Location: /articles/' . $articleId);
    }
}