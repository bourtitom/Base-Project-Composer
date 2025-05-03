<?php
ob_start();

?>
<link rel="stylesheet" href="/css/404.css">


<div class="pyramid-loader">
  <div class="wrapper">
    <span class="side side1"></span>
    <span class="side side2"></span>
    <span class="side side3"></span>
    <span class="side side4"></span>
    <span class="shadow"></span>
  </div>  
</div>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
