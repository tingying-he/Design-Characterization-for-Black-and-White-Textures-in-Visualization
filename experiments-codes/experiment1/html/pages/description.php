<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Description</title>

    <script type="text/javascript" src="../lib/jquery.min.js"></script>


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
<div class="container textContent">
    <div class="row">
        <div class="col">
            <div class="content">
                <h2>Description</h2>
                <p><br/>
                    Textures can be used to represent categories of data in charts or maps. There are different types of textures we want to explore:
                </p>
                <p>
                    <b>Geometric textures</b> are textures made up of points and lines. They have been used for centuries in print. Here are some examples:
                </p>
                <p>
                    <img src="../img/description_geo_texture.svg" alt="Geometric texture" style="height: 100px;">
                </p>
                <p>
                    <b>Iconic textures</b> resemble the data they stand for. Here are some examples of textures for vegetables:
                </p>
                <p>
                    <img src="../img/description_icon_texture.svg" alt="Geometric texture" style="height: 100px;">
                </p>
                <p>
                    In this experiment, you will design a <span id="chart_type"></span>, once with geometric textures and once with iconic textures. We would like to ask you to parameterize the textures appropriately for an effective visualization with our texture design tool.
                </p>
                <p>
                    Before the experiment, let’s first go through a tutorial to get familiar with the interface and interaction of the texture design tool.
                </p>

                <button id="description_next_btn" class="btn btn-primary float-end">Go To Tutorial</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    let measurements = JSON.parse(localStorage.getItem('measurements'))

    let condition_chart = measurements['condition_chart']

    switch (condition_chart) {
        case 0:
            document.getElementById('chart_type').innerHTML='bar chart'
            break;
        case 1:
            document.getElementById('chart_type').innerHTML='pie chart'
            break;
        case 2:
            document.getElementById('chart_type').innerHTML='geographic map'
            break;
        default:
            console.log(`has problem with condition_chart`);
    }


    document.getElementById('description_next_btn').onclick = function(){
        window.location.href = 'tutorial.php';
    }
</script>

</body>
</html>
