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
				<button class="logoutbtn" onClick="window.location.href='http://www.cs.gettysburg.edu/~seabha01/cs360/proj5/adminhomePHP_test.php';">Back</button>
			</div>
		</div>
        <br>
        
        <div id="main-area" class="search-results">
          <?php
              include_once("db_connect.php");

              //Get all the fields filled in the form

              $type=$_POST['type'];
              $eq_size=$_POST['eq_size'];
              $color=$_POST['color'];
              $brand=$_POST['brand'];
              $model=$_POST['model'];
              $lock_num=$_POST['lock_num'];

              //generate the query
              // check if the lock number was entered or not
              if ($lock_num != NULL){
                $query= "INSERT INTO equipment(etype,eq_size,color,brand,model,lockID) VALUES('$type','$eq_size','$color','$brand','$model',$lock_num);";
              }
              else{
                $query= "INSERT INTO equipment(etype,eq_size,color,brand,model) VALUES('$type','$eq_size','$color','$brand','$model');";
              }

              //send the query to the data base;
              $result=$db->query($query);

              if($result != FALSE)
              {
                print "<h3>Sucessfully added $type to the inventory.</h3>";
              }
          ?>
        </div>

    </div>

</BODY>

</HTML>
