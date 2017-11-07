<div class="container">
    <div class="span7 offset2">
        <ul class="media-list">
            <li class="media well border-secondary-left">
                <div class="control-group">
                    <div class="span2 offset5">
                    <a href="#"><span class="glyphicon glyphicon-trash "></span></a>
                    <a href="#"><span class="glyphicon glyphicon-edit"></span></a>
                    </div>
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
</div>

<div class="container">
<form class="span7 offset2" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <div class="media well">
        <h5 class="media-heading">• Ajouter un commentaire</h5>
        <input type="text" name="commentaire" class="span6"/>
        <input class="btn" type="submit" value="Commenter"/>
        </div>
</form>

</div>
