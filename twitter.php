<?php session_start(); ?>
<html>
	<head>
		<link rel="stylesheet" href="layout.css" type="text/css" charset="utf-8" />
	</head>
	<body>
		<p>
			<?php
            // auth parameters
            $api_key = urlencode('6JEMm5vpiGwhG11UhGjPWayRS');
            // Consumer Key (API Key)
            $api_secret = urlencode('j05WdIO7JbagjbDGYh9LM8hEcJMBQ9S5u45gvSav0L65tFO1t7');
            // Consumer Secret (API Secret)
            $auth_url = 'https://api.twitter.com/oauth2/token';

            // what we want?
            $data_username = 'Courageous999';
            // username
            $data_count = 10;
            // number of tweets
            $data_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

            // get api access token
            $api_credentials = base64_encode($api_key . ':' . $api_secret);

            $auth_headers = 'Authorization: Basic ' . $api_credentials . "\r\n" . 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8' . "\r\n";

            $auth_context = stream_context_create(array('http' => array('header' => $auth_headers, 'method' => 'POST', 'content' => http_build_query(array('grant_type' => 'client_credentials', )), )));

            $auth_response = json_decode(file_get_contents($auth_url, 0, $auth_context), true);
            $auth_token = $auth_response['access_token'];
            $_SESSION['token'] = $auth_token;

            // get tweets
            $data_context = stream_context_create(array('http' => array('header' => 'Authorization: Bearer ' . $auth_token . "\r\n", )));

            $data = json_decode(file_get_contents($data_url . '?count=' . $data_count . '&screen_name=' . urlencode($data_username), 0, $data_context), true);

            print('<pre class="pre">');
            for ($i=0; $i<5; $i++) {
                print_r($data[$i]['text'].'<br />');
            }
        ?>
        <script>localStorage.setItem("tweet", "<?php echo $data[0]['text']; ?>")</script>
		</p>
	</body>
</html>
