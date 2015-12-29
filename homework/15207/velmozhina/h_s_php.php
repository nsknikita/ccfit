<?php
        $TRY = 7;
        $RAND = rand(0, 100);
        echo "Try to guess number between 0 and 100\n";
        while ($TRY > 0)
        {
                echo "You have $TRY attempts\n";
                $TRY--;
                fscanf(STDIN, "%d", $at);
                if ($at == $RAND)
                {
                        echo "YOU WON!\n";
                        exit;
                }
                else
                        if ($at < $RAND)
                                echo "You entered too small number.\n";
                        else
                                if ($at > $RAND)
                                        echo "You entered too big number.\n";
        }
        echo "You lose.\n";
?>

