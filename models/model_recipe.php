<?php

require 'classes/model_base.php';

Class Model_Recipe Extends classes\Model_Base
{

    public $id;
    public $name;
    public $description;
    public $photo;
    public $like;
    public $repost_count;
    public $is_active;

    public function fieldsTable(){
        return array(

            'id' => 'Id',
            'name' => 'Name',
            'description' => 'Description',
            'photo' => 'Photo',
            'like' => 'Count like',
            'repost_count' => 'Repost count',
        );
    }

    public function getRecipes()
    {
        $query = "SELECT *  FROM recipe ORDER BY id";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }
}