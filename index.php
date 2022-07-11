<?php

function acmTeam($topic) {
    $scores = [];
    $highest = 0;
    
    for($i=0; $i < count($topic); $i++){
        for($j=$i+1; $j < count($topic); $j++){
            $team_a = str_split($topic[$i]);
            $team_b = str_split($topic[$j]);

            $combined_score = 0;

            for($k=0; $k < count($team_a); $k++){
                if($team_a[$k] == 1 || $team_b[$k] == 1){
                    $combined_score++;
                }
            }

            if($combined_score > $highest){
                $highest = $combined_score;
            }

            $scores[] = $combined_score;
        }    
    }

    $cnt = count(array_filter($scores,function($a) use ($highest) {return $a == $highest;}));
    return [$highest, $cnt];
}

print_r(acmTeam(["10101", "11100", "11010", "00101"]));