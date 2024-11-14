<?php

namespace App\Controllers;

use App\Models\NewModel;
use Framework\Viewer;

class NewController
{
    private Viewer $viewer;
    public function __construct(Viewer $viewer)
    {
        $this->viewer = $viewer;
    }
    public function show()
    {
        $all_news = new NewModel();
        $all_news = $all_news->connect();
        print $this->viewer->render("new_view", ['all_news' => $all_news]);
    }
}

?>