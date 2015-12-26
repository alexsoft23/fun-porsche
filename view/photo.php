<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.3/fotorama.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.3/fotorama.js"></script>

<?php require_once ('./control/img.php'); ?>

<p> </p>
<div class="fotorama" align="center">
    <?php for ($i = 0; $i <= $count_files; $i++) { ?>
    <img src="<?=$dir."/".$files[$i]?>" class="img-thumbnail" alt="PORSCHE" width="800" height="600">
    <?php } ?>
</div>
<p> </p>
