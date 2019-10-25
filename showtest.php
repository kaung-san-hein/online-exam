<?php
    include('header.php');
    include('database.php');
    extract($_GET);

    //name of subject
    $res1 = mysqli_query($con, "select * from subject where sub_id='$subid'");
    $row1 = mysqli_fetch_array($res1);
    echo "<h1 align='center'><font color='blue'>$row1[1]</font></h1>";

    //test of subject name
    $res2 = mysqli_query($con, "select * from test where sub_id='$subid'");
    if( mysqli_num_rows($res2) < 1 ){
        echo "<br><br><h2 class='head1'>No Questions for this Subjects</h2>";
        exit();
    }
    echo "<h2 class='head1'>Select Questions Name to Give Questions</h2>";
    echo "<table align='center'>";
    while($row2 = mysqli_fetch_array($res2)){
        echo "<tr><td align='center'><a href='quiz.php?testid=$row2[0]&subid=$subid'><font size='4'>$row2[2]</font></a></td></tr>";
    }
    echo "</table>"
?>
</body>
</html>