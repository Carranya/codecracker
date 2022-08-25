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
        }

        function anzeigen()
        {
            echo $this->randomcode;
        }

    }

    if(isset($_POST{"antwort"}))
    {
        echo "Antwort gesetzt";
        for($i=0; $i<4; $i++)
        {
            $answer[$i] = $_POST['answer[$i]'];
            echo "Antwort:" . $answer[$i] . "<br>";
        }
    }
    else
    {
        $randomcode = new Game(0,0);
        $randomcode->randomcode();
        $randomcode->anzeigen();

        echo "<form action='index.php' method='post'>";
        for($i=0; $i<4; $i++)
        {
            echo "<select name='antwort'>";
            for($j=1; $j<=4; $j++)
            {
                echo "<option value='$j'>$j</option>";
            }
            echo "</select>";
        }
        echo "i=$i, j=$j<br>";
        echo "<input type='submit' value='antwort'></input>";
        echo "</form>";
    }
?>
</body>
</html>