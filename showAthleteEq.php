<DOCTYPE html>
      <!-- issueEquipment.php 
  author: Hannah Seabert
  Virtual EQ Room Database Project
  This page contains a form to display athletes on selected team as well as available equipment-->
<HTML>
<HEAD>
<TITLE>Assign Equipment</TITLE>
    <!-- include bootstrap -->
    <?php include("bootstrap.php"); ?>
    <!-- style sheet -->
    <link rel="stylesheet" href="dashboard_style.css">
    <!-- script for dashboard utils-->
    <script type="text/javascript" src="dashboard_utils.js"></script>

<HEAD>

<BODY>
    <?php 

    include_once("db_connect.php");

    $ath=$_POST['selectAth1'];

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
            <FORM name="fmShowAthEq" method="POST" action="submitMissing.php"> 
                <TABLE border="1" cellspacing="0" cellpadding="5" align="center">
                <TR><TD>Inventory Number</TD><TD>Type</TD><TD>Missing</TD></TR>
                <?php
                    $qStr = "SELECT equipment.inum, etype FROM equipment NATURAL JOIN eq_assign 
                    WHERE equipment.inum = eq_assign.inum AND eq_assign.id = $ath;";

                    $qRes = $db->query($qStr);

                    if($qRes != FALSE)
                    {
                    while ($row = $qRes->fetch()){
                        // access similarly to a hashtable
                        $inum = $row['inum'];
                        $etype = $row['etype'];

                        // we have to construct a string to print each row (including cols) of the table
                        $str = "<TR><TD>$inum</TD><TD>$etype</TD><TD><input type='radio' id=$inum value=$inum name='missingEq'></TD></TR>\n";
                        print $str;
                    }
                    }
                    else print "<p>Oops...something went wrong. Please try again later.</p>";
                ?>

                </TABLE>
                <BR/> 
                <INPUT class="submit-css" type="submit" value="Confirm Missing"/>
            </FORM>
        </div>

    </div>

</BODY>

</HTML>










