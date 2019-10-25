<?php
    include('header.php');
    include('database.php');
    echo "<h2 class='head1'>Select Subject to Give Questions</h2>";
    $res = mysqli_query($con, "select * from subject");
    echo "<table align='center'>";
    while($row = mysqli_fetch_array($res)){
        echo "<tr><td align='center'><a href='showtest.php?subid=$row[0]'><font size='4'>$row[1]</font></a></td></tr>";
    }
    echo "</table>";
?>
</body>
</html>