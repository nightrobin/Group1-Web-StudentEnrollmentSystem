<?php
session_start();

require_once "config.php";

if($_POST){

          $lname = $_POST['lname'];
          $fname = $_POST['fname'];
          $mname = $_POST['mname'];
          $bday = $_POST['bday'];
          $email = $_POST['email'];
          $cpnum = $_POST['cpnum'];
          $sex = $_POST['sex'];
          $citi = $_POST['citi'];
          $rel = $_POST['rel'];
          $sid = $_POST['sid'];
          $yrlvl = $_POST['yrlvl'];
          $sem = $_POST['sem'];
          $course = $_POST['course'];
          $address = $_POST['address'];
          $mothname = $_POST['mothname'];
          $mothnum = $_POST['mothnum'];
          $fathname = $_POST['fathname'];
          $fathnum = $_POST['fathnum'];
          $gname = $_POST['gname'];
          $gnum = $_POST['gnum'];
          $lastsch = $_POST['lastsch'];
          $lastschadd = $_POST['lastschadd'];
          $ave = $_POST['ave'];
          $pw = $sid;

          $_SESSION['sid'] = $sid;

              $sql = "INSERT INTO personalinfo (lastname, firstname, middlename, birthdate, email, cpnum, seks, citizenship, religion, studID, yrlvl,
                      sem, course, address, mothername, mothernum, fathername, fathernum, gname, gnum,lschname,lschadd,ave, password)
                      VALUES ('$lname','$fname','$mname','$bday','$email','$cpnum','$sex','$citi','$rel','$sid','$yrlvl','$sem',
                        '$course','$address','$mothname','$mothnum','$fathname','$fathnum','$gname', '$gnum','$lastsch','$lastschadd','$ave', '$pw');";

                      mysqli_query($con, $sql);
                        header("location: display.php?success");

  	}
  	exit();



  ?>