<?php

namespace Excomposer\Controllers;

use Excomposer\Models\ModelManager;

/** Class ModelController **/
class ModelController {
    private $manager;


    public function __construct() {
        $this->manager = new ModelManager();
    }

    /** HomePage page d'accueil**/
    public function homepage() {

        require VIEWS . 'PageViews/homepage.php';
    }



}
