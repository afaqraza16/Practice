<?php

namespace App\Controllers;
use App\Models\NewsModel;
use Framework\Viewer;

class NewController{
    public Viewer $viewer;
    public function __construct(Viewer $viewer)
    {
        $this->viewer = $viewer;
    }
    public function show(){
        $newsModel = new NewsModel;
        $news = $newsModel->runQuery();
       print  $this->viewer->render("NewsView" , ['news' => $news]);

    }
}