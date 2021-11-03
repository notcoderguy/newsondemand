<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600,300);

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #0F1C2F;
        }

        /*Basic Phone styling*/

        .phone {
            /* border: 40px solid #ddd;
            border-width: 55px 7px;
            border-radius: 40px; */
            margin: 50px auto;
            overflow: hidden;
            transition: all 0.5s ease;
        }

        .phone iframe {
            border: 0;
            width: 100%;
            height: 100%;
        }

        /*Different Perspectives*/

        .phone.view_1 {
            transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            /* box-shadow: 0px 3px 0 #BBB, 0px 4px 0 #BBB, 0px 5px 0 #BBB, 0px 7px 0 #BBB, 0px 10px 20px #666; */
        }
        
        .phone.view_2 {
            transform: rotateX(0deg) rotateY(-60deg) rotateZ(0deg);
            /* box-shadow: 5px 1px 0 #BBB, 9px 2px 0 #BBB, 12px 3px 0 #BBB, 15px 4px 0 #BBB, 0 7px 20px #999; */
        }
        
        .phone.view_3 {
            transform: rotateX(50deg) rotateY(0deg) rotateZ(-50deg);
            /* box-shadow: -3px 3px 0 #BBB, -6px 6px 0 #BBB, -9px 9px 0 #BBB, -12px 12px 0 #BBB, -14px 10px 20px #666; */
        }

        /*Controls*/

        #controls {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 0.9em;
            color: #333;
        }

        #controls div {
            margin: 10px;
        }

        #controls div label {
            width: 120px;
            display: block;
            float: left;
        }

        #views {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 200px;
        }

        #views button {
            width: 198px;
            border: 1px solid #bbb;
            background-color: #fff;
            height: 40px;
            margin: 10px 0;
            color: #666;
            transition: all 0.2s;
        }

        #views button:hover {
            color: #444;
            background-color: #eee;
        }

        @media (max-width:900px) {
            #wrapper {
                transform: scale(0.8, 0.8);
            }
        }

        @media (max-width:700px) {
            #wrapper {
                transform: scale(0.6, 0.6);
            }
        }

        @media (max-width:500px) {
            #wrapper {
                transform: scale(0.4, 0.4);
            }
        }
    </style>
</head>

<body>
    <!--The Main Thing-->
    <div id="wrapper">
        <div class="phone view_1" id="phone_1">
            <iframe src="http://www.newsondemand.test/m" id="frame_1"></iframe>
        </div>
    </div>

    <!--Controls etc.-->
    <div id="controls" hidden>
        <div>
            <label for="iframeURL">URL:</label>
            <input type="text" id="iframeURL" placeholder="http://www.newsondemand.test/m" value="http://www.newsondemand.test/m" />
        </div>
        <div>
            <label for="iframeWidth">Width:</label>
            <input type="number" id="iframeWidth" placeholder="400" value="400" />
        </div>
        <div>
            <label for="iframeHeight">Height:</label>
            <input type="number" id="iframeHeight" placeholder="650" value="650" />
        </div>
        <!--Idea by /u/aerosole-->
        <div>
            <label for="iframePerspective">Add perspective:</label>
            <input type="checkbox" id="iframePerspective" checked="true" />
        </div>
    </div>
    <div id="views" hidden>
        <button value="1">View 1 - Front</button>
        <button value="2">View 2 - Side</button>
        <button value="3">View 3 - Laying</button>
    </div>

    <script>
        /*Only needed for the controls*/
        var phone = document.getElementById("phone_1"),
            iframe = document.getElementById("frame_1");

        /*View*/
        function updateView(view) {
            if (view) {
                phone.className = "phone view_" + view;
            }
        }

        /*Controls*/
        function updateIframe() {
            iframe.src = document.getElementById("iframeURL").value;

            phone.style.width = document.getElementById("iframeWidth").value + "px";
            phone.style.height = document.getElementById("iframeHeight").value + "px";

            /*Idea by /u/aerosole*/
            document.getElementById("wrapper").style.perspective = (
                document.getElementById("iframePerspective").checked ? "1000px" : "none"
            );
        }
        updateIframe();

        /*Events*/
        document.getElementById("controls").addEventListener("change", function() {
            updateIframe();
        });

        document.getElementById("views").addEventListener("click", function(evt) {
            updateView(evt.target.value);
        });
    </script>
</body>

</html>
