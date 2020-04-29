<!DOCTYPE html>
<html lang="en">
<head>
	<title>Worker Dashboard</title>
    <!-- include bootstrap -->
    <?php include("bootstrap.php"); ?>
    <?php include_once("db_connect.php"); ?>
    
    <!-- style sheet -->
    <link rel="stylesheet" href="dashboard_style.css">

    <!-- script for dashboard utils-->
    <script type="text/javascript" src="worker_utils.js"></script>
</head>


<body>
	<div>
		<div class="cardTop">
			<div class="card-body">
				Worker Homepage
			</div>
			<div class="btn-logout">
				<button>Log Out</button>
			</div>
		</div>
		<br>		
		<div class="search">
			<input type="text" class="searchTerm" placeholder="Item">
			<button type="submit" class="btn-search">
			<i class="fa fa-search"></i>Search
			</button>
		</div>
		
		<br><br>
		
		<div class="btn-group">
		<button onCLick="toggleDisplay('issue-item-field');">Issue Equipment</button>
        <button onCLick="toggleDisplay('dne');">Return Equipment</button>
        <button onCLick="toggleDisplay('view-ath-items-field');">Manage Assignments</button>
		</div>
	
	
		<div class="search-results">
			<div class="card-body">
            <div id="welcome-content" class="card-body">
				<h1>Welcome, Worker!</h1>
            </div>
            <div id="err-content" class="card">
					<h1>Oops, something went wrong...</h1>
			</div>
            <div id="issue-item-field" class="card">
                    <div class="card-body">
                        <FORM name = "fmIssueEquipment" method ="POST" action="issueEquipment.php"> <!-- <action="issueEquipment.php"> -->
            
                            <h1>Create Assignment</h1>
                            <label for="team">Select Team: </label>
                            <select class="select-css" name="selectTeam">
                            <?php
                                    $qStr = "SELECT sname FROM sport;";
                                    $qRes = $db->query($qStr);
                                    
                                    if ($qRes != FALSE){
                                        while ($row = $qRes->fetch()){
                                            // access similarly to a hashtable
                                            $sname = $row['sname'];
                                
                                            // we have to construct a string to print each row (including cols) of the table
                                            $str = "<option value='$sname'>$sname</option>";
                                            print $str;
                                        }
                                    }
                                ?> 
                            </select>
                            <BR/>
                            <label for="team">Select Type: </label>
                            <select class="select-css" name="selectEq">
                            <?php
                                    $qStr = "SELECT DISTINCT etype FROM equipment;";
                                    $qRes = $db->query($qStr);
                                    
                                    if ($qRes != FALSE){
                                        while ($row = $qRes->fetch()){
                                            // access similarly to a hashtable
                                            $etype = $row['etype'];
                                
                                            // we have to construct a string to print each row (including cols) of the table
                                            $str = "<option value='$etype'>$etype</option>";
                                            print $str;
                                        }
                                    }
                                ?>
                                
                            </select>
                            <BR/>
                            
                            <INPUT class="submit-css" type="submit" value="Next"/>
                            
                            </FORM>
                    </div>
                </div>

                <!-- we want to use this div for viewing items issued to a specific athlete -->
                <div id="view-ath-items-field" class="card">
                    <div class="card-body">
                        <FORM name = "fmSelectTeam" method ="POST" action="viewAthleteEq.php">
            
                            <h1>Assignment Information</h1>
                            <label for="team">Select Team: </label>
                            <select class="select-css" name="selectTeam1">
                            <?php
                                    $qStr = "SELECT sname FROM sport;";
                                    $qRes = $db->query($qStr);
                                    
                                    if ($qRes != FALSE){
                                        while ($row = $qRes->fetch()){
                                            // access similarly to a hashtable
                                            $sname = $row['sname'];
                                
                                            // we have to construct a string to print each row (including cols) of the table
                                            $str = "<option value='$sname'>$sname</option>";
                                            print $str;
                                        }
                                    }
                                ?> 
                            </select>
                            <BR/>
                            
                            <INPUT class="submit-css" type="submit" value="Next"/>
                            
                            </FORM>
                    </div>
                </div>
			</div>
		</div>
	</div>
	
	
	
<br><br>

	

</body>
</html>