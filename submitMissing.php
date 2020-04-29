<DOCTYPE html>
  <!-- submitMissing.php 
  author: Hannah Seabert
  Virtual EQ Room Database Project
  This page contains a form to submit the missing items based on what was selected in showAthleteEq.php-->
<HTML>
<HEAD>
<TITLE>Submit Missing Items</TITLE>
    <!-- include bootstrap -->
    <?php include("bootstrap.php"); ?>
    <!-- style sheet -->
    <link rel="stylesheet" href="dashboard_style.css">

<HEAD>

<BODY>
    <div>
        <div class="cardTop">
			<div class="card-body">
				Document Missing Items
			</div>
			<div class="btn" style="align: right">
				<button class="logoutbtn">Log Out</button>
            </div>
		</div>
        <br>
        
        <div id="main-area" class="search-results">
        <?php
          include_once("db_connect.php");

          $missingEq=$_POST['missingEq'];

          //generate the queries:
          // 1. insert student id and inum into eq_assign
          $qStr = "INSERT INTO missing(inum) VALUES ($missingEq);";

          // send the query to the database
          $qRes = $db->query($qStr);

          if($qRes != FALSE)
          {
            print "<p>Sucessfully added inventory number $eqInum to missing</p>";
          }
          else print "<p>Oops...something went wrong. Please try again later.</p>";
        ?>
        </div>

    </div>

</BODY>

</HTML>