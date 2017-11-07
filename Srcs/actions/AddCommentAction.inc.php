<?php

require_once("actions/Action.inc.php");

class AddCommentAction extends Action
{
    public function run() {

        $newComment = new Database();
        $owner = $_SESSION['login'];
        $comment = $_POST['commentaire'];


        if ($this->getSessionLogin()===null) {
            $this->setMessageView("Vous devez être authentifié.", "alert-error");
            return;
        }
        else {
            $addComment = $newComment->addComments($owner, $comment);
            if ($addComment === true) {
                $this->setMessageView("Commentaire ajouté", "alert-success");
            } else {
                $this->setCommentFormView($addComment);
                $this->setMessageView("Commentaire error", "alert-error");
            }
        }
        

    }

    private function setCommentFormView($message) {
        $this->setView(getViewByName("addcommentform"));
        $this->getView()->setMessage($message);
    }

}