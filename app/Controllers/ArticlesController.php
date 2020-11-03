<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Services\ArticlesServices\ArticlesIndexService;
use App\Services\ArticlesServices\ArticleService;
use App\Services\ArticlesServices\DeleteArticleService;
use App\Services\CommentServices\ArticleCommentsService;

class ArticlesController
{
    private array $articles;

    public function index()
    {
        $articlesQuery = new ArticlesIndexService();
        $articles = [];
        foreach ($articlesQuery->executeService() as $article) {
            $articles[] = new Article(
                (int)$article['id'],
                $article['title'],
                $article['content'],
                $article['created_at']
            );
        }
        return require_once __DIR__ . '/../Views/ArticlesIndexView.php';
    }

    public function show(array $vars)
    {

        $commentsQuery = new ArticleCommentsService();
        $comments = [];

        foreach ($commentsQuery->executeService((int)$vars['id']) as $comment) {
            $comments[] = new Comment(
                $comment['id'],
                $comment['article_id'],
                $comment['name'],
                $comment['content'],
                $comment['created_at'],
            );
        }
        $articleClass = new ArticleService();
        $articleQuery = $articleClass->executeService($vars['id']);
        $article = new Article(
            (int)$articleQuery['id'],
            $articleQuery['title'],
            $articleQuery['content'],
            $articleQuery['created_at'],
        );

        return require_once __DIR__ . '/../Views/ArticlesShowView.php';
    }

    public function delete(array $vars): void
    {
        (new DeleteArticleService())->executeService($vars['id']);

        header('Location: /');
    }

}