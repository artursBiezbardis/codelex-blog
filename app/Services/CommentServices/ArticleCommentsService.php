<?php


namespace App\Services\CommentServices;


class ArticleCommentsService
{
    public function executeService(int $id)
    {
        return query()
            ->select('*')
            ->from('comments')
            ->where('article_id = :articleId')
            ->setParameter('articleId', $id)
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();


    }
}