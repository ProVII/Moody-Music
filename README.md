# Welcome to Moody Music
This readme file provides you with any instructions necessary to run this application and makes it easier to understand.

### Running the application
You can test the application live from: http://moodymusic.mybluemix.net
This application is very simple to use, once published, all you really need to do is to login (and accept permissions) to facebook and/or twitter and it will automatically start retrieving your status/tweet updates and you'll enjoy music.

Unfortunately, this is not the case right now since the application is not published. Anyone who'd like to use this application, would've to be pre-authorized within the app's facebook/twitter page. Therefore, you've 3 options from here:
  1. Contact us with a link to your facebook page, and we'll approve you on the app's page as a tester, which will send a notification for you to accept. (Recommended)
   1. Now you're able to test the app with facebook, but not twitter (there's no login functionality implemented for twitter yet).
  2. Here's the longer option. Basically any twitter/facebook status update goes through the Moody Dictionary algorithm, therefore, you can edit the script (you can add it on the first line of the script) within the index page body, and simply add a hardcoded custom call to that algorithm with any quote you wanna try, 
   1. Here's an example: `moodyDictionary("This is a test post, I'm feeling good today")`.
  
  Seems simple so far right? Here's the problem, to get to this step, you'd need to download this code and run it locally with a server of your own, like Apache server. If you've that setup, then you're good to go.
  3. This is the longest choice, assuming you can do step 2, then you may proceed further if you like. Basically, now you can go further to create your own facebook application on the Developer Console, ensure you type the correct Application/Callback URL (i.e. localhost). Once successful, just copy the ID from your application onto the line that says`appId` within the `fbAsyncInit()` function, which you can find within the index page. VOILA !!! Now you've successfully enabled your own facebook.
   1. If you'd like to also enable twitter for your own timeline, you gotta head to their Developer Console as well and create your own app. Once successful, retrieve the api key and secret, head to `twitter.php` and paste each one within its respective line (i.e. where it says `$api_key = urlencode('paste your api key here')` and `$api_secret = urlencode('paste your api secret here')`). Finally, to change to your own twitter username, `$data_username = 'Username'`, add your usernmae  within the quotes on that line. VOILA !!! Now you've successfully added your own twitter timeline to the app.

### License
Please view the LICENSE.md file, this application code is copyrighted.
