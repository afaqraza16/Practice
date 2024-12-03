<?php

namespace App\Controllers;
use App\Models\ArticleModel;

class ArticleController{
    public function show(){
        // require "src/Model/ArticleModel.php";
        $articleModel = new ArticleModel;
        $articles = $articleModel->runQuery();
        require "View/ArticleView.php";

    }
    public function showall(){
        dump("This is Showing all Articles");
    }
}