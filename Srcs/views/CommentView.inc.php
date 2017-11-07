<?php
/**
 * Created by PhpStorm.
 * User: Romain
 * Date: 06/11/2017
 * Time: 15:58
 */
require_once("views/View.inc.php");

class CommentView extends View
{
    protected function displayBody() {
        require("templates/commentform.inc.php");
    }

    public function run()
    {


    }

}