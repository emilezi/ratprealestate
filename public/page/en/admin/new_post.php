<?php

require 'actions/admin/new_post.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <form method='post'>
        <p>Subject title</p>
        <input type='text' name='title' maxlength='50' size='50' placeholder='Enter a title' required>
        <br/><br/>
        <p>Subject</p>
        <textarea id='editeur' name='elements' contentEditable=true></textarea>
        <br/><br/>
        <input type='submit' name='submit' value='To post'>
    </form>

    <?php

echo "</div>";

echo "</div>";