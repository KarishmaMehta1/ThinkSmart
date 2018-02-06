<!DOCTYPE html>
<html>
<head></head>
<body>
    <pre>
        <?php
            $ip = $_SERVER['REMOTE_ADDR'];
            $userdata = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$ip");
            $userLoc = "";
            if(!empty($userdata->geoplugin_region)&&!empty($userdata->geoplugin_city))
            {
                $userLoc = $userdata->geoplugin_city.", ".$userdata->geoplugin_region.", ".$userdata->geoplugin_countryName;
                //print "Your Location: ".$userdata->geoplugin_city.", ".$userdata->geoplugin_region.", ".$userdata->geoplugin_countryName."<br>";
            }
            elseif(!empty($userdata->geoplugin_region))
            {
                $userLoc = $userdata->geoplugin_region.", ".$userdata->geoplugin_countryName;
                //print "Your Location: ".$userdata->geoplugin_region.", ".$userdata->geoplugin_countryName."<br>";
            }
            else
            {
                $userLoc = $userdata->geoplugin_countryName;
                //print "Your Location: ".$userdata->geoplugin_countryName."<br>";
            }
            //  print "Your Latitude: ".$userdata->geoplugin_latitude."&nbsp; &nbsp;Your Longitude: ".$userdata->geoplugin_longitude."<br>";

            function getBrowser()
            {
                $u_agent = $_SERVER['HTTP_USER_AGENT'];
                $bname = 'Unknown';
                $platform = 'Unknown';
                $version= "";

                //First get the platform?
                if (preg_match('/linux/i', $u_agent))
                {
                    $platform = 'linux';
                }
                elseif (preg_match('/macintosh|mac os x/i', $u_agent))
                {
                    $platform = 'mac';
                }
                elseif (preg_match('/windows|win32/i', $u_agent))
                {
                    $platform = 'windows';
                }

                // Next get the name of the useragent yes seperately and for good reason
                if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
                {
                    $bname = 'Internet Explorer';
                    $ub = "MSIE";
                }
                elseif(preg_match('/Firefox/i',$u_agent))
                {
                    $bname = 'Mozilla Firefox';
                    $ub = "Firefox";
                }
                elseif(preg_match('/Chrome/i',$u_agent))
                {
                    $bname = 'Google Chrome';
                    $ub = "Chrome";
                }
                elseif(preg_match('/Safari/i',$u_agent))
                {
                    $bname = 'Apple Safari';
                    $ub = "Safari";
                }
                elseif(preg_match('/Opera/i',$u_agent))
                {
                    $bname = 'Opera';
                    $ub = "Opera";
                }
                elseif(preg_match('/Netscape/i',$u_agent))
                {
                    $bname = 'Netscape';
                    $ub = "Netscape";
                }

                // finally get the correct version number
                $known = array('Version', $ub, 'other');
                $pattern = '#(?<browser>' . join('|', $known).')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
                if (!preg_match_all($pattern, $u_agent, $matches))
                {
                    // we have no matching number just continue
                }

                // see how many we have
                $i = count($matches['browser']);
                if ($i != 1)
                {
                    //we will have two since we are not using 'other' argument yet
                    //see if version is before or after the name
                    if (strripos($u_agent,"Version") < strripos($u_agent,$ub))
                    {
                        $version= $matches['version'][0];
                    }
                    else
                    {
                        $version= $matches['version'][1];
                    }
                }
                else
                {
                    $version= $matches['version'][0];
                }

                // check if we have a number
                if ($version==null || $version=="")
                {
                    $version="?";
                }

                return array(
                    'userAgent' => $u_agent,
                    'name'      => $bname,
                    'version'   => $version,
                    'platform'  => $platform,
                    'pattern'    => $pattern
                );
            }

            // now try it
            $ua=getBrowser();
            $winfn = explode("(",$ua['userAgent']);
            $win = explode(";",$winfn[1]);
            if($win[0] == "Windows NT 6.3")
            {
                $win[0] = "Windows 8.1";
            }
            if($win[0] == "Windows NT 6.2")
            {
                $win[0] = "Windows 8";
            }
            if($win[0] == "Windows NT 6.1")
            {
                $win[0] = "Windows 7";
            }
            if($win[0] == "Windows NT 6.3")
            {
                $win[0] = "Windows Vista";
            }
            if($win[0] == "Windows NT 5.2")
            {
                $win[0] = "Windows XP 64bit Edition";
            }
            if($win[0] == "Windows NT 5.1")
            {
                $win[0] = "Windows XP";
            }
            //$yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$win[0];
            //print "Your IP: ".$_SERVER['REMOTE_ADDR']."<br>";
            //print $yourbrowser."<br>";
            //print "You are Viewing File: ".$_SERVER['REQUEST_URI'];


        ?>
    </pre>
</body>
</html>