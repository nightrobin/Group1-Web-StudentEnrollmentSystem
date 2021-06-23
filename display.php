<?php
include_once 'config.php';
session_start();


  $sid = $_SESSION['sid'];

  $sql = "SELECT * FROM personalinfo WHERE studID = '$sid'";

  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($result)){
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="https://64.media.tumblr.com/7e769c2aa9a614c4b089f23414c7a0e6/826a1a3e7611eb3a-bd/s500x750/720c5f9405fef47ac7be8aaf947285e2facb266c.png"/>
    <title>SES | Student Registration Form</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body{
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://s29068.pcdn.co/wp-content/uploads/students-on-computers-registration.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            background-size: cover;
            font-family: "poppins";
        }

        /*header*/
       .box-area{
			height: 100px;
			width: 100%;
		}
		.wrapper{
			width: 1170px;
			margin: 0 auto;
		}
		.logo{
			width: 100px;
			height: 100px;
			float: left;
			line-height: 100px;
		}
		.logo a{
			height: 10px;
			width: 10px;
			margin: 0;
		}
		nav{
			float: right;
			line-height: 100px;
		}
		nav a{
			text-decoration: none;
			font-family: Century gothic;
			letter-spacing: 5px;
			color: white;
			font-size: 20px;
			margin: 0 10px;
			padding: 5px 15px;
			transition: 0.7s ease;
		}
		nav a:hover{
			background-color: #fff;
			color: #000;
		}
		header{
			height: 100px;
			width: 100%;
			background: #000;
			z-index: 12;
			position: static;
		}

        #bar{
            position: fixed;
            height: 6px;
            background-color: #dc4308; /* For browsers that do not support gradients */
            background-image: linear-gradient(to right, #dc4308 , #f9b34d);
            top:55px;
            left:0;
            width: 100%;
            z-index: 9;
        }

        #barb{
            height: 8px;
            background-color: #dc4308; /* For browsers that do not support gradients */
            background-image: #dc4308;
            bottom:30px;
            left:0;
            width: 100%;
            z-index: 9;
            position: fixed;
        }
        .content{
            margin:3%;
        }

        /*page title*/
        h1{
            text-align: center;
            color:#f9b34d;
            font-weight: 700;
            font-size: 60px;
            text-shadow: 3px 3px 5px #000;
            text-transform: uppercase;
            cursor:default;
            letter-spacing: 2px;
        }

        /*form section title*/
        .form b{
            color: #000;
            font-size: 20px;
            font-weight: 600;
            border-bottom: 4px solid #f9b34d;
            text-decoration: none;
            margin-left:-15px;
            margin-bottom: 15px;
            cursor:default;
        }

        .form{
            padding: 0px 15px 0 15px;
        }

        .container{
            background-color: white;
            padding: 10px 10px 20px 20px;
            border-radius: 5px;
            margin-bottom:200px;
            box-shadow: 2px 2px 10px;
        }

        /*input label*/
        h6{
            padding-top: 10px;
            font-weight:500;
            cursor:default;
        }

        input, select{
            width: 100%;
            font-weight: normal;
        }

        input[type=submit] {
            width: 31.5%;
            padding: 16px 32px;
            margin: 40px -35px 40px 0;
            float: right;
            font-weight: 600;
            background-color: #f9b34d;
            border: none;
            border-radius: 5px;
            color: #000;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 2s, color 2s, opacity 2s;
        }

        input[type=submit]:hover{
            opacity: 0.6;
            background-color: #555;
            color: #fff;
        }

        .firstrow{
            padding-top: 10px;
        }
        .lastrow{
            padding-bottom: 10px;
        }
        .footer {
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: black;
            color: rgb(219, 219, 219);
            text-align: left;
            font-size: 14px;
            height: 30px;
            font-weight: 500;
            position: fixed;
        }

        .footer b{
            color:#f9b34d;
        }

        .footer i{
            font-weight: 600;
            font-style: normal;
            text-decoration: none;
            color: #fff;
        }

        .footer li{
            list-style-type: none;
            margin-left:5%;
            padding-top:3px;
            cursor:default;
        }

        /*SCROLLBAR*/
        ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-track {
                background: #616161;
            }

            ::-webkit-scrollbar-thumb {
                background:#f9b34d;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #fff;
            }

        /*TEXT SELECTION*/
        ::selection {
            color: #f9b34d;
            background: #616161;
        }

        /*scroll to top*/
        #myBtn {
            display: none; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 50px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color:#f9b34d; /* Set a background color */
            color: #000; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 11px 15px 11px 15px; /* Some padding */
            border-radius: 5px; /* Rounded corners */
            font-size: 18px; /* Increase font size */
            transition: background-color 2s, color 2s, opacity 2s;
            }

        #myBtn:hover {
            background-color: #555; /* Add a dark-grey background on hover */
            opacity: 0.6;
            color: #fff;
        }
    </style>
</head>
<body>
	<div class="box-area">
			<header>
				<div class="wrapper">
					<div >
						<a href="#"><img class="logo" src="https://upload.wikimedia.org/wikipedia/en/d/dc/PLM_Seal_2013.png"></a>
					</div>
					<nav>
						<a class="active" href="Home.html">HOME</a>
						<a href="#">ABOUT US</a>
						<a href="#">CONTACT</a>

					</nav>
				</div>
			</header>
	</div>
	<div id="barb"></div>
    <div class="alert alert-success">
        <strong>Enrollment Successful!</strong> View your information.
    </div>
    <div class="content">
        <h1>Student Enrollment Record</h1>
        <form action="reg.php" method="post">
            <div class="container">
                <div class="form">
                    <b>Student Information</b>
                    <div class="row firstrow">
                        <div class="col-sm">
                            <h6>Last Name:</h6>
                            <p><?php echo $row['lastname']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>First Name:</h6>
                            <p><?php echo $row['firstname']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Middle Name:</h6>
                            <p><?php echo $row['middlename']; ?> </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <h6>Birthdate:</h6>
                            <p><?php echo $row['birthdate']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Email:</h6>
                            <p><?php echo $row['email']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Phone Number:</h6>
                            <p><?php echo $row['cpnum']; ?> </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <h6>Gender:</h6>
                            <p><?php echo $row['seks']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Nationality:</h6>
                            <p><?php echo $row['citizenship']; ?> </p>
                        </div>
                        <div class="col-sm">
                        	<h6>Religion:</h6>
                            <p><?php echo $row['religion']; ?> </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <h6>Student Number:</h6>
                            <p><?php echo $row['studID']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Year Level:</h6>
                            <p><?php echo $row['yrlvl']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Semester:</h6>
                            <p><?php echo $row['sem']; ?> </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <h6>Degree Program:</h6>
                            <p><?php echo $row['course']; ?> </p>
                        </div>

                        <div class="col-sm">
                        </div>
                    </div>
                    <div class="row lastrow">
                        <div class="col-sm">
                            <h6>Address:</h6>
                            <p><?php echo $row['address']; ?> </p>
                        </div>
                    </div>

                    <hr>

                    <b>Parent/Guardian Information</b>
                    <div class="row firstrow">
                        <div class="col-sm">
                            <h6>Mother's Name:</h6>
                            <p><?php echo $row['mothername']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Phone Number:</h6>
                            <p><?php echo $row['mothernum']; ?> </p>
                        </div>

                    </div>

                     <hr>
                    <div class="row">
                        <div class="col-sm">
                            <h6>Father's Name:</h6>
                            <p><?php echo $row['fathername']; ?> </p>
                        </div>

                        <div class="col-sm">
                            <h6>Phone Number:</h6>
                            <p><?php echo $row['fathernum']; ?> </p>
                        </div>

                    </div>

                    <hr>
                    <div class="row lastrow">
                        <div class="col-sm">
                            <h6>Guardian's Name:</h6>
                            <p><?php echo $row['gname']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Phone Number:</h6>
                            <p><?php echo $row['gnum']; ?> </p>
                        </div>

                    </div>

                    <hr>
                     <b>Last School Attended</b>
                    <div class="row firstrow">
                        <div class="col-sm">
                            <h6>Name of School:</h6>
                            <p><?php echo $row['lschname']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>School Address:</h6>
                            <p><?php echo $row['lschadd']; ?> </p>
                        </div>
                        <div class="col-sm">
                            <h6>Average:</h6>
                            <p><?php echo $row['ave']; ?> </p>
                        </div>
                    </div>

                    </div>
                    <a href="Home.html"></a>
                </div>
            </div>
        </form>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top">▲</button>

    <div id="barb"></div>

    <div class="footer">
        <li><b>|</b> developed and designed by <i>BSIT 1-3 | group 1</i>
    </div>

    <script>
        //SCROLL TO TOP
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
          } else {
            mybutton.style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
        </script>

    <!--bootstrap-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
}?>
