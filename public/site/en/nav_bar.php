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
      <a href="index.php"> Site </a>
      </li>

      <li class="nav">
      <a href="index.php?page=tuto"> Tutorials </a>
      </li>

      <li class="nav">
      <a href="index.php?page=procedure"> Procedures </a>
      </li>

      <li class="nav">
      <a href="index.php?page=contact"> Contact us </a>
      </li>

    </div>

    <div id='searchbox'>
      <form id='searchbox' method='get' action='index.php'>
        <input type="search" name='q' size='15' placeholder='To research' style='width:60%;' />
        <input id='search' type='submit' value='Search' />
      </form>

    </div>
        
  </ul>
	   
</div>

<script src='ressources/js/burger.js' async></script>