<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Cracker</title>
</head>
<body>
<?php
    class Game
    {
        function __construct(private $round = 0, private $randomcode = 0, private $inputcode = 0){}

        function generate() // generate new hidden code
        {
            $this->randomcode = random_int(1,4);
            for($i=0; $i<3; $i++)
            {
                $this->randomcode .= random_int(1,4);
            }
            return $this->randomcode;
        }

        function round() // return actual round
        {
            $this->round++;
            return $this->round;
        }

        function randomcode() // return randomcode
        {
            return $this->randomcode;
        }

        function inputcode($answer1, $answer2, $answer3, $answer4)
        {
            $this->inputcode = $answer1;
            $this->inputcode .= $answer2;
            $this->inputcode .= $answer3;
            $this->inputcode .= $answer4;
            return $this->inputcode; 
        }

        function exam()
        {
            for($i=0; $i<4; $i++)
            {
                for($j=0; $j<4; $j++)
                {
                    if($this->inputcode[$i] == $this->randomcode[$j])
                    {
                        if($this->inputcode[$i] == $this->randomcode[$i])
                        {
                            echo "Volltreffer 1x<br>";
                        }
                        else
                        {
                            echo "Fasttreffer 1x<br>";
                        }
                    }
                        else
                    {
                        echo "Keine Treffer <br>";
                    }
                }
                echo "<br>";
            }
            
        }
    }

    echo "<form action='index.php' method='post'>";
    

    if(isset($_POST['answer1']))
    {
        $game = new Game($_POST['round'], $_POST['randomcode']);
        //$game = new Game($_POST['round'], 4444);
        $round = $game->round();
        $randomcode = $game->randomcode();
        $inputcode = $game->inputcode($_POST['answer1'], $_POST['answer2'], $_POST['answer3'], $_POST['answer4']);
    }
    else
    {
        $game = new Game();
        $round = $game->round();
        $randomcode = $game->generate();
    }

        echo "<input type='hidden' name='round' value='$round'>";
        echo "<input type='hidden' name='randomcode' value='$randomcode'>";

        echo "<select name='answer1'>";
        echo "<option value=1>1</option>";
        echo "<option value=2>2</option>";
        echo "<option value=3>3</option>";
        echo "<option value=4>4</option>";
        echo "</select>";

        echo "<select name='answer2'>";
        echo "<option value=1>1</option>";
        echo "<option value=2>2</option>";
        echo "<option value=3>3</option>";
        echo "<option value=4>4</option>";
        echo "</select>";

        echo "<select name='answer3'>";
        echo "<option value=1>1</option>";
        echo "<option value=2>2</option>";
        echo "<option value=3>3</option>";
        echo "<option value=4>4</option>";
        echo "</select>";

        echo "<select name='answer4'>";
        echo "<option value=1>1</option>";
        echo "<option value=2>2</option>";
        echo "<option value=3>3</option>";
        echo "<option value=4>4</option>";
        echo "</select>";

        echo "<input type='submit' value='send'>";
        echo "</form>";

        echo "Input: $inputcode<br>";
        echo "Random: $randomcode<br>";
        echo "<br>";
        $game->exam();
    

    





?>
</body>
</html>