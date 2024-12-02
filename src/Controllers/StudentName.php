<?php

namespace App\Controllers;

use Framework\Viewer;

class StudentName{
    public Viewer $viewer;
    public function __construct(Viewer $viewer)
    {
        $this->viewer = $viewer;
    }
 public function displayName($id){
  print  $this->viewer->render("StudentName/name",["id"=>$id]);
 }   
}