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
        //$game->pick_move();
        $game->display();
        if ($game->winner('x')) {
            echo 'You win.';
        } else if ($game->winner('o')) {
            echo 'I win.';
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
                echo $this->show_cell($pos);
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
                $count =0;
                for ($col = 0; $col < 3; $col++) {
                    if ($this->position[3 * $row + $col] != $token) {
                        $result = false;
                    }
                    else{
                        $count++;
                    }
                    if($count == 3){
                        return true;
                    }
                }
            }
            for ($row = 0; $row < 3; $row++) {
                $result = true;
                $count =0;
                for ($col = 0; $col < 3; $col++) {
                    if ($this->position[$row + 3 * $col] != $token) {
                        $result = false;
                    }
                    else{
                        $count++;
                    }
                    if($count == 3){
                        return true;
                    }
                }
            }
            
            return $result;
        }

        function show_cell($which) {
            $token = $this->position[$which];
            // deal with the easy case
            if ($token <> '-') {
                return '<td>' . $token . '</td>';
            }
            // now the hard case 
            $this->newposition = $this->position; // copy the original
            $this->newposition[$which] = 'x'; // this would be their move
            $move = implode($this->newposition); // make a string from the board array
            $link = '?board=' . $move; // this is what we want the link to be
            // so return a cell containing an anchor and showing a hyphen
            return '<td><a href=' . $link . '>-</a></td>';
        }
        
        function pick_move(){
            for ($check = 0; check < 9; $count++) {
                if ($this->position[$check] == '-') {
                    $this->position[$check] = 'o';
                    $location = $check;
                    return; 
                }
            }
        }
    }
    ?>
</html>