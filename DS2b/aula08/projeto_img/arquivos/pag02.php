<?php

$files=glob("arquivos/*.*");
    for($i=0; $i<count($files);$i++){
        $num=$files[$i];
        echo'<img alt="random image" width="200" scr="'.$num.'"/>';
    }
?>