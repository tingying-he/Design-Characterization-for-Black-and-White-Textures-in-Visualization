<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<!--    <script type="text/javascript" src="../lib/jquery.min.js"></script>-->
<!--    <script type="text/javascript" src="../lib/d3.v7.min.js"></script>-->

    <link rel="stylesheet" href="../lib/bootstrap.css">
<!--    <link rel="stylesheet" type="text/css" href="texture_style.css">-->

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
    <div class="row">
        <div class="col">
            <div class="content">
                <h2>You just completed your first design. Congratulations!</h2>

                <p>You will now move to your 2nd and final design. </p>

                <p>This design will use a different set of textures than the ones you use before, but the interface is largely the same.</p>
                <button id="between_next_btn" class="btn btn-primary float-right">Start 2nd Design</button>
            </div>
        </div>
    </div>
</div>

<script>
    let measurements = JSON.parse(localStorage.getItem('measurements'))
    let condition_chart = measurements['condition_chart']
    let condition_texture = measurements['condition_texture']

    document.getElementById('between_next_btn').onclick = function(){
        //write data to measurements
        // measurements['timestamp_second_design_starts'] = Date.now()

        //update measurements to localStorage
        localStorage.setItem('measurements', JSON.stringify(measurements))

        //jump to next page
        switch (condition_chart) {
            case 0:
                switch (condition_texture){
                    case 0:
                        window.location.href = 'bar_icon.php';
                        break;
                    case 1:
                        window.location.href = 'bar_geo.php';
                        break;
                }
                break;
            case 1:
                switch (condition_texture){
                    case 0:
                        window.location.href = 'pie_icon.php';
                        break;
                    case 1:
                        window.location.href = 'pie_geo.php';
                        break;
                }
                break;
            case 2:
                switch (condition_texture){
                    case 0:
                        window.location.href = 'map_icon.php';
                        break;
                    case 1:
                        window.location.href = 'map_geo.php';
                        break;
                }
                break;
            default:
                console.log(`has problem with condition_chart`);
        }
    }
</script>

</body>
</html>
