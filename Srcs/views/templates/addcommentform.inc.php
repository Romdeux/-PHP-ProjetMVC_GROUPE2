
<div class="container">
    <div class="span7">
        <ul class="media-list">
            <li class="media well border-secondary-left">
                <div class="control-group">
                        <blockquote class="blockquote">
                            <h5></h5>
                            <footer class="blockquote-footer">
                                <cite title="Source Title"><?php  ?></cite>
                            </footer>
                        </blockquote>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="container">
<!--    <form class="span7" method="post" action="--><?php //$_SERVER['PHP_SELF'].'?action=addComments'?><!--" >-->
    <form class="span7" method="post" action="index.php?action=addComments" >
        <div class="media well">
            <h5 class="media-heading">• Ajouter un commentaire</h5>
            <input type="text" name="commentaire" class="span6"/>
            <input class="btn" type="submit" value="Commenter"/>
        </div>
    </form>

</div>