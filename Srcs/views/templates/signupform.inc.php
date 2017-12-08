<form method="post" action="index.php?action=SignUp" enctype="multipart/form-data" class="modal">
	<div class="modal-header">
		<h3>Inscription</h3>
	</div>
	<div class="form-horizontal modal-body">
<?php	if ($this->message!=="")
			echo '<div class="alert "'.$this->style.'">'.$this->message.'</div>';
?>
        <!-- Nom -->
		<div class="control-group">
			<label class="control-label" for="signUpLName">Nom</label>
			<div class="controls">
				<input type="text" name="signUpLName" placeholder="Nom">
			</div>
		</div>

        <!-- Prénom -->
		<div class="control-group">
			<label class="control-label" for="signUpFName">Prénom</label>
			<div class="controls">
				<input type="text" name="signUpFName" placeholder="Prénom">
			</div>
		</div>

        <!-- Mail -->
		<div class="control-group">
			<label class="control-label" for="signUpMail">Adresse mail</label>
			<div class="controls">
				<input type="text" name="signUpMail" placeholder="Adresse mail">
			</div>
		</div>

        <!-- Pseudo -->
        <div class="control-group">
			<label class="control-label" for="signUpLogin">Pseudo</label>
			<div class="controls">
				<input type="text" name="signUpLogin" placeholder="Pseudo">
			</div>
		</div>

        <!-- Pass1 -->
        <div class="control-group">
			<label class="control-label" for="signUpPassword">Mot de passe</label>
			<div class="controls">
				<input type="password" name="signUpPassword" placeholder="Mot de passe">
			</div>
		</div>

        <!-- Pass2 -->
        <div class="control-group">
			<label class="control-label" for="signUpPassword2">Confirmation</label>
			<div class="controls">
				<input type="password" name="signUpPassword2" placeholder="Confirmation">
			</div>
		</div>

        <!-- Pseudo -->
        <div class="control-group">
            <label class="control-label" for="signUpAvatar">Avatar</label>
            <div class="controls">
                <input type="file" name="signUpAvatar">
            </div>
        </div>

    </div>
	<div class="modal-footer">
		<input class="btn btn-danger" type="submit" value="Créer mon compte" />
	</div>
</form>


