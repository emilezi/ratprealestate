<?php

require 'actions/admin/new_tuto.php';

echo "<div id='contents'>";

echo "<div class='elements'>";

    ?>

    <form enctype="multipart/form-data" method="post">
        <h2>Subject title</h2>
        <input type="text" name="title" maxlength="50" size="50" placeholder='Enter a title'>
        <br/><br/>
        <h3>Select a category</h3>
        <select name='category' size='1'>
        <option value='Non categorise'>Unreate
        <option value='Outlook'>Outlook
        <option value='Teams'>Teams
        <option value='Onedrive'>Onedrive
        <option value='Mise à jour'> Update
        <option value='Périphérique'> Peripheral
        <option value='Sécurité informatique'>IT security
        <option value='Tips'>Tips
        </select>
        <br/><br/>
        <h3>Subject</h3>
        <input type='button' value='↩' onclick="editextcommande('undo');"/>
        <input type='button' value='↪' onclick="editextcommande('redo');"/>
        <input type='button' value='hr' onclick="editextcommande('insertHorizontalRule');"/>
        <input type='button' value='B' style="font-weight:bold;" onclick="editextcommande('bold');"/>
        <input type='button' value='I' style="font-style:italic;" onclick="editextcommande('italic');"/>
        <input type='button' value='U' style="text-decoration:underline;" onclick="editextcommande('underline');"/>
        <input type='button' value='S' style="text-decoration:line-through;" onclick="editextcommande('strikeThrough');"/>
        <input type='button' value='Aligner à gauche' onclick="editextcommande('justifyLeft');"/>
        <input type='button' value='Centrer' onclick="editextcommande('justifyCenter');"/>
        <input type='button' value='Aligner à droite' onclick="editextcommande('justifyRight');"/>
        <input type='button' value='h1' onclick="editextcommande('heading', 'h1');"/>
        <input type='button' value='h2' onclick="editextcommande('heading', 'h2');"/>
        <input type='button' value='h3' onclick="editextcommande('heading', 'h3');"/>
        <input type='button' value='p' onclick="editextcommande('heading', 'p');"/>
        <input type='button' value='•' onclick="editextcommande('insertUnorderedList');"/>
        <input type='button' value='x.' onclick="editextcommande('insertOrderedList');"/>
        <input type='button' value='x²' onclick="editextcommande('superscript');"/>
        <input type="button" value="Lien" onclick="editextcommande('createLink');" />
        <br/><br/>
        <div id="editeur_tuto" contentEditable=true>
        <?php
	
        $folder = "uploads/temps/";

        if(is_dir($folder)){

            if($open = opendir($folder))
            {
                while(($file = readdir($open)) !=false)
                {
                    if($file == '.' || $file == '..') continue;
                    if (substr($file, -3) == "gif" || substr($file, -3) == "jpg" || substr($file, -3) == "png" || substr($file, -4) == "jpeg" || substr($file, -3) == "PNG" || substr($file, -3) == "GIF" || substr($file, -3) == "JPG")
                    {
                        echo "<img src='" . $folder.$file."'>";
                    }elseif(substr($file, -3) == "mp4"){
                        echo "<p></p><video width='600' class='video' controls><source src='" . $folder.$file."' type='video/mp4' poster controls></video><p></p>";
                    }
                }
                closedir($open);
            }

        }

        ?>
        </div>
        <br/><br/>
        <input id='elements' type='hidden' name='elements' />
        <input type="submit" name="submit" value="To post" onclick="editutoresult();">
        <a href='index.php?page=admin&action=new_upload'><input type="button" name="import" value="Import an element"></a>
    </form>

    <?php

echo "</div>";

echo "</div>";