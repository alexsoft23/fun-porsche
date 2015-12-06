<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.3/fotorama.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.3/fotorama.js"></script>

<?php
  function excess($files) {
    $result = array();
    for ($i = 0; $i < count($files); $i++) {
      if ($files[$i] != "." && $files[$i] != "..") $result[] = $files[$i];
    }
    return $result;
  }
  $dir = "img";
  $files = scandir($dir);
  $files = excess($files);
?>
<p> </p>
<div class="fotorama" align="center">
    <?php for ($i = 0; $i < count($files); $i++) { ?>
    <img src="<?=$dir."/".$files[$i]?>" alt="" width="800" height="600">
    <?php } ?>
</div>
<p> </p>
