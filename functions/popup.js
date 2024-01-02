function PopUpRadio() {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><p>Êtes-vous vraiment sûr de vouloir effectuer l'action demandée ?</p><div class='pop-up-element-form'><form method='post'><input type='submit' name='submit_popup' value='Oui'></form><input type='submit' onclick=PopUpClose() value='Non'></div></div></div>";

}

function PopUpNew(value) {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><p>Êtes-vous vraiment sûr de vouloir effectuer l'action demandée ?</p><div class='pop-up-element-form'><form method='post'><input type='submit' name='submit_popup_" + value + "' value='Oui'></form><input type='submit' onclick=PopUpClose() value='Non'></div></div></div>";

}

function PopUpApprove(value) {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Approbation de l'idée : </h5><form method='post'><input name='post_comment' type='text' placeholder='Saisissez un commentaire' required/><br/><br/><div class='btn-content-popup'><input type='submit' name='submit_approuve_" + value + "' value='Approuver l&rsquo;idée'/><input type='submit' onclick=PopUpClose() value='Annuler'></div></form></div></div>";

}

function PopUpRefuse(value) {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Suppression de l'idée : </h5><form method='post'><input name='post_comment' type='text' placeholder='Saisissez un commentaire' required/><br/><br/><div class='btn-content-popup'><input type='submit' name='submit_refuse_" + value + "' value='Supprimer l&rsquo;idée'/><input type='submit' onclick=PopUpClose() value='Annuler'></div></form></div></div>";

}

function PopUpDelete(value) {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><p>Êtes-vous vraiment sûr de vouloir effectuer l'action demandée ?</p><div class='pop-up-element-form'><form method='post'><input type='submit' name='submit_delete_" + value + "' value='Oui'></form><input type='submit' onclick=PopUpClose() value='Non'></div></div></div>";

}

function PopUpVoteFor(value) {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><p>Êtes-vous vraiment sûr de vouloir effectuer l'action demandée ?</p><div class='pop-up-element-form'><form method='post'><input type='submit' name='submit_popup_for_" + value + "' value='Oui'></form><input type='submit' onclick=PopUpClose() value='Non'></div></div></div>";

}

function PopUpVoteAgainst(value) {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><p>Êtes-vous vraiment sûr de vouloir effectuer l'action demandée ?</p><div class='pop-up-element-form'><form method='post'><input type='submit' name='submit_popup_against_" + value + "' value='Oui'></form><input type='submit' onclick=PopUpClose() value='Non'></div></div></div>";

}

function PopUpPictureUpload() {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Importer une image</h5><form enctype='multipart/form-data' method='post'><input type='file' name='picture'/><input type='submit' name='submit_picture' value='Importer'/><br><br><input type='submit' onclick=PopUpClose() value='Annuler'></form></div></div>";

}

function PopUpVideoUpload() {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "<div class='pop-up-container-form animation-pop-up-form'><div class='pop-up-form'><h5>Importer une vidéo</h5><form enctype='multipart/form-data' method='post'><input type='file' name='video'/><input type='submit' name='submit_video' value='Importer'/><br><br><input type='submit' onclick=PopUpClose() value='Annuler'></form></div></div>";

}

function PopUpClose() {

    var elem = document.getElementById('popup_form_container');

    elem.innerHTML = "";

}