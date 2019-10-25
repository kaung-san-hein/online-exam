<?php
  include('header.php');
extract($_POST);
extract($_SESSION);
include('database.php');
if( isset($finish) ){
    unset($_SESSION['ques']);
    mysqli_query($con, "delete from useranswer where sess_id='" . session_id() ."'") or die(mysqli_error($con));
    header("location: index.php");
    exit();
}
    
    echo "<h1 class='head1'>Review Test Question</h1>";

    if( !isset($_SESSION['ques']) ){
        $_SESSION['ques'] = 0;
    }
    else if( isset($next) ){
        $_SESSION['ques'] += 1;
    }

    $res = mysqli_query($con, "select * from useranswer where sess_id = '" . session_id() . "'") or die(mysqli_error($con));
    mysqli_data_seek($res, $_SESSION['ques']);
    $row = mysqli_fetch_array($res);
    echo "<form name='myfm' method='post' action=''>";
    echo "<table width='100%'> <tr> <td width='30'>&nbsp; <td> <table border='0'>";
    $n = $_SESSION['ques'] + 1;
    echo "<tr><td><span class='style2'>Question No " . $n . ": $row[3]</span>";
    echo "<tr><td class=" . ($row[8] == 1? 'tans':'style8') . ">$row[4]";
    echo "<tr><td class=" . ($row[8] == 2? 'tans':'style8') . ">$row[5]";
    echo "<tr><td class=" . ($row[8] == 3? 'tans':'style8') . ">$row[6]";
    echo "<tr><td class=" . ($row[8] == 4? 'tans':'style8') . ">$row[7]";
    if( $_SESSION['ques'] < mysqli_num_rows($res)-1 ){
        echo "<tr><td><input type='submit' name='next' value='Next Question'></form>";
    }
    else{
        echo "<tr><td><input type='submit' name='finish' value='Finish'></form>";
    }
    echo "</table></table>";
?>
</body>
</html>