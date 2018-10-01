

   $(document).ready(function(){
	var active = 1;
	var timeout = null;
	var count = 0;
	var dt = new Date($.now());
	
	var InTown = $("#InTown");
	var InMap = $("#InMap");
	var InBattle = $("#InBattle");

	var townButton = $("#TownButton");
	var mapButton = $("#MapButton");
	var battleButton = $("#BattleButton");
	
	InTown.hide();
        InMap.show();
	InBattle.hide();

	console.log("yup");
	townButton.click(function(){
		InTown.show();
		InMap.hide();
		InBattle.hide();
		console.log("Sup");
	});
	mapButton.click(function(){
                InTown.hide();
                InMap.show();
                InBattle.hide();
                console.log("Sup");
        });
	battleButton.click(function(){
                InTown.hide();
                InMap.hide();
                InBattle.show();
                console.log("Sup");
        });
	               		        			
	$("#submit-global-message").click(function(){
		AppendGlobalMessage($("#new-global-message").val());
		$("#new-global-message").val("");
	});

	mouseDown = false;
	movingGM = 1;
	   ismoving =false;
	$(".gm")
	     .mousedown(function() {
		     	console.log("down");
		         movingGM  = setInterval(moveGM, 50);
			ismoving = true;	       
	     });
	$(window).mouseup(function() {
		     	console.log("up");
			clearInterval(movingGM);
			ismoving = false;
			//$(document).mousemove(function(){});
	     });


	function moveGM(){
		
			console.log("hold");
			x = 0; y=0;
			$(window).mousemove(function(event) {
				
				/*currentMousePos.x =*///x = event.pageX;
				/* currentMousePos.y =*///y =  event.pageY;
				if(ismoving){
					$(".gm").css({left: event.pageX - 20, top: event.pageY - 20});
				}
			});
			//console.log("X : " + event.pageX  + "  Y: "+ event.pageY);
			//$(".gm").css({top: event.x, left: y});
	}
	

	function AppendGlobalMessage(str){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			//document.getElementById("global-messages").innerHTML = this.responseText;	
			}
		};
		xmlhttp.open("GET", "append-global-message.php?m=" + str, true);
		xmlhttp.send();
	}
	//var active = 1;
	$(document).on('mousemove', function() {
		    dt = new Date($.now());
		    clearTimeout(timeout);
		    active = 1;
		    timeout = setTimeout(function() {
			    	    active = 0;
			        }, 1000);
	});

	function mainUpdate(){
		var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("logged").innerHTML = this.responseText;
                        }
                };

                dateTime = dt.getFullYear()+"-"+dt.getUTCMonth()+"-"+dt.getUTCDay()+" "+dt.getUTCHours()+":"+dt.getUTCMinutes()+":"+dt.getUTCSeconds();
                xmlhttp.open("GET", "update.php?active="+active+"&dt="+dateTime, true);
                xmlhttp.send();	
                count++;
	}
	function globalMessagesUpdate(){
		gms = $("#global-messages");
		//console.log(gms[0].scrollHeight);
		//console.log(gms.scrollTop());
		//console.log(gms.innerHeight());
		keepDown = false;
		if($("#global-messages").scrollTop() + $("#global-messages").innerHeight() >= $("#global-messages")[0].scrollHeight){
			keepDown = true;
		}
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                $("#global-messages").html( this.responseText);
				if(keepDown){
					$("#global-messages").scrollTop($("#global-messages")[0].scrollHeight);
					//console.log("higher");
				}
				else{
					//console.log("lower");
				}
                        }
                };

                dateTime = dt.getFullYear()+"-"+dt.getUTCMonth()+"-"+dt.getUTCDay()+" "+dt.getUTCHours()+":"+dt.getUTCMinutes()+":"+dt.getUTCSeconds();
                xmlhttp.open("GET", "update-global-messages.php", true);
                xmlhttp.send();
                count++;	
        }
	function mainLoop(){
		mainUpdate();
		//globalMessagesUpdate();
	}
	
	mainLoop();
	globalMessagesUpdate();
	function START1(){setInterval(globalMessagesUpdate, 1000);}
	function START2(){setInterval(mainLoop, 3000);}
	START1();	
	START2();
});	
