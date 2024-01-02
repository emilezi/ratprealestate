<?php

require 'actions/admin/new_post.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <form method='post'>
        <p>Titre du sujet</p>
        <input type='text' name='title' maxlength='50' size='50' placeholder='Saisissez un titre' required>
        <br/><br/>
        <p>Sujet</p>
        <textarea id='editeur' name='elements' contentEditable=true></textarea>
        <br/><br/>
        <input type='submit' name='submit' value='Poster'>
    </form>

    <?php

echo "</div>";

echo "</div>";