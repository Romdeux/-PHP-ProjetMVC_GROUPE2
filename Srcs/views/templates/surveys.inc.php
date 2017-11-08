<div class="container">	
<br>
<br>
<br>
<div class="span7 offset2">
	<ul class="media-list">
		<?php
				$iterator = 0;
				foreach ($this->surveys as $survey) {
					$commentaires = $Database->loadComment($survey->getId());
					$survey->computePercentages();
					require("survey.inc.php");
					require("commentForm.inc.php");
				}
		?>
	</ul>
</div>
</div>
