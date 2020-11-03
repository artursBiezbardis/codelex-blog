<?php


namespace App\Services\CommentServices;


class StoreCommentsService
{
    public function executeService($id)
    {
        query()
            ->insert('comments')
            ->values([
                'article_id' => ':articleId',
                'name' => ':name',
                'content' => ':content'
            ])
            ->setParameters([
                'articleId' => $id,
                'name' => $_POST['name'],
                'content' => $_POST['content'],
            ])
            ->execute();
    }
}