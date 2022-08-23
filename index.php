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
        function __construct(private $code = array(0, 0, 0, 0))
        {
        for($i=0; $i<4; $i++)
        {
            $this->code[$i] .= random_int(1,4);
        }
        return $this->code;
        }
    }

    if(isset($_POST{"answer[1]"}))
    {

    }
    else
    {
        $code = new Game();
        print_r($code);
        echo $code[0] . ", " . $code[1] . ", " . $code[2] . ", " . $code[3] . "<br>";
        for($i=0; $i<4; $i++)
        {
            echo "<select name='answer[$i]>";
            for($j=0; $j<=4; $j++)
            {
                echo "<option value='$j'>$j</option>";
            }
            echo "</select>";
        }
    }
?>
</body>
</html>