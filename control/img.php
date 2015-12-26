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
  $count_files = count($files)-1;