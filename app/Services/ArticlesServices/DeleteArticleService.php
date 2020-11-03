<?php declare(strict_types=1);


namespace App\Services\ArticlesServices;


class DeleteArticleService
{
    public function executeService(int $id): void
    {
        query()
            ->delete('articles')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute();

    }
}