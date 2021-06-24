<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Student.css">
</head>
<body>
    <div class="container">

        <section style="display: flex; flex-direction: column; text-align: center;" class="inputSection" id="inputSection">
            <label style="display: block; color: blueviolet; font-size: 18px" for="n">How many students are there?</label>
            <input style="width: 100%;" onchange="handleNchange(event)" type="number" id="n" name="n">

            <button onclick="handleGoClick(event)" type="submit" class="goButton" id="goButton">Go!</button>
        </section>

        <section class="dataEntrySection">
            <form action="#" method="POST" class="dataEntryForm" id="dataEntryForm">

                <section class="cards" id="cards">

                </section>
                <button style="visibility: hidden;" id="submitButton" type="submit">Show Table</button>

            </form>
        </section>

    </div>

    <section style="visibility: hidden" class="tableDiv" id="tableDiv">
        <?php
            session_start();
            if(!isset($_POST["cityName"])){
                $data = [];
                $names = [];
                $dataCount = 0;
                echo '<div class="fixedRow">Name</div>
                <div class="fixedRow">Roll</div>
                <div class="fixedRow">Marks</div>
                <div class="fixedRow">City</div>
                <div class="fixedRow">Grade</div>';
                $i = 0;
                $arr = [];
                foreach ($_POST as $key => $value) {
                    if($i != 1){
                        if($i == 0) array_push($names, $value);
                        array_push($arr, $value);
                    }
                    else{
                        $n = $value;
                        array_push($arr, $n);
                    }
                    $i += 1;
                    if($i == 4){
                        $i = 0;
                        if($arr[2] < 40) array_push($arr, "F");
                        elseif($arr[2] >= 40 && $arr[2] < 60) array_push($arr, "B");
                        elseif($arr[2] >= 60 && $arr[2] < 80) array_push($arr, "A");
                        elseif($arr[2] >= 80) array_push($arr, "E");

                        $dataCount += 1;
                        $data[$n] = $arr;
                        $arr = [];
                    }
                }

                array_multisort($names, SORT_ASC, $data);

                foreach($data as $key => $value){
                    $i = 0;
                    while($i < 5){
                        echo "<div class='studentDataRow'>" . $value[$i] . "</div>";
                        $i += 1;
                    }
                }

                $_SESSION["data"] = $data;
            }else{
                $_SESSION["key"] = $_POST["cityName"];
                header("Location: ./Student.php");
                exit;

            }
        ?>
    </section>

    <section style="display: flex; visibility: hidden;" class="userPanelAndHighestContainer" id="userPanelAndHighestContainer">
        <div style="display: flex; flex-direction: column;" class="userPanel" id="userPanel">

            <form id="cityNameSearchForm" method="post" action="#">
                <label style="display: block; color: blueviolet; font-size: 18px" for="cityName">Enter the city name of which's student's details you want to see</label>
                <input type="text" name="cityName" required>
                <button onclick="citySearchButtonClick(event)" type="submit" id="citySearchButton" class="citySearchButton">Search</button>
            </form>

        </div>
        <div style="text-align: left;" class="highestDiv" id="highestDiv">
            <?php
                if($dataCount != 0){
                    $max = 0;
                    foreach($data as $key => $value) {
                        if($value[2] > $data[$max][2]) $max = $key;
                    }
                    echo '<span style="color: blueviolet; font-weight: bold; border-bottom: 1px solid">Top Student</span><br>';
                    echo '<p>Name: ' . $data[$max][0] . '</p>';
                    echo '<p>Roll: ' . $data[$max][1] . '</p>';
                    echo '<p>Marks: ' . $data[$max][2] . '</p>';
                    echo '<p>City: ' . $data[$max][3] . '</p>';
                }
            ?>
        </div>
    </section>

    <script>
        function handleNchange(event){
            let n = document.getElementById("n");
            n.value = event.target.value;
        }

        function handleGoClick(event){
            console.log("Here");
            let cards = document.getElementById("cards");
            let form = document.getElementById("dataEntryForm");
            const n = document.getElementById("n")
            let submitButton = document.getElementById("submitButton");

            if(n.value != "" && n.value != null){
                i = 0;
                str = "";
                while(i < n.value){
                    str += `<div class="dataEntryCard">
                        <span style="font-size: 18px; color: blueviolet">Student ` + (i + 1) + `</span>
                        <input type="text" name="name` + i + `" ` + `placeholder="Student's name" required>
                        <input type="number" name="roll` + i + `" ` +  `placeholder="Student's roll" required>
                        <input type="number" name="marks` + i + `" ` +  `placeholder="Student's marks" required>
                        <input type="text" name="city` + i + `" ` +  `placeholder="Student's city" required>
                    </div>`;
                    i += 1
                }
                cards.innerHTML = str;
                submitButton.style.visibility = 'visible';
            }
            event.preventDefault();
        }

        function handleSubmitButtonClick(event){
            
        }

        function citySearchButtonClick(event){
             // event.preventDefault();
             console.log("Hello there");
        }

    </script>
</body>
</html>

<?php
    if($dataCount != 0){
        echo '<script>
            let user = document.getElementById("userPanelAndHighestContainer");
            let table = document.getElementById("tableDiv");
            user.style.visibility = "visible";
            table.style.visibility = "visible";
        </script>';
    }
?>