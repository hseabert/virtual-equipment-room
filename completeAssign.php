<DOCTYPE html>
<HTML>
<HEAD>
<TITLE>Add Equipment</TITLE>
    <!-- include bootstrap -->
    <?php include("bootstrap.php"); ?>
    <!-- style sheet -->
    <link rel="stylesheet" href="dashboard_style.css">

<HEAD>

<BODY>
    <?php 

    include_once("db_connect.php");

    $team=$_POST['selectTeam'];
    $type=$_POST['selectEq'];

    ?>
    <div>
        <div class="cardTop">
			<div class="card-body">
				Assign Equipment
			</div>
			<div class="btn" style="align: right">
				<button class="logoutbtn">Log Out</button>
            </div>
            <div class="btn" style="align: right">
				<button class="logoutbtn" onClick="window.location.href='http://www.cs.gettysburg.edu/~seabha01/cs360/proj5/addAthlete.php';">Back</button>
			</div>
		</div>
        <br>
        
        <div id="main-area" class="search-results">
        <?php
            // connect to db
            include_once("db_connect.php");

            // get values from post 

            //generate the query

            // query the db

            // check result and print appropriate message
            if($result != FALSE)
            {
                // print success message
            }
            else{
                // print error message
            }
          ?>
        </div>

    </div>

</BODY>

</HTML>