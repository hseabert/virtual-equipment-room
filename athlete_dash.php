<!DOCTYPE html>
<html lang="en">
<head>
	<title>Athlete Dashboard</title>
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
				Athlete Homepage
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

        <br/><br/>
        
        <div class="btn-group">
		<button onCLick="toggleDisplay('athlete-item-field');">View My Equipment</button>
		</div>
		
        <br/><br/>
	
		<div class="search-results">
			<div id="welcome-content" class="card-body">
				Welcome to the athlete homepage!
            </div>

            <div id="err-content" class="card">
				Oops...something went wrong.
            </div>

            <div id="athlete-item-field" class="card">
                    <div class="card-body">
                        <FORM name = "fmViewEq">
                            <!-- need to change this once we have the session variable -->
                            <h1>Your Equipment:</h1>
                            <TABLE border="1" cellspacing="0" cellpadding="5" align="center">
                            <TR><TD>INVENTORY ID</TD><TD>TYPE</TD><TD>SIZE</TD><TD>COLOR</TD><TD>BRAND</TD><TD>MODEL</TD><TD>Lock ID</TD><TD>Padlock ID</TD></TR>
                            <?php
                                    // this is temporarily hard-coded NEED TO FIX
                                    $qStr = "SELECT * FROM equipment NATURAL JOIN eq_assign WHERE eq_assign.id = '00000011';";
                                    $qRes = $db->query($qStr);
                                    
                                    if ($qRes != FALSE){
                                        while ($row = $qRes->fetch()){
                                            $inum = $row['inum'];
                                            $etype = $row['etype'];
                                            $eq_size = $row['eq_size'];
                                            $color = $row['color'];
                                            $brand = $row['brand'];
                                            $model = $row['model'];
                                            $lockID = $row['lockID'];
                                            $plockID = $row['plockID'];

                                            $str = "<TR><TD>$inum</TD><TD>$etype</TD><TD>$eq_size</TD><TD>$color</TD><TD>$brand</TD><TD>$model</TD><TD>$lockID</TD><TD>$plockID</TD></TR>\n";
                                            print $str;
                                        }
                                    }
                                ?> 
                            <BR/>
                            </TABLE>
                            </FORM>
                    </div>
                </div>
		</div>
	</div>
	
	
	
<br><br>

	

</body>
</html>