<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Cracker</title>
    <link rel='stylesheet' href='format.css'>
</head>
<body>
<div class='head'>
    <h1>Code Cracker</h1>
</div>

<div class='main'>
<?php
    class Game
    {
        function __construct(private $round = 0, private $randomcode = 0, private $inputcode = 0){}

        function generate() // generate new hidden code
        {
            $this->randomcode = random_int(0,9);
            for($i=0; $i<3; $i++)
            {
                $this->randomcode .= random_int(0,9);
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

        function check()
        {
            for($i=0; $i<4; $i++)
            {
                $color[$i] = "red";
                for($j=0; $j<4; $j++)
                {
                    if($this->inputcode[$i] == $this->randomcode[$j])
                    {
                        if($this->inputcode[$i] == $this->randomcode[$i])
                        {
                            $color[$i] = "green";
                        }
                        else
                        {
                            if($color[$i] == "green")
                            {
                                $color[$i] = "green";
                            }
                            else
                            {
                                $color[$i] = "blue";
                            }
                        }
                    }
                        else
                    {
                        if($color[$i] == "green")
                        {
                            $color[$i] = "green";
                        }
                        else if($color[$i] == "blue")
                        {
                            $color[$i] = "blue";
                        }
                        else
                        {
                        $color[$i] = "red";
                        }
                    }
                }
            }
            
            echo "<p> 
            <span style='color:" . $color[0] . "'><b>" . $this->inputcode[0] . "</b></span>
            <span style='color:" . $color[1] . "'><b>" . $this->inputcode[1] . "</b></span>
            <span style='color:" . $color[2] . "'><b>" . $this->inputcode[2] . "</b></span>
            <span style='color:" . $color[3] . "'><b>" . $this->inputcode[3] . "</b></span>
            </p>";

            if($this->inputcode == $this->randomcode)
            {
                echo "<h1 style='color: green'>You win!</h1>";
                echo "<p><a href='index.php'>New Game?</a></p>";
                exit;
            }

            if($this->round > 15)
            {
                echo "<h1 style='color: red'>You lose!</h1>";
                echo "<p><a href='index.php'>New Game?</a></p>";
                exit;
            }

        }

    }

    echo "<form action='index.php' method='post'>";
    

    if(isset($_POST['answer1']))
    {
        $game = new Game($_POST['round'], $_POST['randomcode']);
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
        
        echo "<p><b><u>Round: $round / 15</u></b></p>";
    
        for($a=1; $a<5; $a++)
        {
            echo "<select name='answer$a'>";
            for($i=0; $i<10; $i++)
            {
                echo "<option value=$i>$i</option>";
            }
            echo "</select>";
        }

        echo "<input type='submit' value='send'>";

        if(isset($_POST['answer1']))
        {
            $game->check();
        }
    
        echo "</form>";

        echo "<br><br>";
    
?>
</div>
<div class='instruction'>
    <hr>
    <h2>Instruction</h2>
    <p id='green'>Green = Number exists and right position</p>
    <p id='blue'>Blue = Number exists, but wrong position</p>
    <p id='red'>Red = Number not exists</p>
</div>

<div class='foot'>
    <hr>
    <p>Version 1.0<br>Karin Giang</p>
</div>
</body>
</html>