<?php
/**
 * Created by PhpStorm.
 * User: Romain
 * Date: 07/11/2017
 * Time: 09:57
 */

class addComments
{
    public function run()
    {
        $commentaire = htmlentities($_POST['commentaire']);
        if ($this->getSessionLogin() === null) {
            $this->setMessageView("Vous devez être authentifié.", "alert-error");
            return;
        } else {
            if (isset($_POST['commentaire'])) {
                $addComments = new Comments($_SESSION['login'], $commentaire);
                $this->database->saveCommentaire($addComments);
            }
            $this->setMessageView("Merci, nous avons ajouté votre sondage");
        }
    }
}