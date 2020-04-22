<DOCTYPE html>
  <!-- submitAssign.php 
  author: Hannah Seabert
  Virtual EQ Room Database Project
  This page contains a form to process the selected athlete & piece of equipment
  Selected information is added to the eq_assign table-->
<HTML>
<HEAD>
<TITLE>Complete Assignment</TITLE>
    <!-- include bootstrap -->
    <?php include("bootstrap.php"); ?>
    <!-- style sheet -->
    <link rel="stylesheet" href="dashboard_style.css">

<HEAD>

<BODY>
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
          include_once("db_connect.php");

          $ath=$_POST['selectAth'];
          $eqInum=$_POST['radioEq'];

          //generate the queries:
          // 1. insert student id and inum into eq_assign
          $qStr = "INSERT INTO eq_assign(inum, id) VALUES ($eqInum, '$ath');";

          // send the query to the database
          $qRes = $db->query($qStr);

          if($qRes != FALSE)
          {
            print "<p>Sucessfully assigned inventory number $eqInum to $ath</p>";
          }
          else print "<p>Oops...something went wrong. Please try again later.</p>";
        ?>
        </div>

    </div>

</BODY>

</HTML>