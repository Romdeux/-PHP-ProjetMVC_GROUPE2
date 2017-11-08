<div class="container" style="padding-left: 0px;">
	<?php if (isset($commentaires)) { ?>
		<div class="span7 offset2" style="margin-left: 0px;">
			<ul class="media-list">
				<li class="media well border-secondary-left">
					<div class="control-group">
						<div class="span2 offset5">
						</div>
						<?php
							for($iterator = 0;$iterator < count($commentaires[1]) ; $iterator++ ) {
							?>
							<blockquote class="blockquote">
								<h5><?php if(isset($commentaires[1][$iterator])) echo $commentaires[1][$iterator] ?></h5>
								<footer class="blockquote-footer">
									<cite title="Source Title"><?php if(isset($commentaires[0][$iterator])) echo $commentaires[0][$iterator] ?></cite>
								</footer>
							</blockquote>   
						<?php } ?>
					</div>
				</li>
			</ul>
		</div>
	<?php } ?>
	
<div class="container" style="padding-left: 0px;float: none;">
<form class="span7 offset2" style="margin-left: 0px;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=Comment" >
        <div class="media well">
        <h5 class="media-heading">• Ajouter un commentaire</h5>
        <input type="text" name="commentaire" class="span6"/>
        <input type="hidden" name="Id" class="span6" value="<?php echo $survey->getId(); ?>"/>
        <input class="btn" type="submit" value="Commenter"/>
        </div>
</form>

</div></div>
