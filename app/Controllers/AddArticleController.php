<?php


namespace App\Controllers;


use App\Services\ArticlesServices\AddArticleService;

class AddArticleController
{
    public function showAddArticleForm()
    {
        return require_once __DIR__ . '/../Views/AddArticleView.php';
    }

    public function add(): void
    {
        (new AddArticleService())->executeService();

        header('Location: /');
    }

}