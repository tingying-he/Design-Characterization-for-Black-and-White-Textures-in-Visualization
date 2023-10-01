<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>


    <!--lib for getting browser information-->
    <script type="text/javascript" src="../lib/bowser-2.4.0-es5.js"></script>
    <!--<script src="../lib/bootstrap.min.js"></script>-->

    <script type="text/javascript" src="../lib/jquery.min.js"></script>

    <link rel="stylesheet" href="../lib/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="texture_style.css">

    <script type="module" src="../tools/init-index.js"></script>

    <script src="../tools/loading.js"></script>

    <script src="texture_constants.js"></script>

    <script type = "text/javascript" >
        //when you click the back button of the browser, this script prevent you from going bac
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
</head>
<body>
<div class="container textContent">
    <div class="row">
        <div class="col">
            <div class="content">
                <h2>Welcome</h2>
                <p>
                    You are being invited to participate in a study titled <b>“Design Characterization for Black-and-White Textures in Visualization.”</b> This study is conducted by Tingying He, Petra Isenberg, and Tobias Isenberg from Inria and the University Paris-Saclay (France).
                </p>
                <p>
                    The purpose of this study is to explore how to use black-and-white texture in visual data representations, like in the following historic examples:
                </p>
                <p>
                    <img src="../img/welcome_teaser.png" alt="Charts with black and white textures" style="width:90%;">
                </p>
                <p>
                    Please ensure that you are opening this experiment with the <b>Chrome</b> browser. You cannot navigate back to previous pages.
                </p>
<!--                <p>-->
<!--                    Your current browser windows has the size <span id="welcome_window_width"></span>px x <span id="welcome_window_height"></span>px. <span id="welcome_window_size_warning"></span>-->
<!--                </p>-->
<!--                <p>-->
<!--                    The minimum screen size for this study is 1920px * 1080px. Normally most laptops (except the small Chromebooks, the old small MacBooks, and some other small-screen laptops) and desktops meet this requirement; however, all smartphones and most tablets will NOT meet the requirement.-->
<!--                </p>-->
                <p>Please respond to this study only if you:</p>
                <ul>
                    <li>are a fluent  speaker of English,</li>
                    <li>are of legal age (18 years in most countries), and</li>
                    <li>consider yourself experienced on the topic of visualization and in design.</li>
                </ul>
                <p>This experiment will take around 25 minutes. </p>

                <p>
                    We thank you for your interest in participating in this study. Please click the "Next" button below to proceed to the informed consent.
                </p>

                <button id="welcome_next_btn" class="btn btn-primary float-end">Next</button>



            </div>
            <div id="zoom-message" class="wrong-message">
                <br/><h1>This experiment requires at least a 100% zoom level</h1>
                <p id="zoom">Your current zoom is <span id=zoomValue></span>%.</p>
                <p>Please, zoom in the page until this message disappears.<br>
                    You can also press Ctrl+0 (on Windows or Linux) or Cmd+0 (on Macos) to reset the zoom.</p>
            </div>
            <div id="dimension-message" class="wrong-message">
                <br/><h1>Your browser window does not fit the study screen</h1>
                <canvas id="windowsize" width="350px" height="200px"></canvas>
                <p>It may be happening because your browser window is too small or the page is zoomed in.</p>
                <p>Please resize your window until this message disappears or zoom out the page.</p>
            </div>

            <div id="browser-message" class="wrong-message" style="display: none">
                <p>We apologize for the inconvenience, but please note that this experiment requires the use of the <b>Chrome</b> browser.  </p>
                <p>If you are currently not using <b>Chrome</b>, please switch to it in order to proceed with the experiment.</p>
            </div>

            </div>
        </div>
    </div>




</div>
</body>
</html>



<script>
    //check the window size of the browser
    // document.getElementById('welcome_window_width').innerHTML = window.innerWidth
    // document.getElementById('welcome_window_height').innerHTML = window.innerHeight

    // if(window.innerWidth > min_window_width && window.innerHeight > min_window_height){
    //     document.getElementById('welcome_window_size_warning').innerHTML = 'This is great, your window is large enough.'
    // }else{
    //     document.getElementById('welcome_window_size_warning').innerHTML ='This is too small, please resize it to be at least'+min_window_width+'px * '+min_window_height+'px and then reload this study to check.'
    // }

    //set measurements
    let measurements = {}

    if(localStorage.getItem('measurements')){
        //if there exists measurements, get it from localStorage
        measurements_existing = JSON.parse(localStorage.getItem('measurements'))

        //If starting from the Welcome page, only the participant_id and trial_num are inherited
        measurements['participant_id'] = measurements_existing['participant_id']
        measurements['trial_num'] = measurements_existing['trial_num']

    }else{
        // if there does not exist measurement
        // create a participant_id
        let participant_id = Math.floor(Math.random()*100000000000000000)
        measurements['participant_id'] = participant_id
        //set trial_num = 0
        measurements['trial_num'] = 0
    }

    //get browserInfo and write to measurements
    let browserInfo = bowser.getParser(window.navigator.userAgent);
    measurements["browser_name"] = browserInfo.getBrowserName();
    measurements["browser_version"] = browserInfo.getBrowserVersion();
    measurements["os"] = browserInfo.getOSName();
    measurements['os_version'] = browserInfo.getOSVersion();


    //get window size and write to measurements
    measurements['window_width'] = window.innerWidth
    measurements['window_height'] = window.innerHeight

    //assign conditions
    let condition_texture = Math.floor(Math.random() * 2) //0-geo_icon; 1-icon_geo
    let condition_chart = Math.floor(Math.random() * 3) //0-bar; 1-pie; 2-map

    console.log('condition_texture:'+ condition_texture)
    console.log('condition_chart:'+ condition_chart)

    measurements['condition_texture'] = condition_texture
    measurements['condition_chart'] = condition_chart

    //timestamp of starting the experiment
    measurements["timestamp_welcome"] = Date.now()

    let date = new Date();
    let y = date.getFullYear();
    let m = date.getMonth() + 1;
    let d = date.getDate();
    let h = date.getHours();
    let min = date.getMinutes();
    let s = date.getSeconds();

    // add leading zeros if necessary
    if (m < 10) m = '0' + m;
    if (d < 10) d = '0' + d;
    if (h < 10) h = '0' + h;
    if (min < 10) min = '0' + min;
    if (s < 10) s = '0' + s;

    let yymmdd = y + '' + m + '' + d;
    let hhmmss = h + ':' + min + ':' + s;

    let formattedDate = yymmdd + ' ' + hhmmss;

    measurements["formatted_data_welcome"] = formattedDate
    console.log("formatted_data_welcome:"+formattedDate); // output: e.g. "20230208 14:33:47"

    //control tutorial: show full tutorial, show only halo tutorial or do not show tutorial
    localStorage.setItem('only_halo_tutorial', '0') //0: show full tutorial; 1: show only halo tutorial; -1: no tutorial

    document.getElementById('welcome_next_btn').onclick = function(){
        //update measurements to localStorage
        localStorage.setItem('measurements', JSON.stringify(measurements))

        //jump to next page
        window.location.href = 'consent.php'
    }




</script>
