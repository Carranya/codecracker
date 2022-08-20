<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Cracker</title>

    <style>
        body
        {
            text-align: center;
        }
    </style>
</head>
<body>
    
<div>

<?php
    echo "<form action='index.php' method='post'>";

    echo "<select name='code1'>";
        echo "<option value=1>1</option>";
        echo "<option value=2>2</option>";
        echo "<option value=3>3</option>";
        echo "<option value=4>4</option>";
    echo "</select>";
    echo "|";

    echo "<select name='code2'>";
        echo "<option value=1>1</option>";
        echo "<option value=2>2</option>";
        echo "<option value=3>3</option>";
        echo "<option value=4>4</option>";
    echo "</select>";    
    echo "|";

    echo "<select name='code3'>";
        echo "<option value=1>1</option>";
        echo "<option value=2>2</option>";
        echo "<option value=3>3</option>";
        echo "<option value=4>4</option>";
    echo "</select>";
    echo "|";

    echo "<select name='code4'>";
        echo "<option value=1>1</option>";
        echo "<option value=2>2</option>";
        echo "<option value=3>3</option>";
        echo "<option value=4>4</option>";
    echo "</select>";    
    echo "|";

    echo "<input type='submit' value='send'>";
    echo "</form>";

    if(isset($_POST['code1']))
    {
        $code1 = $_POST['code1'];
        $code2 = $_POST['code2'];
        $code3 = $_POST['code3'];
        $code4 = $_POST['code4'];

        echo "<p>$code1 | $code2 | $code3 | $code4</p>";
    }


    
?>
</div>

</body>
</html>