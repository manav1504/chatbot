<?php
date_default_timezone_set('Asia/Kolkata');
include('database.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>College Chatbot</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link href="style.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="container-fluid mt-5">
         <div class="row justify-content-md-center mb-4">
            <div class="col-md-6">
               <!--start code-->
               <div class="card">
                  <div class="card-body messages-box" style=" background-color: lightblue;">
					 <ul class="list-unstyled messages-list">
						<li class="messages-me clearfix start_chat" style=" font-family: 'Montserrat', sans-serif; font-weight: lighter;">
							<img class="rounded-circle mr-1"src="image/android-icon-72x72.png" alt=""> Hello, How may I help you?
						</li>	
                     </ul>
                  </div>
                  <div class="card-header">
					  <!-- Input area -->
					  <div class="row">
							<div class="input-group m-2">
                                <input type="text" name="messages" class="form-control input-xs ml-2 mr-2" id="input-me" placeholder="Click & Speak Something" >
                                <span class="input-group-append ml-1">
								<button class="btn btn-primary" value="" onclick="send_msg()" style=" border-radius: 5px;"><i class="fas fa-angle-double-right"></i></button>
								</span>
                                <span class="input-group-append ml-2">
                                <button class="talk btn  btn-success rounded-circle"><i class="fas fa-microphone"></i></button>
                                </span>
							</div> 
					  </div>
                  </div>
               </div>
               <!--end code-->
            </div>
         </div>
      </div>
      <script type="text/javascript">
		 function getCurrentTime(){
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();
			var ampm = (hh>=12)?'PM':'AM';
			hh = hh%12;
			hh = hh?hh:12;
			hh = hh<10?'0'+hh:hh;
			min = min<10?'0'+min:min;
			var time = hh+":"+min+" "+ampm;
			return time;
		 }
		 function send_msg(){
			jQuery('.start_chat').hide();
			var txt=jQuery('#input-me').val();
			var html='<li class="messages-me clearfix"><span class="message-img"><img src="image/user_avatar.png" class="avatar-xs rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p"style=" border:none;">'+txt+'</p></div></li>';
			jQuery('.messages-list').append(html);
			jQuery('#input-me').val('');
			if(txt){
				jQuery.ajax({
					url:'get_bot_message.php',
					type:'post',
					data:'txt='+txt,
					success:function(result){
						var html='<li class="messages-you clearfix"><span class="message-img"><img src="image/android-icon-72x72.png" class="avatar-xs rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">VIIT</strong> <small class="time-messages text-muted"><span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p"style=" border:none;">'+result+'</p></div></li>';
						jQuery('.messages-list').append(html);
                        jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
                        readOutLoud(result);
					}
				});
			}
		 }
        const btn = document.querySelector('.talk');
        const content = document.querySelector('#input-me');
        const SpeechRecong = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recong = new SpeechRecong();

        recong.onstart = function() {
            console.log('voice is activated');
        };
        recong.onresult = function(event) {
            const current = event.resultIndex;
            const transcript = event.results[current][0].transcript;
            content.textContent = transcript;
            document.getElementById('input-me').value = event.results[0][0].transcript;
           
        };
        btn.addEventListener('click', () => {
            recong.start();
        });
        function readOutLoud(message) {
            const speech = new SpeechSynthesisUtterance();
            speech.volume = 1.5;
            speech.rate = 1;
            speech.pitch = 1;
            speech.text = message;

            window.speechSynthesis.speak(speech);
        };
      </script>
   </body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <?php
date_default_timezone_set('Asia/Kolkata');
include('database.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>College Chatbot</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link href="style.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="container-fluid mt-5">
         <div class="row justify-content-md-center mb-4">
            <div class="col-md-6">
               <!--start code-->
               <div class="card">
                  <div class="card-body messages-box" style=" background-color: lightblue;">
					 <ul class="list-unstyled messages-list">
						<li class="messages-me clearfix start_chat" style=" font-family: 'Montserrat', sans-serif; font-weight: lighter;">
							<img class="rounded-circle mr-1"src="image/android-icon-72x72.png" alt=""> Hello, How may I help you?
						</li>	
                     </ul>
                  </div>
                  <div class="card-header">
					  <!-- Input area -->
					  <div class="row">
							<div class="input-group m-2">
                                <input type="text" name="messages" class="form-control input-xs ml-2 mr-2" id="input-me" placeholder="Click & Speak Something" >
                                <span class="input-group-append ml-1">
								<button class="btn btn-primary" value="" onclick="send_msg()" style=" border-radius: 5px;"><i class="fas fa-angle-double-right"></i></button>
								</span>
                                <span class="input-group-append ml-2">
                                <button class="talk btn  btn-success rounded-circle"><i class="fas fa-microphone"></i></button>
                                </span>
							</div> 
					  </div>
                  </div>
               </div>
               <!--end code-->
            </div>
         </div>
      </div>
      <script type="text/javascript">
		 function getCurrentTime(){
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();
			var ampm = (hh>=12)?'PM':'AM';
			hh = hh%12;
			hh = hh?hh:12;
			hh = hh<10?'0'+hh:hh;
			min = min<10?'0'+min:min;
			var time = hh+":"+min+" "+ampm;
			return time;
		 }
		 function send_msg(){
			jQuery('.start_chat').hide();
			var txt=jQuery('#input-me').val();
			var html='<li class="messages-me clearfix"><span class="message-img"><img src="image/user_avatar.png" class="avatar-xs rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p"style=" border:none;">'+txt+'</p></div></li>';
			jQuery('.messages-list').append(html);
			jQuery('#input-me').val('');
			if(txt){
				jQuery.ajax({
					url:'get_bot_message.php',
					type:'post',
					data:'txt='+txt,
					success:function(result){
						var html='<li class="messages-you clearfix"><span class="message-img"><img src="image/android-icon-72x72.png" class="avatar-xs rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">VIIT</strong> <small class="time-messages text-muted"><span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p"style=" border:none;">'+result+'</p></div></li>';
						jQuery('.messages-list').append(html);
                        jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
                        readOutLoud(result);
					}
				});
			}
		 }
        const btn = document.querySelector('.talk');
        const content = document.querySelector('#input-me');
        const SpeechRecong = window.SpeechRecognition || window.webkitSpeechRecognition;
        const recong = new SpeechRecong();

        recong.onstart = function() {
            console.log('voice is activated');
        };
        recong.onresult = function(event) {
            const current = event.resultIndex;
            const transcript = event.results[current][0].transcript;
            content.textContent = transcript;
            document.getElementById('input-me').value = event.results[0][0].transcript;
           
        };
        btn.addEventListener('click', () => {
            recong.start();
        });
        function readOutLoud(message) {
            const speech = new SpeechSynthesisUtterance();
            speech.volume = 1.5;
            speech.rate = 1;
            speech.pitch = 1;
            speech.text = message;

            window.speechSynthesis.speak(speech);
        };
      </script>
   </body>
</html>