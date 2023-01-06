<?php
    function losu(int $n){
        $tab = array();
        for($i=0;$i<$n;$i++){
            $tab[$i] = rand(1,100);
        } 
        sort($tab);
        return $tab;
    }
?>