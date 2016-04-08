<html>
	<head>
		<link rel="stylesheet" href="layout.css" type="text/css" charset="utf-8" />
	</head>
	<body>
		<pre>
        <p>
            <?php
            require_once 'vendor/autoload.php';
            ini_set('max_execution_time', 900);
            //900 seconds = 15 minutes

            Unirest\Request::verifyPeer(false);
            $url = 'https://www.youtube.com/watch?v='.$_GET['v'];
            echo $url;

            $data = array("url" => "$url");

            $body = Unirest\Request\Body::form($data);

            $response = Unirest\Request::post("https://savedeo.p.mashape.com/download", array("X-Mashape-Key" => "DcXQAk6C9jmshu1tdUmGtpd5QslWp1KEY3ajsna7xnw7ZIcTGh", "Content-Type" => "application/x-www-form-urlencoded", "Accept" => "application/json"), $body);
            $counter = 0;
            $formats = $response -> body -> formats;
            echo '<br />'.$response -> headers['X-RateLimit-requests-Remaining'].'<br />';
            for ($i = 0; $i < sizeof($formats); $i++) {
                if (($formats[$i] -> format) == 'audio only') {
                    if (($formats[$i] -> ext) == "webm") {
                        $counter++;
                        if ($counter == 1) {
                            $ctx = stream_context_create();
                            stream_context_set_params($ctx, array('notification' => 'stream_notification_callback'));
                            $fp = fopen(trim(($formats[$i] -> url), " "), 'r', false, $ctx);
                            if (is_resource($fp) && file_put_contents('music/file'.$_GET['v'].'.webm', $fp)) {
                                echo "\nDone!\n";
                                //file_put_contents("music/file$i.webm", fopen(trim(($formats[$i] -> url), " "), 'r'), null, $ctx);
                                /*echo ' <audio controls autoplay>
                               <source src="music/file' . $i . '.webm" type="audio/webm">
                               Your browser does not support the audio element.
                               </audio> ';*/
                               echo '<audio controls autoplay>
                               <source src="music/file' . $_GET['v'] . '.webm" type="audio/webm">
                               Your browser does not support the audio element.
                               </audio>';
                                exit(0);
                            }
                            $err = error_get_last();
                            echo "\nErrrrrorr..\n", $err["message"], "\n";
                            exit(1);
                        } /*else {
                         file_put_contents("music/file$i.webm", fopen(trim(($formats[$i] -> url), " "), 'r'));
                         echo ' <audio controls autoplay>
                         <source src="music/file' . $i . '.webm" type="audio/webm">
                         Your browser does not support the audio element.
                         </audio> ';
                         }
                         //echo ($formats[$i] -> ext);
                         }*/
                    }
                    echo '<br />';
                }
            }
            //print_r($response -> body -> formats);

            function stream_notification_callback($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max) {
                static $filesize = null;

                switch($notification_code) {
                    case STREAM_NOTIFY_RESOLVE :
                    case STREAM_NOTIFY_AUTH_REQUIRED :
                    case STREAM_NOTIFY_COMPLETED :
                    case STREAM_NOTIFY_FAILURE :
                    case STREAM_NOTIFY_AUTH_RESULT :
                        /* Ignore */
                        break;

                    case STREAM_NOTIFY_REDIRECTED :
                        //echo "Being redirected to: ", $message, "\n";
                        break;

                    case STREAM_NOTIFY_CONNECT :
                        echo "Connected...\n";
                        break;

                    case STREAM_NOTIFY_FILE_SIZE_IS :
                        $filesize = $bytes_max;
                        echo "Filesize: ", $filesize, "\n";
                        break;

                    case STREAM_NOTIFY_MIME_TYPE_IS :
                        echo "Mime-type: ", $message, "\n";
                        break;

                    case STREAM_NOTIFY_PROGRESS :
                        if ($bytes_transferred > 0) {
                            if (!isset($filesize)) {
                                //printf("\rUnknown filesize.. %2d kb done..", $bytes_transferred / 1024);
                            } else {
                                $length = (int)(($bytes_transferred / $filesize) * 100);
                                //printf("\r[%-100s] %d%% (%2d/%2d kb)", str_repeat("=", $length) . ">", $length, ($bytes_transferred / 1024), $filesize / 1024);
                            }
                        }
                        break;
                }
            }
            ?>
        </p>
        </pre>
	</body>
</html>