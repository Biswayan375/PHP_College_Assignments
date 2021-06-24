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
        <div>
            <div style="display: block; margin: auto;" class="userPanel" id="userPanel">

                <form id="cityNameSearchForm" method="post" action="#">
                    <label style="display: block; color: blueviolet; font-size: 18px" for="cityName">Enter the city name of which's student's details you want to see</label>
                    <input type="text" name="cityName" required>
                    <button type="submit" id="citySearchButton" class="citySearchButton">Search</button>
                </form>

            </div>
            <section class="tableDiv" id="tableDiv">
                <?php
                    session_start();
                    if(isset($_SESSION['data'])){
                        
                        $data = $_SESSION['data'];
                        $key = $_SESSION['key'];
                        
                    }
                    session_destroy();
                    if(!isset($_POST["cityName"])){
                        echo '<div class="fixedRow">Name</div>';
                        echo '<div class="fixedRow">Roll</div>';
                        echo '<div class="fixedRow">Marks</div>';
                        echo '<div class="fixedRow">City</div>';
                        echo '<div class="fixedRow">Grade</div>';
                        foreach ($data as $k => $v) {
                            $i = 0;
                            if($v[3] == $key){
                                while($i < 5){
                                    echo "<div class='studentDataRow'>" . $v[$i] . "</div>";
                                    $i += 1;
                                }
                            }
                        }
                    }
                    session_start();
                    $_SESSION['data'] = $data;
                    if(isset($_POST["cityName"])){
                        $_SESSION["key"] = $_POST["cityName"];
                        header("Location: ./Student.php");
                        exit;
                    }
                ?>
            </section>
            <a style="display: block; text-align: center;" href="./studentData.php">Go to home page</a>
        </div>
    </body>
</html>