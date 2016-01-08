<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $position = $_GET['board'];
        $squares = str_split($position);
        if (isset($GET['board'])){
            echo 'Please set a board';
        }
        else if (winner('x', $squares)) {
            echo 'You win.';
        } else if (winner('o', $squares)) {
            echo 'I win.';
        } else {
            echo 'No winner yet.';
        }
        ?>
    </body>
    <?php

    function winner($token, $position) {
        $won = True;
        for($row=0; $row<3; $row++) {
   $result = true;
   for ($col = 0; $col < 3; $col++) {
       if ($position[3 * $row + $col] != $token) {
                $result = false;
            }
        }
    }
    return $won;
    }
    ?>
</html>