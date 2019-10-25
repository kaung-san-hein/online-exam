<?php
include('header.php');
extract($_POST);
extract($_SESSION);
include('database.php');
 
    

    $res = mysqli_query($con, "select result.score, test.test_name, test.total_que from result left join test on result.test_id=test.test_id where result.login='$login'");
    echo "<h1 class=head1> Result </h1>";
    if( mysqli_num_rows($res) < 1 )
    {
        echo "<br><br><h1 class=head1> You have not given any quiz</h1>";
        exit();
    }
    echo "<table border=1 align=center><tr class=style2><td width=300>Test Name <td> Total<br> Question <td> Score";
    while($row=mysqli_fetch_row($res))
    {
    echo "<tr class=style8><td>$row[1] <td align=center> $row[2] <td align=center> $row[0]";
    }
    echo "</table>";
?>
</body>
</html>