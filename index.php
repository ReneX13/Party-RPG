<?php
	require_once 'vendor/autoload.php';
	require_once 'generated-conf/config.php';
	$Render = "<form method='post' action = 'index.php' >
                <input type='text' name='username'/>
                <input type='submit' value='submit'/>
        	</form>";
	session_start();
	if($_SESSION){
		 $user = AccountQuery::create()->findOneById($_SESSION["id"]);
		 $Render = $user->getUsername();
	}
	else{
		header("Location: login.php");
	}
	if($_POST){
		
	}
	

?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="index.css">
<style>
#shop-item-list{
	background-color: red;	
	height: 60%;
	padding : 20px;
	overflow:scroll;
}
#shop-controller{
	
}
#map-box{
	background-color: lightblue;
	
	height: 500px;
	overflow: scroll;
	resize: both;
}

.fieldset-settings{
	margin-bottom : 20px;
}
#map-img{

}

#global-messages{
	min-width :300px;
	max-width :300px;
	min-height : 200px;
	max-height : 200px;
	overflow: scroll;
	
	background-color: black;
	margin-bottom:10px;
	padding-right:10px;
	padding-left:10px;
	font-size: 9px;
}
#new-global-message{
	width:100%;
	min-height: 75px;
	max-height: 75px;
	resize : none;
}

.gm{
	position: fixed;
    	left: 100px;
    	top: 100px;
}
.jumbotron{
	background-color: rgba(0,0,0,0);
	color: snow;
}
body{
	margin : 25px;
}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class ="container-fluid"> 
    <div class = "jumbotron text-center"><h4>PARTY RPG</h4></div>
  
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="navbar-text">Hello, <?php echo $Render;?></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>

<div class ="container">
	<div id = "InTown" hidden>
		<div class = "container">
			<div class = "row">
				<div class = "col col-md-5">
					<div class = "panel panel-default">
							<div class = "panel-body">

							</div>
					</div>
					<div id = "shop-item-list" class ="text-center">
						<div class="btn-group-vertical" style="width: 100%;">
 							 <button type="button" class="btn btn-primary" style="margin-bottom: 10px;"></button>
						</div>
					</div>
				
					<div class = "panel panel-default">
						<div class = "panel-body">
							<div class = "shop-controller">

							</div>
						</div>
					</div>
				</div>
				<div class = "col col-md-1">

				</div>
				<div class = "col col-md-4">
					<div id  = "town-menu">
						<div class="panel panel-default">
    							<div class="panel-heading">Panel Heading</div>
							<div class="panel-body">
								<fieldset class = "fieldset-settings"><legend>Shops</legend>
									<div class="btn-group">
  										<button type="button" class="btn btn-primary">Item</button>
  										<button type="button" class="btn btn-primary">Weapon</button>
  										<button type="button" class="btn btn-primary">Armor</button>
									</div>
								</fieldset>
								<fieldset class = "fieldset-settings"><legend>Trainers</legend>
                                                                        <div class="btn-group">
                                                                                <button type="button" class="btn btn-primary">Battle</button>
                                                                                <button type="button" class="btn btn-primary">Crafting</button>
                                                                        </div>
                                                                </fieldset>
								<fieldset><legend>Services</legend>
                                                                        <div class="btn-group">
                                                                                <button type="button" class="btn btn-primary">Inn</button>
                                                                                <button type="button" class="btn btn-primary">Pub</button>
										<button type="button" class="btn btn-primary">Clinic</button>
                                                                        </div>
								</fieldset>

							</div>
							<div class="panel-footer">Panel Footer</div>
  						</div>
					</div>
				</div>
			</div>								
		</div>	
	</div>
	<div id = "InMap" hidden>
		<div class = "container">
			<div class = "row">
				<div class = "col col-md-6">
					<div id ="map-box" >
				         <img src = "images/map-example.svg"/>		        			
					</div>
				</div>
				<div class = "col col-md-6">
				
				</div>
			</div>
		</div>
	</div>
	<div id = "InBattle" hidden>
		<div class = "container">
			<div class = "row">
				<div class = "panel panel-default">
					<div class = "panel-body" style = "min-height: 350px;">
					
					</div>
				</div>
			</div>
			<div class = "row">
				<div class = "panel panel-default">
					<div class = "panel-body" style = "min-height: 350px;">
						
					</div>
				</div> 
			</div>
			<div class = "row">
				
			</div>
		</div>
	</div>
	<fieldset><legend>Switch Scence Controllers</legend>
	<div class = "btn-group">
		<button id = "TownButton" class = "btn btn-primary">Town</button>
		<button id = "MapButton" class = "btn btn-primary">Map</button>
		<button id = "BattleButton" class = "btn btn-primary">Battle</button>
	</div>
	</fieldset>
	<fieldset><legend>Add File</legend>
	<form method = "post" action ="edit.php" enctype="multipart/form-data">
		<input type = "file" name = "file" />
		<input type = "submit" value = "Upload"/>
	</form>
	</fieldset>
	<div id="logged">
	
	</div>
</div>

<div class = "panel panel-default gm">
     <div class = "panel-heading" id = "global-messages-heading">Global Chat</div>
     <div class = "panel-body" id = "global-messages-body" style = "padding: 25px;"> 
        <div class = "row">
                <div  id = "global-messages" > 

                        
                </div>
        </div>
        <div class = "row">
                <textarea id = "new-global-message"></textarea>
	</div>
	<div class ="row">
		<button id = "submit-global-message" >Send</button>
        </div>
     </div>
</div>
</body>

<script src ="update.js"></script>
</html>
