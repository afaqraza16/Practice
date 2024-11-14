<?php
namespace App\Controllers;
use App\Models\AssignModel;
use Framework\Viewer;

class ReflectionMethod
{
    private Viewer $viewer;
    private AssignModel $newModel;
    public function __construct(Viewer $viewer, AssignModel $newModel)
    {
        $this->viewer = $viewer;
        $this->newModel = $newModel;


    }

    public function print()
    {
        print $this->viewer->render("Reflection/ReflectionClass", ["id" => $id]);

    }
}