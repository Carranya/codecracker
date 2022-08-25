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
        function __construct(private $round = 0, private $randomcode){}

        function randomcode()
        {
            $this->randomcode = random_int(1,4);
            for($i=0; $i<3; $i++)
            {
                $this->randomcode .= random_int(1,4);
            }
            return $this->randomcode;
        }

        function anzeigen()
        {
            echo $this->randomcode;
        }


    }

    if(isset($_POST{"answer"}))
    {
        echo "Antwort gesetzt<br>";
        $answer =  $_POST['answer'];
        echo $answer;
        echo "<br>";
        echo "Randomcode<br>";
        $randomcode = new Game(0, $_POST['randomcode']);
        $randomcode->anzeigen();
    }
    else
    {
        $randomcode = new Game(0,0);
        $randomcode->randomcode();
        $randomcode->anzeigen();
        $senden = $randomcode->randomcode();
        echo "<form action='index.php' method='post'>";
        echo "<input name='answer'>";
        echo "<input type='hidden' name='randomcode' value='$senden'>";
        echo "<input type='submit' value='antwort'>";
        echo "</form>";
    }
?>
</body>
</html>