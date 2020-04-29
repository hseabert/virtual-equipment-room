<DOCTYPE html>
  <!-- viewAthleteEq.php 
  author: Hannah Seabert
  Virtual EQ Room Database Project
  This page contains a form to process the selected team & present a list of athletes on this team-->
<HTML>
<HEAD>
<TITLE>Select Athlete</TITLE>
    <!-- include bootstrap -->
    <?php include("bootstrap.php"); ?>
    <!-- style sheet -->
    <link rel="stylesheet" href="dashboard_style.css">

<HEAD>

<BODY>
    <div>
        <div class="cardTop">
			<div class="card-body">
				Worker Homepage
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
            <form name = "fmSelectAth" method ="POST" action="showAthleteEq.php">
            <label for="selectAth1">Select Athlete: </label>
            <select class="select-css" name="selectAth1">
                <?php
                    include_once("db_connect.php");

                    $team=$_POST['selectTeam1'];

                    //generate the queries:
                    // 1. insert student id and inum into eq_assign
                    // $qStr = "SELECT id, fname, lname FROM athlete JOIN sport ON athlete.scode = sport.scode
                    // WHERE sport.sname = '".$team."';";
                    $qStr = "SELECT id, fname, lname FROM athlete JOIN sport ON athlete.scode = sport.scode
                    WHERE sport.sname = '$team';";

                    // send the query to the database
                    $qRes = $db->query($qStr);

                    if ($qRes != FALSE){
                        while ($row = $qRes->fetch()){
                            // access similarly to a hashtable
                            $id = $row['id'];
                            $fname = $row['fname'];
                            $lname = $row['lname'];

                            print "<p>fname: $fname</p>";
                            print "<p>lname: $lname</p>";
                                    
                            // we have to construct a string to print each row (including cols) of the table
                            $str = "<option value='$id'>$fname $lname</option>";
                            print $str;
                        }
                    }
                    else print "<p>Oops...something went wrong. Please try again later.</p>";
                ?>
            </select>
            <INPUT class="submit-css" type="submit" value="Next"/>
            </form>
        </div>

    </div>

</BODY>

</HTML>