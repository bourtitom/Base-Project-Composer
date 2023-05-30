<?php
namespace Excomposer\Models;

use Excomposer\Models\ModelName;

/** Class ModelManager **/
class ModelManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }





}
