<?php  
    include('header.php');
    include('database.php');
    extract($_POST);

    if( isset($submit) ){
        $res = mysqli_query($con, "select * from user where login='$loginid' and pass='$pass'");
        if( mysqli_num_rows($res) < 1){
            $found = "N";
        }
        else{
            $_SESSION['login'] = $loginid;
        }
    }
    if( isset($_SESSION['login']) ){
        echo "<h1 class='style8' align='center'>Welcome to Online Exam</h1>";
        echo '<table width="28%"  border="0" align="center">
        <tr>
          <td width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="50" height="50" align="middle"></td>
          <td width="93%" valign="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="style4">Subject for Question</a></td>
        </tr>
        <tr>
          <td height="58" valign="bottom"><img src="image/DEGREE.JPG" width="43" height="43" align="absmiddle"></td>
          <td valign="bottom"> <a href="result.php" class="style4">Result </a></td>
        </tr>
      </table>';
      exit();
    }

?>
    <table width="100%" border="0">
        <tr>
            <td width="70%" height="25">&nbsp;</td>
            <td width="29%"><div align="center" class="style1">User Login</div></td>
        </tr>
        <tr>
            <td height="296" valign="top">
                <div align="center">
                    <h1 class="style8">Welcome to Online Exam System</h1>
                    <span class="style5"><img src="image/paathshala.jpg" width="129" height="100" alt=""><span class="style7"><img src="image/HLPBUTT2.JPG" width="50" height="50" alt=""><img src="image/BOOKPG.JGP" width="43" height="43" alt=""></span></span>
                    <p align="left" class="style5">&nbsp;</p>
                    <blockquote>
                        <p align="left" class="style5"><span class="style7">Welcome Online Exam System.This Tutorial will provide the online exam for various subject of interest.
                            You need to login for the take the online exam.</span></p>
                    </blockquote>
                </div>
            </td>
            <td valign="top">
                <form action="" name="form1" method="post">
                    <table width="200" border="0">
                        <tr>
                            <td><span class="style2">Login ID</span></td>
                            <td><input type="text" name="loginid" id="loginid2"></td>
                        </tr>
                        <tr>
                            <td><span class="style2">Password</span></td>
                            <td><input type="password" name="pass" id="pass2"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span class="error">
                                <?php
                                    if( isset($found) ){
                                        echo "Invalid Username or Password";
                                    }
                                ?>
                            </span></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" class="errors">
                                <input type="submit" name="submit" id="submit" value="Login">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" bgcolor="#1d91d0">
                                <div align="center">
                                    <span class="style4">New User ? <a href="signup.php">Signup Free</a></span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>