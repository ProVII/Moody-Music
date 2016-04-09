<!---------------------------------------------------------------------------------
 -    Authors: Fuad Tareq, 100504146                                              -
 -             Mohammad Ali, 100490152                                            -
 -    Please note, you will not be able to test the site with Facebook because    -
 -    it requires that you're pre-approved to use Moody Music. However, you may   - 
 -    still be able to run Twitter, but it will be logged into my account.        - 
 -    Therefore, you will not be able to test it with your own new tweets.        -
 -                                                                                -
 -    You'll also notice that for any new tweets or facebook posts, we just call  - 
 -    the moodyDictionary(term) function, which does the rest. Therefore, if you  -
 -    would like to test this application just call this function inside the      -
 -    script below with whatever quote inside it. Otherwise, if you insist on     -
 -    testing it within Facebook, you can contact us to add your Facebook account -
 -    as a tester for this application. Then you'll be able to log in through     -
 -    Facebook and accept the permissions required by this application.           -
 -                                                                                -
 -    Example:                                                                    -
 -        moodyDictionary("This is a facebook or a twitter status test request"); -
 -                                                                                -
 -    You may check the README.md for more details.                               -
 -    Thank you for your understanding.                                           -
 ---------------------------------------------------------------------------------->
<?php session_start(); ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Moody Music</title>
		<link rel="stylesheet" href="layout.css" type="text/css" charset="utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script>
			function init() {
				gapi.load('client', function() {
					//console.log('gapi.client loaded.');
				});
				gapi.client.setApiKey('AIzaSyC9-6sAprX5uX9wHx7pwSvIVHqehvj_pOA');
				gapi.client.load('youtube', 'v3').then(function(response) {
					//console.log(response);
					//search('sad');
				});
			}
		</script>
		<script src="https://apis.google.com/js/client.js?onload=init"></script>
		<script src="https://apis.google.com/js/client:plusone.js" type="text/javascript"></script>

		<div class="moody">
			<body_t>
				<svg viewBox="400 100 800 600">
					<symbol id="s-text">
						<text text-anchor="middle"
						x="50%"
						y="35%"
						class="text--line"
						>
							Moody
						</text>
						<text text-anchor="middle"
						x="50%"
						y="68%"
						class="text--line2"
						>
							Music
						</text>

					</symbol>

					<g class="g-ants">
						<use xlink:href="#s-text"
						class="text-copy"></use>
						<use xlink:href="#s-text"
						class="text-copy"></use>
						<use xlink:href="#s-text"
						class="text-copy"></use>
						<use xlink:href="#s-text"
						class="text-copy"></use>
						<use xlink:href="#s-text"
						class="text-copy"></use>
					</g>

				</svg>

			</body_t>
		</div>
	</head>
	<body>
		<div id="wrapper">
			<div id="header"></div>

			<div id="nav">
				<a href="#">Home</a><a href="#">Prices</a><a href="#">About us</a><a href="#">Services</a><a href="/privacy_policy.html">Privacy Policy</a><a href="#">Feed</a>
			</div>
		</div>

		<head>
			<link rel="stylesheet" href="layout.css" />
		</head>
	<body onload="clock()">

		<div style="width:120px;height:100px;position:relative;left:1325px;top:-60px;">
			<div id="dig1" class="dig">
				1
			</div>
			<div id="dig2" class="dig">
				2
			</div>
			<div id="dig3" class="dig">
				3
			</div>
			<div id="dig4" class="dig">
				4
			</div>
			<div id="dig5" class="dig">
				5
			</div>
			<div id="dig6" class="dig">
				6
			</div>
			<div id="dig7" class="dig">
				7
			</div>
			<div id="dig8" class="dig">
				8
			</div>
			<div id="dig9" class="dig">
				9
			</div>
			<div id="dig10" class="dig">
				10
			</div>
			<div id="dig11" class="dig">
				11
			</div>
			<div id="dig12" class="dig">
				12
			</div>

			<div id="hour1" class="hour"></div>
			<div id="hour2" class="hour"></div>
			<div id="hour3" class="hour"></div>
			<div id="hour4" class="hour"></div>

			<div id="min1" class="min"></div>
			<div id="min2" class="min"></div>
			<div id="min3" class="min"></div>
			<div id="min4" class="min"></div>
			<div id="min5" class="min"></div>

			<div id="sec1" class="sec"></div>
			<div id="sec2" class="sec"></div>
			<div id="sec3" class="sec"></div>
			<div id="sec4" class="sec"></div>
			<div id="sec5" class="sec"></div>
			<div id="sec6" class="sec"></div>
		</div>

		<div class="wrapper">

			<!--
			Below we include the Login Button social plugin. This button uses
			the JavaScript SDK to present a graphical Login button that triggers
			the FB.login() function when clicked.
			-->

			<div class="container">
				<div class="element1">

					<fb:login-button scope="public_profile, email, user_likes, user_posts" onlogin="checkLoginState();"
					data-auto-logout-link="true"></fb:login-button>
				</div>
				<div class="element2" id="picture"></div>
				<div class="element3" id="name"></div>
			</div>
			<div class="container43tae4667">
				<div class="element11">
					<img src="images/twitter.jpg" style="width: 64px; height: 25px; cursor: pointer;" onclick="twitterFn();" />
				</div>
				<div class="element33" id="twitter-name">
					Please log into Twitter.
				</div>
			</div>
			<!--<div class="element">
			<a class="twitter-before"><span class="fontawesome-twitter"></span></a>
			<button class="twitter_signin" onclick="MM_openBrWindow('https://api.twitter.com/oauth/authorize?oauth_token=' + '<?php echo $_SESSION['token']; ?>', 'Twitter Login', 'scrollbars=yes,width=650,height=500')">
			Login Using Twitter
			</button>
			</div>-->
			<div class="container">
				<h2>Your most recent likes:</h2>
				<ul id="userLikes"></ul>
				<br />
				<h2>Your most recent posts:</h2>
				<ul id="userPosts"></ul>
				<br />
				<h2>Your most recent Tweets:</h2>
				<div id="twitter"></div>
				<button onclick="stopTweets()">
					Stop Tweets
				</button>
				<ul id="search-container"></ul>
				<br />
				<br />
				<br />
				<div class="music" id="music"></div>
			</div>

			<script>
				var accessToken,
				    timeStart,
				    timer,
				    keepChecking = true,
				    timeOut = 0,
				    checkedPosts = 0,
				    checkedTweets = 0,
				    tweets,
				    page = null,
				    noPosts = false,
				    likes = [],
				    posts = [],
				    videos = [];

				function MM_openBrWindow(theURL, winName, features) {
					var left = (screen.width / 2) - (650 / 2);
					var top = (screen.height / 2) - (500 / 2);
					window.open(theURL, winName, features + ', top=' + top + ', left=' + left);
				}

				// This is called with the results from from FB.getLoginStatus().
				function statusChangeCallback(response) {
					//console.log('statusChangeCallback');
					console.log(response);
					// The response object is returned with a status field that lets the
					// app know the current login status of the person.
					// Full docs on the response object can be found in the documentation
					// for FB.getLoginStatus().
					if (response.status === 'connected') {
						// Logged into your app and Facebook.
						likes = [];
						//posts = [];
						document.getElementById('userLikes').innerHTML = '';
						document.getElementById('userPosts').innerHTML = '';
						accessToken = response.authResponse.accessToken;
						lastHour = ((Date.parse(new Date())) / 1000) - 3600;
						getInfo();
						getPosts();
						//getLikes();
						console.log('rechecking fb posts ' + ++checkedPosts);
					} else if (response.status === 'not_authorized') {
						// The person is logged into Facebook, but not your app.
						var pic = document.getElementById('picture');
						pic.style.marginLeft = "0px";
						pic.innerHTML = "";
						document.getElementById('name').innerHTML = 'Please log ' + 'into this app.';
						document.getElementById('userLikes').innerHTML = '';
						document.getElementById('userPosts').innerHTML = '';
						likes = [];
						posts = [];
						videos = [];
						page = null;
						keepChecking = false;
						clearTimeout(timer);
					} else {
						// The person is not logged into Facebook, so we're not sure if
						// they are logged into this app or not.
						var pic = document.getElementById('picture');
						pic.style.marginLeft = "0px";
						pic.innerHTML = "";
						document.getElementById('name').innerHTML = 'Please log ' + 'into Facebook.';
						document.getElementById('userLikes').innerHTML = '';
						document.getElementById('userPosts').innerHTML = '';
						likes = [];
						posts = [];
						videos = [];
						page = null;
						keepChecking = false;
						//console.log('clearing Timeout');
						clearTimeout(timer);
					}
				}

				// This function is called when someone finishes with the Login
				// Button.  See the onlogin handler attached to it in the sample
				// code below.
				function checkLoginState() {
					FB.getLoginStatus(function(response) {
						keepChecking = true;
						statusChangeCallback(response);
					});
					if (keepChecking) {
						timer = setTimeout(function() {
							checkLoginState();
						}, 20000);
					}
				}


				window.fbAsyncInit = function() {
					FB.init({
						appId : '1524378157866761',
						cookie : true, // enable cookies to allow the server to access
						// the session
						xfbml : true, // parse social plugins on this page
						version : 'v2.5' // use graph api version 2.5
					});

					// Now that we've initialized the JavaScript SDK, we call
					// FB.getLoginStatus().  This function gets the state of the
					// person visiting this page and can return one of three states to
					// the callback you provide.  They can be:
					//
					// 1. Logged into your app ('connected')
					// 2. Logged into Facebook, but not your app ('not_authorized')
					// 3. Not logged into Facebook and can't tell if they are logged into
					//    your app or not.
					//
					// These three cases are handled in the callback function.

					FB.getLoginStatus(function(response) {
						statusChangeCallback(response);
					});

				};

				// Load the SDK asynchronously
				( function(d, s, id) {
						var js,
						    fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id))
							return;
						js = d.createElement(s);
						js.id = id;
						js.src = "//connect.facebook.net/en_US/sdk.js";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));

				// Here we run a very simple test of the Graph API after login is
				// successful.  See statusChangeCallback() for when this call is made.
				function getInfo() {
					//console.log('Welcome!  Fetching your information.... ');
					FB.api('/me?fields=name,picture', function(response) {
						console.log('Successful login for: ' + response.name);
						var pic = document.getElementById('picture');
						pic.style.marginLeft = "5px";
						pic.innerHTML = ('<img src=' + response.picture.data.url + ' /> ');
						document.getElementById('name').innerHTML = response.name + '!';
					});
				}

				function getLikes() {
					//console.log('Getting your likes...');
					FB.api('/me/likes?access_token=' + accessToken + '&limit=5', 'GET', {}, function(response) {
						if (JSON.stringify(response.data) === '[]') {
							console.log('no new likes');
							return 'empty';
						} else {
							for ( i = 0; i < response.data.length; i++)
								likes.push(JSON.stringify(response.data[i].name));
							document.getElementById("userLikes").innerHTML = likes.toString();

							if ((page === null) || (page !== JSON.stringify(response.data[0].name))) {
								page = JSON.stringify(response.data[0].name);
								//search(page);
								moodyDictionary(page);
							}
							//console.log('got \'em likes');
						}
					});
				}

				function getPosts() {
					var storyUpdated = false,
					    messageUpdated = false,
					    skip = false;
					//noPosts = false;
					//console.log('Getting your posts...');
					FB.api('/me/posts?access_token=' + accessToken + '&since=' + lastHour, 'GET', {}, function(response) {
						if (JSON.stringify(response.data) === '[]') {
							console.log('no new posts since last hour');
							//noPosts = true;
							getLikes();
							return 'empty';
						} else {
							console.log("posts " + posts.length + " vs response " + response.data.length);
							if (posts.length != response.data.length && posts.length != 0) {
								for ( i = 0; i < response.data.length; i++) {
									if (posts.length > response.data.length) {
										for (var j = posts.length - 1; j >= 0; j--) {
											if (!(posts[j].includes(JSON.stringify(response.data[i].message))) || !(posts[j].includes(JSON.stringify(response.data[i].story))))
												posts.splice(j, 1);
											skip = true;
										}
									} else {
										for (var j = posts.length - 1; j >= 0; j--) {
											if (posts[j].indexOf(JSON.stringify(response.data[i].message)) > -1)
												messageUpdated = true;
											else if (posts[j].indexOf(JSON.stringify(response.data[i].story)) > -1)
												storyUpdated = true;
										}
										if (JSON.stringify(response.data[i].story === null)) {
											if (!messageUpdated) {
												posts.push(JSON.stringify(response.data[i].message));
											}
										} else if (JSON.stringify(response.data[i].message === null)) {
											if (!storyUpdated) {
												posts.push(JSON.stringify(response.data[i].story));
											}
										} else {
											if (!messageUpdated && !storyUpdated) {
												posts.push(JSON.stringify(response.data[i].message));
												posts.push(JSON.stringify(response.data[i].story));
											}
										}
									}
								}
								if ((!messageUpdated || !storyUpdated) && !skip) {
									//search(posts[posts.length - 1].toString());
									moodyDictionary(posts[posts.length - 1].toString());
									//loadMusic();
								}
							} else if (posts.length == 0) {
								for ( i = 0; i < response.data.length; i++) {
									if (JSON.stringify(response.data[i].story === null)) {
										posts.push(JSON.stringify(response.data[i].message));
									} else if (JSON.stringify(response.data[i].message === null))
										posts.push(JSON.stringify(response.data[i].story));
									else {
										posts.push(JSON.stringify(response.data[i].message));
										posts.push(JSON.stringify(response.data[i].story));
									}
								}
								//search(posts[posts.length - 1].toString());
								moodyDictionary(posts[posts.length - 1].toString());
								//loadMusic();
							}
							document.getElementById("userPosts").innerHTML = posts.toString();
							//console.log('got \'em posts');
						}
					});
				}

				function moodyDictionary(term) {
					var happy = ["happy", "magnificent", "fantastic", "marvelous", "happiness", "fulfilled", "amused", "blissful", "bliss", "lively", "party", "calm", "good", "sex", "cheerful", "smile", "chilled", "chill", "cool", "awesome", "laugh", "laughter", "sarcasm", "sarcastic", "great", "greatness", "feeling", "meeting", "date", "texting", "ecstatic", "energetic", "greeting", "thankful", "hyper", "impressed", "pleased", "friendship", "dorky", "giggle", "giggly", "grateful", "joyful", "optimistic", "peaceful", "relaxed", "relieved", "satisfied"];
					var love = ["love", "heart", "miss", "missing", "darling", "sweety", "valentine", "valentines", "sexy", "handsome", "gentleman", "roses", "flower", "girlfriend", "boyfriend", "husband", "wife", "lover", "chocolate", "gift", "marriage", "married", "wedding", "flirt", "flirty", "hotty", "hot", "loved", "naughty", "crush"]
					var sad = ["sad", "alone", "apathetic", "ashamed", "apologetic", "bored", "brooding", "bad", "sorry", "leaving", "dark", "depressed", "frustrated", "ugly", "discontent", "disappointed", "disappointment", "drunk", "broken", "pessimistic", "sick", "tired"];
					var angry = ["angry", "hell", "aggravated", "annoyed", "bitchy", "bittersweet", "mad", "fuck", "heartless", "cranky", "crappy", "crazy", "silly", "enemy", "enraged", "envious", "gloomy", "grumpy", "irritated", "infuriated", "jealous", "revenge", "vengeance", "moody", "snappy", "restless", "pissed", "piss", "uncomfortable"];
					var fear = ["fear", "anxious", "cautious", "chaotic", "tension", "stress", "scared", "pussy", "wuss", "chicken", "fearful", "haunted", "devil", "devious", "monster", "crocodile", "die", "dying", "death", "guilty"];
					var motivated = ["motivated", "workout", "inspired", "hard", "difficult", "tough", "challenging", "accepted", "successful", "accomplished", "fearless", "awake", "gym", "fearsome", "homework", "study", "project", "goals", "lecture", "lesson", "fight", "fighting", "lose", "determined", "hope", "hopeful"];

					var random = Math.floor((Math.random() * 3) + 1);
					//console.log(random);
					//console.log(searchStringInArray(term, happy));

					if (searchStringInArray(term, happy) !== false) {
						if (random === 1)
							search("like a g6");
						else if (random === 2)
							search("party rock");
						else if (random === 3)
							search(searchStringInArray(term, happy));
					} else if (searchStringInArray(term, love) !== false) {
						if (random === 1)
							search("love me like you do");
						else if (random === 2)
							search("international love");
						else if (random === 3)
							search(searchStringInArray(term, love));
					} else if (searchStringInArray(term, sad) !== false) {
						if (random === 1)
							search("stay with me");
						else if (random === 2)
							search("akon lonely");
						else if (random === 3)
							search(searchStringInArray(term, sad));
					} else if (searchStringInArray(term, angry) !== false) {
						if (random === 1)
							search("birdman y u mad");
						else if (random === 2)
							search("jealous");
						else if (random === 3)
							search(searchStringInArray(term, angry));
					} else if (searchStringInArray(term, fear) !== false) {
						if (random === 1)
							search("guts over fear");
						else if (random === 2)
							search("the fear");
						else if (random === 3)
							search(searchStringInArray(term, fear));
					} else if (searchStringInArray(term, motivated) !== false) {
						if (random === 1)
							search("nf motivated");
						else if (random === 2)
							search("rowland motivation");
						else if (random === 3)
							search(searchStringInArray(term, motivated));
					} else
						search(term);
				}

				function searchStringInArray(str, strArray) {
					var array = str.toLowerCase().split(' ');
					//console.log(array.toString());
					for (var i = 0; i < strArray.length; i++) {
						for (var j = array.length - 1; j >= 0; j--) {
						    //console.log(strArray[i] === array[j]);
							if (strArray[i] === array[j])
							    return strArray[i];
						}
					}
					return false;
				}

				//Standard Scroll Clock
				var H = '....';
				var H = H.split('');
				var M = '.....';
				var M = M.split('');
				var S = '......';
				var S = S.split('');
				var Ypos = 0;
				var Xpos = 0;
				var Ybase = 8;
				var Xbase = 8;
				var dots = 12;

				function clock() {
					var time = new Date();
					var secs = time.getSeconds();
					var sec = -1.57 + Math.PI * secs / 30;
					var mins = time.getMinutes();
					var min = -1.57 + Math.PI * mins / 30;
					var hr = time.getHours();
					var hrs = -1.57 + Math.PI * hr / 6 + Math.PI * parseInt(time.getMinutes()) / 360;
					for ( i = 0; i < dots; ++i) {
						document.getElementById("dig" + (i + 1)).style.top = 0 - 15 + 40 * Math.sin(-0.49 + dots + i / 1.9).toString() + "px";
						document.getElementById("dig" + (i + 1)).style.left = 0 - 14 + 40 * Math.cos(-0.49 + dots + i / 1.9).toString() + "px";
					}
					for ( i = 0; i < S.length; i++) {
						document.getElementById("sec" + (i + 1)).style.top = Ypos + i * Ybase * Math.sin(sec).toString() + "px";
						document.getElementById("sec" + (i + 1)).style.left = Xpos + i * Xbase * Math.cos(sec).toString() + "px";
					}
					for ( i = 0; i < M.length; i++) {
						document.getElementById("min" + (i + 1)).style.top = Ypos + i * Ybase * Math.sin(min).toString() + "px";
						document.getElementById("min" + (i + 1)).style.left = Xpos + i * Xbase * Math.cos(min).toString() + "px";
					}
					for ( i = 0; i < H.length; i++) {
						document.getElementById("hour" + (i + 1)).style.top = Ypos + i * Ybase * Math.sin(hrs).toString() + "px";
						document.getElementById("hour" + (i + 1)).style.left = Xpos + i * Xbase * Math.cos(hrs).toString() + "px";
					}
					setTimeout(clock, 50);
				}

				var twitterFn = function() {
				    document.getElementById("twitter-name").innerHTML = 'Welcome Fuad Zeyad Tareq';
					$.ajax({
						url : 'twitter.php',
						success : function(data) {
							$('#twitter').html(data);
							console.log('rechecking tweets ' + ++checkedTweets);
							if (localStorage.getItem("tweet") === null) {
								console.log("no new tweets");
								return "empty";
							} else if ((tweets === null) || (tweets !== localStorage.getItem("tweet"))) {
								tweets = localStorage.getItem("tweet");
								//search(tweets);
								moodyDictionary(tweets);
							}
							timeOut = setTimeout(function() {
								twitterFn();
							}, 20000);
						}
					});
				}
				//twitterFn();

				function stopTweets() {
					clearTimeout(timeOut);
					timeOut = 0;
					document.getElementById("twitter").innerHTML = '';
					document.getElementById("twitter-name").innerHTML = 'Please Log into Twitter.';
				}

				var loadMusic = function() {
					deleteMusic(localStorage.getItem("noQuotes").replace(new RegExp("\"", "g"), ''));
					console.log("loadMusic: " + localStorage.getItem("noQuotes").replace(new RegExp("\"", "g"), ''));
					$.ajax({
						async : true,
						url : 'music.php?v=' + localStorage.getItem("noQuotes").replace(new RegExp("\"", "g"), ''),
						success : function(data) {
							$('.music').html(data);
						}
					});
				}
				var deleteMusic = function(fileID) {
					$.ajax({
						url : 'delete.php?fileID=' + fileID,
						success : function(response) {
							console.log("Music Files Deleted");
						},
						error : function() {
							alert("There are no files to delete");
						}
					});
				}
				// After the API loads, call a function to enable the search box.
				function handleAPILoaded() {
					//$('#search-button').attr('disabled', false);
					console.log('Loaded youtube API');
				}

				// Search for a specified string.
				function search(query) {
					videos = [];
					var q = query;
					var request = gapi.client.youtube.search.list({
						q : q,
						part : 'snippet',
						regionCode : 'US',
						type : 'video',
						videoCategoryId : '10'
					});

					request.execute(function(response) {
						for ( i = 0; i < response.result.items.length; i++) {
							videos.push(JSON.stringify(response.result.items[i].id.videoId));
						}
						//$('#search-container').html(videos.toString());
						localStorage.setItem("noQuotes", videos[0].toString());
						loadMusic();
					});
				}
			</script>
			<div class="push"></div>
		</div>
		<div class="wrapper">
			<div class="footer">
				<a href="/privacy_policy.html" class="iubenda-black iubenda-embed" title="Privacy Policy">Privacy Policy</a>
				<script type="text/javascript">
					(function(w, d) {
						var loader = function() {
							var s = d.createElement("script"),
							    tag = d.getElementsByTagName("script")[0];
							s.src = "policy.js";
							tag.parentNode.insertBefore(s, tag);
						};
						if (w.addEventListener) {
							w.addEventListener("load", loader, false);
						} else if (w.attachEvent) {
							w.attachEvent("onload", loader);
						} else {
							w.onload = loader;
						}
					})(window, document);
				</script>
			</div>
		</div>
	</body>
	</body>
</html>