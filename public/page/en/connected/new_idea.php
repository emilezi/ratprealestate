<?php

require 'actions/idea/new_idea.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <form method="post">
        <p>Idea title</p>
        <input type="text" name="title" maxlength="50" size="50" placeholder="Enter the title of the idea" required>
        <br/><br/>
        <p>Idea contained</p>
        <input type="button" value="B" style="font-weight:bold;" onclick="editextcommande('bold');" />
        <input type="button" value="I" style="font-style:italic;" onclick="editextcommande('italic');" />
        <input type="button" value="U" style="text-decoration:underline;" onclick="editextcommande('underline');" />
        <input type="button" value="Lien" onclick="editextcommande('createLink');" />
        <br/><br/>
        <div id="editeur" contentEditable=true></div>
        <br/><br/><br/>
        <input id="elements" type="hidden" name="elements" />
        <input type="submit" name="submit" value="To post" onclick="editextresult();">
    </form>

    <?php

echo "</div>";

echo "</div>";