<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{

    public function run()
    {
        $article = new Article();
        $article->title = "My Blog's Very First Article!";
        $article->author = 1;
        $article->view = "articles.static.1.article";
        $article->publish_at = null;
        $article->save();
    }

}