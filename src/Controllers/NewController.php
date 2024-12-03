<?php

namespace App\Controllers;
use App\Models\NewsModel;
use Framework\Viewer;

class NewController{
    public Viewer $viewer;
    private NewsModel $newsModel;
    public function __construct(Viewer $viewer,NewsModel $newsModel)
    {
        $this->viewer = $viewer;
        $this->newsModel = $newsModel;
    }
    public function show(){
        $news = $this->newsModel->runQuery();
       print  $this->viewer->render("NewsView" , ['news' => $news]);

    }
}