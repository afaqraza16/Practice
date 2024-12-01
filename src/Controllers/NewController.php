<?php

namespace App\Controllers;
use App\Models\NewsModel;

class NewController{
    public function show(){
        require "src/Model/NewsModel.php";
        $newsModel = new NewsModel;
        $news = $newsModel->runQuery();
        require "View/NewsView.php";

    }
}