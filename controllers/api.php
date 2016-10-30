<?php

require 'classes/controller_base.php';
require 'models/model_recipe.php';

Class Controller_Api Extends classes\Controller_Base
{

    public $layouts = "first_layouts";

    function index(){
        echo  'olololo';
        exit;
    }


    function recipes(){
        $select = array(
            'order' => 'id DESC'
        );
        $model = new Model_Recipe($select);

        $recipes = $model->getAllRows();

        echo json_encode($recipes, JSON_UNESCAPED_SLASHES);
    }
}