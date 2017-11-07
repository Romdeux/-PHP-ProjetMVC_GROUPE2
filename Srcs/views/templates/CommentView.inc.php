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

        /*<div class="container">
            <div class="span7 offset2">
            <ul class="media-list">
                <li class="media well border-secondary-left">
                    <div class="control-group">
                        <blockquote class="blockquote">
                    <h5>Commentaire</h5>
                    <footer class="blockquote-footer">
                        <cite title="Source Title"></cite>
                    </footer>
                        </blockquote>
                    </div>
                </li>
            </ul>
            </div>
        </div>*/

    }

}