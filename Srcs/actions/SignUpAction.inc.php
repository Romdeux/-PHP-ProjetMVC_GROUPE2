<?php

require_once("actions/Action.inc.php");
//require_once("../views/templates/signupform.inc.php");
//equire_once("views/templates/signupform.inc.php");

class SignUpAction extends Action {

    /**
    * Traite les données envoyées par le formulaire d'inscription
    * ($_POST['signUpLogin'], $_POST['signUpPassword'], $_POST['signUpPassword2']).
    *
    * Le compte est crée à l'aide de la méthode 'addUser' de la classe Database.
    *
    * Si la fonction 'addUser' retourne une erreur ou si le mot de passe et sa confirmation
    * sont différents, on envoie l'utilisateur vers la vue 'SignUpForm' contenant
    * le message retourné par 'addUser' ou la chaîne "Le mot de passe et sa confirmation
    * sont différents.";
    *
    * Si l'inscription est validée, le visiteur est envoyé vers la vue 'MessageView' avec
    * un message confirmant son inscription.
    *
    * @see Action::run()
    */
    public function run() {
        $Fname = htmlentities($_POST['signUpFName']);
        $Lname = htmlentities($_POST['signUpLName']);
        $mail = htmlentities($_POST['signUpMail']);
        $nickname = htmlentities($_POST['signUpLogin']);
        $password = htmlentities($_POST['signUpPassword']);
        $confirm = htmlentities($_POST['signUpPassword2']);


        if (strcmp($password, $confirm) !== 0) {
            $this->setMessageView("Le mot de passe et sa confirmation sont différents.");
        } else {
            $addAction = $this->database->addUser($nickname, $password, $Fname, $Lname , $mail);
            if ($addAction === true) {
                $message ="Inscription bien prise en compte";
                $avatar = $this->uploadImage($_POST['signUpLogin']);
                if (substr($avatar,0,7) !== "avatars" ) {
                    $message .= " mais erreur sur l'avatar : ".$avatar;
                    $this->setMessageView($message);
                } else {
                    $this->database->insertAvatar($avatar,$nickname);
                    $this->setMessageView($message);
                }
            } else {
                $this->setSignUpFormView($addAction);
            }
        }

    }

    private function uploadImage($nickname) {

        if ($_FILES['signUpAvatar']['error'] > 0) {
            return "Erreur lors du transfert";
        }

        $accept = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        $extension_upload = strtolower(substr(strrchr($_FILES['signUpAvatar']['name'],'.')  ,1)  );

        if(!(in_array($extension_upload,$accept))) {
            return "Le type de fichier n'est pas valide";
        }

        $resultat = move_uploaded_file($_FILES['signUpAvatar']['tmp_name'],"avatars/avatar-$nickname.$extension_upload");

        if ($resultat) {
            return "avatars/avatar-$nickname.$extension_upload";
        }
        return "Erreur lors du transfert";
    }

    private function setSignUpFormView($message) {
        $this->setView(getViewByName("SignUpForm"));
        $this->getView()->setMessage($message);
    }

}


?>
