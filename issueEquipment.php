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
            <FORM name="fmShowAthEq" method="POST" action="submitAssign.php"> 
                <label for="athlete">Select Athlete: </label>
                <select class="select-css" name="selectAth">
                <?php
                        $team = str_replace("'", "\'", $team);
                        $qStr = "SELECT id, fname, lname FROM athlete JOIN sport ON athlete.scode = sport.scode
                            WHERE sport.sname = '$team';";

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
                                // $str = "<option value='$fname $lname'>$fname $lname</option>";
                                $str = "<option value='$id'>$fname $lname</option>";
                                print $str;
                            }
                        }
                    ?>
                </select>
                <BR/>

                <TABLE border="1" cellspacing="0" cellpadding="5" align="center">
                <TR><TD>INVENTORY ID</TD><TD>TYPE</TD><TD>SIZE</TD><TD>COLOR</TD><TD>BRAND</TD><TD>MODEL</TD><TD>SELECT</TD></TR>

                <?php
                    // this is the query string
                    // $qStr = "SELECT inum, etype, eq_size, color, brand, model FROM equipment WHERE etype='$type';";
                    $qStr = "SELECT DISTINCT equipment.inum, etype, eq_size, color, brand, model FROM equipment
                    JOIN eq_assign ON equipment.inum <> eq_assign.inum WHERE etype='$type';";

                    // we will call db to execute it 
                    //(the result of query will be another obj)
                    $qRes = $db->query($qStr);
                    

                    // we must check if $qRes is NULL before we try to access it
                    if ($qRes != FALSE){
                        $rowNum = 0;
                        $checkbox = 'item';
                        while ($row = $qRes->fetch()){
                            // access similarly to a hashtable
                            $inum = $row['inum'];
                            $etype = $row['etype'];
                            $eq_size = $row['eq_size'];
                            $color = $row['color'];
                            $brand = $row['brand'];
                            $model = $row['model'];

                            // $checkName = $inum;

                            // we have to construct a string to print each row (including cols) of the table
                            $str = "<TR><TD>$inum</TD><TD>$etype</TD><TD>$eq_size</TD><TD>$color</TD><TD>$brand</TD><TD>$model</TD><TD><p><input type='radio' id=$inum value=$inum name='radioEq'></TD></TR>\n";
                            print $str;
                        }
                    }

                ?>

                </TABLE>
                <BR/> 
                <INPUT class="submit-css" type="submit" value="Complete Assignment"/>
            </FORM>
        </div>

    </div>

</BODY>

</HTML>