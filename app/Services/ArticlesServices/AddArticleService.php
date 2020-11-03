<?php


namespace App\Services\ArticlesServices;


class AddArticleService
{
    public function executeService()
    {
        query()
            ->insert('articles')
            ->values([
                'title' => ':title',
                'content' => ':content'
            ])
            ->setParameters([

                'title' => $_POST['title'],
                'content' => $_POST['content']
            ])
            ->execute();
    }
}