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
        $squares = $position;

        $game = new Game($squares);
        $game->display();
        if ($game -> winner('x')) {
            echo 'You win. Lucky guesses!';
        } else if ($game -> winner('o')) {
            echo 'I win. Muahahahaha';
        } else {
            echo 'No winner yet, but you are losing.';
        }
        ?>
    </body>
    <?php

    class Game {

        var $position;

        function display() {
            echo '<table cols=”3” style=”font­size:large; font­weight:bold”>';
            echo '<tr>'; // open the first row
            for ($pos = 0; $pos < 9; $pos++) {
                echo '<td>-</td>';
                if ($pos % 3 == 2) {
                    echo '</tr><tr>';
                } // start a new row for the next square
            }
            echo '</tr>'; // close the last row
            echo '</table>';
        }

        function __construct($squares) {
            $this->position = str_split($squares);
        }

        function winner($token) {
            for ($row = 0; $row < 3; $row++) {
                $result = true;
                for ($col = 0; $col < 3; $col++) {
                    if ($this->position[3 * $row + $col] == $token) {
                        $result = false;
                    }
                    if ($result == true) {
                        return $result;
                    }
                }
            }
            return $result;
        }
    }
    ?>
</html>