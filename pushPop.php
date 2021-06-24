<?php
    session_start();
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <style>
        *{
            font-family: 'sans-serif', Poppins;
            margin: 0;
            padding: 0;
        }
        .container{
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #e2e2e2;
        }
        input{
            font-size: 16px;
            margin: 2px;
            border: none;
            padding: 5px;
            border-radius: 7px;
            width: 180px;
            background-color: #e2e2e2;
        }
        input:focus{
            outline: none;
        }
        span{
            color: blueviolet;
            margin: 3px;
        }
        button{
            display: inline;
        }

        .inputSection{
            display: flex;
            flex-direction: column;
            text-align: center;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 13px 6px #00000029;
        }
        .listViewSection{
            display: flex;
            flex-direction: column;
            text-align: center;
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0px 0px 13px 6px #00000029;
            margin-top: 7px;
            min-width: 400px;
            max-width: 400px;
        }
        .listViewDiv{
            display: flex;
            overflow-x: auto;
            border-radius: 7px;
            padding: 6px;
        }
        .listItem{
            font-size: 16px;
            margin: 2px;
            border: none;
            padding: 5px;
            border-radius: 7px;
            width: 50px;
            background-color: #e2e2e2;
            text-align: center;
            background-color: #17971d5c;
            color: darkgreen;
            font-weight: bold;
        }
        #pushButton{
            margin-top: 5px;
            padding: 7px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            background-color: #3f51b5;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        #popButton{
            padding: 7px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            background-color: crimson;
            width: 100%;
        }
        #destroyButton{
            padding: 7px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            background-color: #ff5722;
            width: 100%;
            margin-top: 5px;
        }
        #destroyButton:hover{
            background-color: #ff5722ab;
        }
        #popButton:hover{
            background-color: #ed143da1;
        }
        #pushButton:hover{
            background-color: #3f51b5ab;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <section class="inputSection">
            <form action="#" method="post">
                <label for="item">
                    <span>Enter the number to be pushed</span>
                </label>
                <input style="display: block; margin: auto;" id="item" name="item" type="number" required>

                <button id="pushButton" name="pushButton" value="pushButton">Push!</button>
            </form>
        </section>

        <section class="listViewSection" id="listViewSection">
            <form action="#" method="post" id="listViewForm">
                <?php
                    if(isset($_SESSION["list"])){
                        $list = $_SESSION["list"];
                        if(sizeof($list) <= 0){
                            session_destroy();
                            echo '<script>
                                document.getElementById("listViewSection").style.display = "none";
                            </script>';
                        }
                    }else{
                        echo '<script>
                            document.getElementById("listViewSection").style.display = "none";
                        </script>';
                    }


                    if(($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["item"])) || isset($_SESSION["list"]) && !isset($_POST["popButton"]) && !isset($_POST["destroyButton"])){
                        if(isset($_SESSION["list"]))
                            $list = $_SESSION["list"];
                        else
                            $list = [];
                        if(isset($_POST["item"]))
                            array_push($list, $_POST["item"]);
                        $_SESSION["list"] = $list;
                        echo '<script>
                            document.getElementById("listViewSection").style.display = "flex";
                        </script>';

                        $list = $_SESSION["list"];

                        echo "<span style='display: block; border-bottom: 1px solid; width: 100%'>The list is</span>";
                        echo "<div class='listViewDiv'>";
                        foreach ($list as $value) {
                            echo "<input class='listItem' value='" . $value . "' readonly>";
                        }
                        echo "</div>";
                    }
                    elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["popButton"])){
                        if(isset($_SESSION["list"])){
                            $list = $_SESSION["list"];
                            if(sizeof($list) >= 1){
                                array_pop($list);
                                $_SESSION["list"] = $list;
                                echo "<span style='display: block; border-bottom: 1px solid; width: 100%'>The list is</span>";
                                echo "<div class='listViewDiv'>";
                                foreach ($list as $value) {
                                    echo "<input class='listItem' value='" . $value . "' readonly>";
                                }
                                echo "</div>";
                            }
                        }
                    }
                    elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["destroyButton"])){
                        session_destroy();
                        echo '<script>
                            document.getElementById("listViewSection").style.display = "none";
                        </script>';
                    }
                ?>
                <button id="popButton" name="popButton" value="popButton">Pop!</button>
                <button id="destroyButton" name="destroyButton" value="destroyButton">Destroy list!</button>
            </form>
        </section>
    </div>
</body>
</html>