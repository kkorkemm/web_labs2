<?php

    if (is_file('log/'.PATH_LOG.'.txt')) {
        $file = file('log/'.PATH_LOG.'.txt'); 
        
        echo "<ol>";
        foreach($file as $row) {
            echo "<li>";
            
            list($date, $ref, $page) = explode("|", $row);
            echo "<b>$date</b> \t $ref --> $page";

            echo "</li>";
        }
        echo "</ol>";
    }