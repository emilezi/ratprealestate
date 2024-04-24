<div id='nav'>

  <div class='button-nav' onclick='display()'>
  <div class='burger'>
  <span></span>
  </div>
  </div>

  <div class='button-nav-active' onclick='indisplay()'>
  <div class='burger opened'>
  <span></span>
  </div>
  </div>
    
  <ul class="topnav">

    <div id='navbox'>

      <li class="nav">
      <a href="index.php"> Accueil </a>
      </li>

      <li class="nav">
      <a href="index.php?page=tuto"> Tutoriels </a>
      </li>

      <li class="nav">
      <a href="index.php?page=procedure"> Procédures </a>
      </li>

      <li class="nav">
      <a href="index.php?page=contact"> Nous contacter </a>
      </li>

    </div>

    <div id='searchbox'>
      <form id='searchbox' method='get' action='index.php'>
        <input type="search" name='q' size='15' placeholder='Rechercher' style='width:60%;' />
        <input id='search' type='submit' value='Search' />
      </form>

    </div>
        
  </ul>
	   
</div>

<script src='ressources/js/burger.js' async></script>