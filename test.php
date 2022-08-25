<?php

echo "<form action='test2.php' method='post'>";
for($i=0; $i<4; $i++)
{
    echo "<select name='antwort[$i]'>";
    for($j=1; $j<=4; $j++)
    {
        echo "<option value='$j'>$j</option>";
    }
    echo "</select>";
}
echo "<input type='submit'></input>";
echo "</form>";

?>
