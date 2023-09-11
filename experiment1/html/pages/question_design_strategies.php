<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Design Strategies</title>

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
    <div class="row">
        <div class="col">
            <h2>Design Strategies</h2>
            <p>
                You have completed the design of two charts, thanks a lot! Here are your two designs and some questions about your design strategies.
            </p>
            <p>
                When you are done, click the <span style="color:#1E90FF;font-weight: bold">Next</span> button in the bottom right of the page.
            </p>

            <div class="alert alert-info already_answered_before" role="alert" style="display: none">
                If you have answered these questions before and your answer has not changed, please just click:
                <button id="strategy_same_answer_btn" class="btn btn-outline-dark btn-sm">Same As Before</button>
            </div>
        </div>
    </div>
    <div class="row" style="height: 600px">
        <div class="col">
            <div id="charts" style="width: 100%;height: 600px">
                <div id="chart0Div" style="position:relative"></div>
                <div id="chart1Div" style="position:relative;left:600px"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="content">
                <div class="mb-3">
                    <label for="strategy_goal"
                           class="form-label"
                    >
                        1. What kind of <b>goals</b> did you want to achieve when you designed the representation?
                    </label>
                    <textarea
                            class="form-control"
                            id= "strategy_goal"
                            rows="4"
                            cols="80"
                            placeholder="Please write your answer here."
                    ></textarea>
                </div>

                <div id="strategy_first_design_div"
                     class="mb-3"
                >
                    <label for="strategy_first_design_textarea"
                           class="form-label"
                    >
                        2. When you chose the parameters for the <b><span id="first_design_texture_name"></span> textures</b>, did you use any methods or principles?
                    </label>
                </div>

                <div id="strategy_second_design_div"
                     class="mb-3"
                >
                    <label for="strategy_second_design_textarea"
                           class="form-label"
                    >
                        3. When you chose the parameters for the <b><span id="second_design_texture_name"></span> textures</b>, did you use any methods or principles?
                    </label>
                </div>

                <button id="strategy_next_btn" class="btn btn-primary float-end" disabled>Next</button>
            </div>
        </div>
    </div>
</div>

<script src="texture_functions.js"></script>
<script src="texture_constants.js"></script>

<script>

    let nextBtn = document.getElementById('strategy_next_btn')

    let measurements = JSON.parse(localStorage.getItem('measurements'))

    //show the <div> to tell participant they can just answer "same" if they have already done a trial before
    if(measurements['trial_num'] > 0){
        document.querySelectorAll('.already_answered_before').forEach(function(el) {
            el.style.display = 'block';
        })
    }

    let condition_chart = measurements['condition_chart']
    let condition_texture = measurements['condition_texture']
    let condition_chart_name
    let condition_texture_name0
    let condition_texture_name1

    let geo_chart = -1
    let icon_chart = -1
    switch (condition_texture) {
        case 0: //geo-icon
            for(let i = 0; i < document.getElementsByClassName('two_texture_types').length; i++){
                document.getElementsByClassName('two_texture_types')[i].innerHTML='geometric texture and iconic texture'
            }
            geo_chart = 'chart0'
            icon_chart = 'chart1'
            condition_texture_name0 = 'geo'
            condition_texture_name1 = 'icon'
            break;
        case 1: //icon-geo
            for(let i = 0; i < document.getElementsByClassName('two_texture_types').length; i++){
                document.getElementsByClassName('two_texture_types')[i].innerHTML='iconic texture and geometric texture'
            }
            geo_chart = 'chart1'
            icon_chart = 'chart0'

            condition_texture_name0 = 'icon'
            condition_texture_name1 = 'geo'
            break;
        default:
            console.log(`has problem with condition_texture`);
    }


</script>
<script src="texture_ui_elements.js"></script>
<script>
    drawChartDiv('chart0Div', svgWidth, svgHeight, 'chart0')
    drawChartDiv('chart1Div', svgWidth, svgHeight, 'chart1')

    switch (condition_chart) {
        case 0: //bar
            condition_chart_name = 'bar'
            geo_parametersList = JSON.parse(localStorage.getItem("barGeoparametersList") || "[]")
            geo_parameters = geo_parametersList[geo_parametersList.length - 1]

            icon_parametersList = JSON.parse(localStorage.getItem("barIconparametersList") || "[]")
            icon_parameters = icon_parametersList[icon_parametersList.length - 1]

            para_geoTextures(d3.select('#chart0'),fruits, geo_parameters, 'para')
            para_iconTextures(d3.select('#chart0'), fruits, icon_parameters, 'para')

            drawGeoBarWithTextureFromParameters(defaultDataset, geo_chart, barWidth, barHeight, geo_parameters, 'para')
            drawIconBarWithTextureFromParameters(defaultDataset, icon_chart, barWidth, barHeight, icon_parameters, 'para')

            break;
        case 1: //pie
            condition_chart_name = 'pie'
            geo_parametersList = JSON.parse(localStorage.getItem("pieGeoparametersList") || "[]")
            geo_parameters = geo_parametersList[geo_parametersList.length - 1]

            icon_parametersList = JSON.parse(localStorage.getItem("pieIconparametersList") || "[]")
            icon_parameters = icon_parametersList[icon_parametersList.length - 1]

            para_geoTextures(d3.select('#chart0'),fruits, geo_parameters, 'para')
            para_iconTextures(d3.select('#chart0'), fruits, icon_parameters, 'para')

            drawGeoPieWithTextureFromParameters(defaultDataset, geo_chart, pieRadius, geo_parameters, 'para')
            drawIconPieWithTextureFromParameters(defaultDataset, icon_chart, pieRadius, icon_parameters, 'para')

            break;
        case 2: //map
            condition_chart_name = 'map'

            geo_parametersList = JSON.parse(localStorage.getItem("mapGeoparametersList") || "[]")
            geo_parameters = geo_parametersList[geo_parametersList.length - 1]

            icon_parametersList = JSON.parse(localStorage.getItem("mapIconparametersList") || "[]")
            icon_parameters = icon_parametersList[icon_parametersList.length - 1]

            para_geoTextures(d3.select('#chart0'),fruits, geo_parameters, 'para')
            para_iconTextures(d3.select('#chart0'), fruits, icon_parameters, 'para')

            drawGeoMapWithTextureFromParameters(defaultMapDataset, geo_chart, 'geo_d', geo_parameters, 'para')
            drawIconMapWithTextureFromParameters(defaultMapDataset, icon_chart, 'icon_d', icon_parameters, 'para')

            break;
        default:
            console.log(`has problem with condition_chart`);
    }

    //show ui elements based on condition
    let strategy_first_design_textarea = document.createElement('textarea')
    document.getElementById('strategy_first_design_div').appendChild(strategy_first_design_textarea)

    strategy_first_design_textarea.placeholder = 'Please write your answer here.'
    strategy_first_design_textarea.className = 'form-control'
    strategy_first_design_textarea.rows = '4'
    strategy_first_design_textarea.cols = '80'
    strategy_first_design_textarea.id = 'strategy_first_design_textarea'

    let strategy_second_design_textarea = document.createElement('textarea')
    document.getElementById('strategy_second_design_div').appendChild(strategy_second_design_textarea)

    strategy_second_design_textarea.placeholder = 'Please write your answer here.'
    strategy_second_design_textarea.className = 'form-control'
    strategy_second_design_textarea.rows = '4'
    strategy_second_design_textarea.cols = '80'
    strategy_second_design_textarea.id = 'strategy_second_design_textarea'

    if(condition_texture == 0){
        document.getElementById('first_design_texture_name').innerHTML = 'geometric'
        document.getElementById('second_design_texture_name').innerHTML = 'iconic'
    }

    if(condition_texture == 1){
        document.getElementById('first_design_texture_name').innerHTML = 'iconic'
        document.getElementById('second_design_texture_name').innerHTML = 'geometric'
    }



    //record participants' answer status and answer
    let strategy_goal_answered = false
    let strategy_goal_answer = 'no_input'

    document.getElementById('strategy_goal').oninput = function (){
        if(this.value){
            strategy_goal_answered = true
        }else{
            strategy_goal_answered = false
        }

        strategy_goal_answer = this.value

        //Check if all required questions have been answered
        if (strategy_goal_answered && strategy_first_design_answered && strategy_second_design_answered){
            nextBtn.disabled = false
        }else{
            nextBtn.disabled = true
        }
    }

    let strategy_first_design_answered = false
    let strategy_first_design_answer = 'no_input'

    document.getElementById('strategy_first_design_textarea').oninput = function (){
        if(this.value){
            strategy_first_design_answered = true
        }else{
            strategy_first_design_answered = false
        }

        strategy_first_design_answer = this.value

        if (strategy_goal_answered && strategy_first_design_answered && strategy_second_design_answered){
            nextBtn.disabled = false
        }else{
            nextBtn.disabled = true
        }
    }



    let strategy_second_design_answered = false
    let strategy_second_design_answer = 'no_input'

    document.getElementById('strategy_second_design_textarea').oninput = function (){
        if(this.value){
            strategy_second_design_answered = true
        }else{
            strategy_second_design_answered = false
        }

        strategy_second_design_answer = this.value

        if (strategy_goal_answered && strategy_first_design_answered && strategy_second_design_answered){
            nextBtn.disabled = false
        }else{
            nextBtn.disabled = true
        }
    }

    //when clicking "Same As Before" button, fill the textarea with 'same'
    document.getElementById('strategy_same_answer_btn').onclick = function (){
        //fill the textarea of these questions with 'same'
        document.getElementById('strategy_goal').value = 'same'
        document.getElementById('strategy_first_design_textarea').value = 'same'
        document.getElementById('strategy_second_design_textarea').value = 'same'

        //record the answer
        strategy_goal_answer = 'same'
        strategy_first_design_answer = 'same'
        strategy_second_design_answer = 'same'

        //record the answer status of each question
        strategy_goal_answered = true
        strategy_first_design_answered = true
        strategy_second_design_answered = true

        //enable the next button
        document.getElementById('strategy_next_btn').disabled = false
    }

    document.getElementById('strategy_next_btn').onclick = function(){
        //record data
        let strategy_geo //design strategy for geometric texture
        let strategy_icon //design strategy for iconic texture

        if(condition_texture == 0){
            strategy_geo = strategy_first_design_answer
            strategy_icon = strategy_second_design_answer
        }

        if(condition_texture == 1){
            strategy_icon = strategy_first_design_answer
            strategy_geo = strategy_second_design_answer
        }

        //write data to measurements
        measurements['strategy_goal'] = '"'+ strategy_goal_answer+'"'
        measurements['strategy_geo'] = '"'+ strategy_geo + '"'
        measurements['strategy_icon'] = '"' + strategy_icon +'"'

        //update measurements to localStorage
        localStorage.setItem('measurements', JSON.stringify(measurements))

        //send the svg of chart design in default data set to server
        let chart0_svg_data = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="600" height="600">' + $("#chart0A")[0].innerHTML + $("#chart0")[0].innerHTML  + $("#chart0WhiteStroke")[0].innerHTML + $("#chart0BlackStroke")[0].innerHTML + '</svg>'

        



        //jump to next page
        window.location.href = 'question_compare_texture.php'
    }
</script>

</body>
</html>
