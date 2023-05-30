<?php
ob_start();
?>

<section class="homepage">
  <div id="contenthomepage">
      <h1>How  to Composer</h1>
      <p>Bienvenue sur le site d'exemple pour composer.</p>
  </div>
    
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
