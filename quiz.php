<?php
    include('header.php');
    include('database.php');
    extract($_POST);
    extract($_GET);
    extract($_SESSION);

    if( isset($subid) && isset($testid) ){
        $_SESSION['sid'] = $subid;
        $_SESSION['tid'] = $testid;
        header('location: quiz.php');
    }
    if( !isset($_SESSION['sid']) || !isset($_SESSION['tid']) ){
        header('location: index.php');
    }

    $res = mysqli_query($con, "select * from question where test_id='$_SESSION[tid]'");
    if( !isset($_SESSION['ques']) ){
        $_SESSION['ques'] = 0;
        mysqli_query($con, "delete from useranswer where sess_id='" . session_id() ."'") or die(mysqli_error($con));
        $_SESSION['trueans'] = 0;
    }
    else{
        if( isset($next) && isset($ans) ){
            mysqli_data_seek($res, $_SESSION['ques']);
            $row = mysqli_fetch_array($res);
            mysqli_query($con, "INSERT INTO `useranswer`(`sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES ('".session_id()."', $tid ,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error($con));
            if( $ans == $row[7] ){
                $_SESSION['trueans'] += 1;
            }
            $_SESSION['ques'] += 1;
        }
        else if( isset($get) && isset($ans) ){
            mysqli_data_seek($res, $_SESSION['ques']);
            $row = mysqli_fetch_array($res);
            mysqli_query($con, "INSERT INTO `useranswer`(`sess_id`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES ('".session_id()."', $tid ,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error($con));
            if( $ans == $row[7] ){
                $_SESSION['trueans'] += 1;
            }

            echo "<h1 class=head1> Result</h1>";
			$_SESSION['ques'] += 1;
			echo "<table align=center><tr class=tot><td>Total Question<td>" . $_SESSION['ques'];
            echo "<tr class=tans><td>True Answer<td>" . $_SESSION['trueans'];

            //wrong ans
			$w = $_SESSION['ques'] - $_SESSION['trueans'];
			echo "<tr class=fans><td>Wrong Answer<td> ". $w;
			echo "</table>";
			mysqli_query($con, "insert into result(login,test_id,test_date,score) values ('$login',$tid, now() ,$_SESSION[trueans])") or die(mysql_error());
			echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
			unset($_SESSION['ques']);
			unset($_SESSION['sid']);
			unset($_SESSION['tid']);
			unset($_SESSION['trueans']);
			exit;
        }
    }
    mysqli_data_seek($res, $_SESSION['ques']);
    $row = mysqli_fetch_array($res);
    echo "<form name='myfm' method='post' action=''>";
    echo "<table width='100%'> <tr> <td width='30'>&nbsp; <td> <table border='0'>";
    $n = $_SESSION['ques'] + 1;
    echo "<tr><td><span class='style2'>Question No " . $n . ": $row[2]</span>";
    echo "<tr><td class='style8'><input type='radio' name='ans' value='1'>$row[3]";
    echo "<tr><td class='style8'><input type='radio' name='ans' value='2'>$row[4]";
    echo "<tr><td class='style8'><input type='radio' name='ans' value='3'>$row[5]";
    echo "<tr><td class='style8'><input type='radio' name='ans' value='4'>$row[6]";

    if( $_SESSION['ques'] < mysqli_num_rows($res)-1 ){
        echo "<tr><td><input type='submit' name='next' value='Next Question'></form>";
    }
    else{
        echo "<tr><td><input type='submit' name='get' value='Get Result'></form>";
    }
    echo "</table></table>";
?>
</body>
</html>