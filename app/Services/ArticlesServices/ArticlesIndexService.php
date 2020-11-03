<?php


namespace App\Services\ArticlesServices;


class ArticlesIndexService
{
    public function executeService()
    {

        return query()
            ->select('*')
            ->from('articles')
            ->orderBy('created_at', 'desc')
            ->execute()
            ->fetchAllAssociative();
    }

}