<?php


namespace App\Services\ArticlesServices;


class ArticleService
{
    public function executeService(int $id)
    {
        return Query()
            ->select('*')
            ->from('articles')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()
            ->fetchAssociative();
    }
}