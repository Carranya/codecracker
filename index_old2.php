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
        function __construct(private $round = 0, private $randomcode = array()){}

        function randomcode()
        {
            for($i=0; $i<4; $i++)
            {
                $this->randomcode[$i] = random_int(1,4);
            }
            // return $this->randomcode;
        }

        function anzeigen()
        {
            echo $this->randomcode[0];
            echo $this->randomcode[1];
            echo $this->randomcode[2];
            echo $this->randomcode[3];
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
        $randomcode = new Game();
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