<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You</title>

    <script type="text/javascript" src="../lib/jquery.min.js"></script>
    <script type="text/javascript" src="../lib/d3.v7.min.js"></script>

    <link rel="stylesheet" href="../lib/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="texture_style.css">

    <script src="../tools/loading.js"></script>

    <script type = "text/javascript" >
        //when you click the back button of the browser, this script prevent you from going bac
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
</head>
<body>
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <div class="content">
                <h2>Thank you!</h2>
                <p>Thanks a lot for your interest and your participation in our study. </p>
                <p>If you have any questions or general comments, do not hesitate to contact us:</p>

                <div align="justify" style="max-width: 100%; display: flex; margin-left: auto; margin-right: auto;">
                    <div align="justify" style="max-width: 30%; display: block; margin-left: 0; margin-right: auto;">
                        <p><strong>Tingying He</strong></p>

                        <p>PhD Student</p>

                        <p><a href="https://www.aviz.fr/Main/HomePage" target="_blank">AVIZ</a> Research Team</p>

                        <p>Université Paris-Saclay</p>

                        <p><a href="mailto:tingying.he@inria.fr?cc=petra.isenberg@inria.fr,tobias.isenberg@inria.fr&amp;subject=%5BTexture%20Design%5D%20Question%20about%20the%20experiment1">tingying.he@inria.fr</a></p>
                    </div>

                    <div align="justify" style="max-width: 30%; display: block; margin-left: 0; margin-right: auto;">
                        <p><strong>Petra Isenberg</strong></p>

                        <p>Senior Research Scientist</p>

                        <p><a href="https://www.aviz.fr/Main/HomePage" target="_blank">AVIZ</a> Research Team</p>

                        <p>Inria Saclay Île-de-France</p>

                        <p><a href="mailto:petra.isenberg@inria.fr?cc=tingying.he@inria.fr,tobias.isenberg@inria.fr&amp;subject=%5BTexture%20Design%5D%20Question%20about%20the%20experiment1">petra.isenberg@inria.fr</a></p>
                    </div>

                    <div align="justify" style="max-width: 30%; display: block; margin-left: 0; margin-right: auto;">
                        <p><strong><a href="https://tobias.isenberg.cc/" target="_blank">Tobias Isenberg</a></strong></p>

                        <p>Senior Research Scientist</p>

                        <p><a href="https://www.aviz.fr/Main/HomePage" target="_blank">AVIZ</a> Research Team</p>

                        <p>Inria Saclay Île-de-France</p>

                        <p><a href="mailto:tobias.isenberg@inria.fr?cc=tingying.he@inria.fr,petra.isenberg@inria.fr&amp;subject=%5BTexture%20Design%5D%20Question%20about%20the%20experiment1">tobias.isenberg@inria.fr</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <p>
            If you are interested in designing more charts with texture, please click one of the following buttons. If not, you could close this tab now.
        </p>
    </div>
    <div class="row">
        <div class="col">
            <p>Other charts:</p>
            <button id="new_trial_different_chart_btn0" class="btn btn-primary"></button>
            <button id="new_trial_different_chart_btn1" class="btn btn-primary"></button>
        </div>
        <div class="col">
            <p>Try again with the same chart:</p>
            <button id="new_trial_same_chart_btn" class="btn btn-primary"></button>
        </div>
    </div>
</div>

<script>
    // window.onload = function (){
        let measurements = JSON.parse(localStorage.getItem('measurements'))

    //     measurements["timestamp_end"] = Date.now()
    //
    // let date = new Date();
    // let y = date.getFullYear();
    // let m = date.getMonth() + 1;
    // let d = date.getDate();
    // let h = date.getHours();
    // let min = date.getMinutes();
    // let s = date.getSeconds();
    //
    // // add leading zeros if necessary
    // if (m < 10) m = '0' + m;
    // if (d < 10) d = '0' + d;
    // if (h < 10) h = '0' + h;
    // if (min < 10) min = '0' + min;
    // if (s < 10) s = '0' + s;
    //
    // let yymmdd = y + '' + m + '' + d;
    // let hhmmss = h + ':' + min + ':' + s;
    //
    // let formattedDate = yymmdd + ' ' + hhmmss;
    //
    // measurements["formatted_data_end"] = formattedDate
    //
    //
    //
    // //update measurements to localStorage
    //     localStorage.setItem('measurements', JSON.stringify(measurements))
    //
    //     //send json results to server
    //     $.ajax({
    //         url: '../ajax/results_json.php', //path to the script who handles this
    //         type: 'POST',
    //         data: JSON.stringify(measurements),
    //         contentType: 'application/json',
    //         dataType: "json",
    //         success: function (data) {
    //             console.log('success')
    //         }
    //     })
    //
    //     //send csv results to server
    //     $.ajax({
    //         url: '../ajax/results_csv.php', //path to the script who handles this
    //         type: 'POST',
    //         data: JSON.stringify(measurements),
    //         contentType: 'application/json',
    //         success: function (data) {
    //             console.log('success')
    //         }
    //     })
    // }


    let trial_num = measurements['trial_num']
    measurements['trial_num'] = trial_num + 1 // Whenever the end page is reached, it indicates that a trial has been completed.

    // let measurements = JSON.parse(localStorage.getItem('measurements'))

    let condition_chart = measurements['condition_chart']
    let condition_texture = measurements['condition_texture']
    // let trial_num = measurements['trial_num']

    let new_trial_same_chart_btn = document.getElementById('new_trial_same_chart_btn')
    let new_trial_different_chart_btn0 = document.getElementById('new_trial_different_chart_btn0')
    let new_trial_different_chart_btn1 = document.getElementById('new_trial_different_chart_btn1')


    //clean the old responses data in measurements

    //record parameters for new trial in measurements
    measurements['condition_texture'] = Math.floor(Math.random() * 2) //0-geo_icon; 1-icon_geo

    switch (condition_chart){
        case 0: //already designed a bar chart
            new_trial_same_chart_btn.innerHTML = 'Design Another Bar Chart'
            new_trial_different_chart_btn0.innerHTML = 'Design A Pie Chart'
            new_trial_different_chart_btn1.innerHTML = 'Design A Map'

            //design another bar chart
            new_trial_same_chart_btn.onclick = function (){
                measurements['condition_chart'] = 0 //set condition_chart to 0 (bar chart)

                localStorage.setItem('measurements', JSON.stringify(measurements))

                window.location.href = 'tutorial.php'
            }

            //design a pie chart
            new_trial_different_chart_btn0.onclick = function (){
                measurements['condition_chart'] = 1 //set condition_chart to 1 (pie chart)

                localStorage.setItem('measurements', JSON.stringify(measurements))

                if(localStorage.getItem('only_halo_tutorial') == 0){ //only_halo_tutorial status: -1: all tutorials have shown; 0: halo tutorial has not been shown; 1: need to show halo tutorial.
                    localStorage.setItem('only_halo_tutorial', '1') //since bar chart does not have halo, we need a small tutorial to introduce halo
                }


                window.location.href = 'tutorial.php'
            }

            new_trial_different_chart_btn1.onclick = function (){
                measurements['condition_chart'] = 2 //set condition_chart to 2 (map)

                localStorage.setItem('measurements', JSON.stringify(measurements))

                if(localStorage.getItem('only_halo_tutorial') == 0){
                    localStorage.setItem('only_halo_tutorial', '1') //since bar chart does not have halo, we need a small tutorial to introduce halo
                }

                window.location.href = 'tutorial.php'
            }
            break
        case 1: //already designed a pie chart
            new_trial_same_chart_btn.innerHTML = 'Design Another Pie Chart'
            new_trial_different_chart_btn0.innerHTML = 'Design A Bar Chart'
            new_trial_different_chart_btn1.innerHTML = 'Design A Map'

            localStorage.setItem('only_halo_tutorial', '-1') //the participant who has designed a pie chart should already have seen all tutorial, we do not need to show them halo tutorial anymore

            new_trial_same_chart_btn.onclick = function (){
                measurements['condition_chart'] = 1 //set condition_chart to 1 (pie chart)

                localStorage.setItem('measurements', JSON.stringify(measurements))

                window.location.href = 'tutorial.php'
            }

            new_trial_different_chart_btn0.onclick = function (){
                measurements['condition_chart'] = 0 //set condition_chart to 0 (bar chart)

                localStorage.setItem('measurements', JSON.stringify(measurements))

                window.location.href = 'tutorial.php'
            }

            new_trial_different_chart_btn1.onclick = function (){
                measurements['condition_chart'] = 2 //set condition_chart to 2 (map)

                localStorage.setItem('measurements', JSON.stringify(measurements))

                window.location.href = 'tutorial.php'
            }
            break
        case 2: //already designed a map
            new_trial_same_chart_btn.innerHTML = 'Design Another Map'
            new_trial_different_chart_btn0.innerHTML = 'Design A Bar Chart'
            new_trial_different_chart_btn1.innerHTML = 'Design A Pie Chart'

            localStorage.setItem('only_halo_tutorial', '-1') //the participant who has designed a map should already have seen all tutorial, we do not need to show them halo tutorial anymore

            new_trial_same_chart_btn.onclick = function (){
                measurements['condition_chart'] = 2 //set condition_chart to 2 (map)
                localStorage.setItem('measurements', JSON.stringify(measurements))

                window.location.href = 'tutorial.php'
            }

            new_trial_different_chart_btn0.onclick = function (){
                measurements['condition_chart'] = 0 //set condition_chart to 0 (bar chart)

                localStorage.setItem('measurements', JSON.stringify(measurements))

                window.location.href = 'tutorial.php'
            }

            new_trial_different_chart_btn1.onclick = function (){
                measurements['condition_chart'] = 1 //set condition_chart to 1 (pie chart)

                localStorage.setItem('measurements', JSON.stringify(measurements))

                window.location.href = 'tutorial.php'
            }
            break
        default:
            console.log('has problem with condition_chart')
    }

</script>

</body>
</html>

