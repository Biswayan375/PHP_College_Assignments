<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patterns</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* background-color: rgb(0, 0, 0, 0.8); */
            background: linear-gradient(34deg, black, #161603a6);
        }
        .container{
            border-radius: 5px;
            padding: 20px;
            background-color: #1d1d1d;
            color: #f3f7ba;
            box-shadow: 0px 0px 13px 6px #1616157a;
            min-width: 150px;
            max-width: 450px;
            margin-bottom: 2px;
        }
        .input{
            border-radius: 3px;
            border-style: none;
            padding: 3px;
            background-color: #9b9b9b3b;
            text-align: center;
            width: 100%;
        }
        .input:focus{
            outline: none;
        }
        .showButton{
            cursor: pointer;
            font-size: 14px;
            border-radius: 4px;
            background-color: #5d5d5d;
            font-weight: bold;
            color: #22fd08;
            border-style: none;
            padding: 4px;
            transition: 0.5s;
            display: block;
            margin: auto;
            width: 30%;
            margin-top: 5px;
        }
        .showButton:hover{
            background-color: #22fd08;
            color: #5d5d5d;
        }
        #tableSection{
            margin-top: 5px;
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            grid-template-rows: repeat(2, 50px);
            grid-row-gap: 5px;
        }
        .fixedItem{
            border: 1px solid;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            color: green;
            background-color: rgb(8 142 6 / 14%);
        }
        .dItem{
            border: 1px solid;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            background-color: #b6b90026;
        }
    </style>
</head>
<body>
    <div class="container">
        <p style="font-size: 20px; letter-spacing: 3px; text-align: center">Of which number you want to see the table?</p>
        <form action="#" method="POST">
            <input onchange="handleChange(event)" type="number" class="input" placeholder="Enter the number">

            <section id="tableSection">
                <div class="fixedItem">1</div>
                <div class="fixedItem">2</div>
                <div class="fixedItem">3</div>
                <div class="fixedItem">4</div>
                <div class="fixedItem">5</div>
                <div class="fixedItem">6</div>
                <div class="fixedItem">7</div>
                <div class="fixedItem">8</div>
                <div class="fixedItem">9</div>
                <div class="fixedItem">10</div>

                <div class="dItem" id="dItem1"></div>
                <div class="dItem" id="dItem2"></div>
                <div class="dItem" id="dItem3"></div>
                <div class="dItem" id="dItem4"></div>
                <div class="dItem" id="dItem5"></div>
                <div class="dItem" id="dItem6"></div>
                <div class="dItem" id="dItem7"></div>
                <div class="dItem" id="dItem8"></div>
                <div class="dItem" id="dItem9"></div>
                <div class="dItem" id="dItem10"></div>
            </section>

            <button onclick="handleButtonClick(event)" class="showButton">Show!</button>
        </form>

        <script>
            let input = document.getElementsByClassName("input");
            function handleButtonClick(event){
                const val = input.value;
                event.preventDefault();
                if(input.value != null){
                    for(i = 1; i <= 10; i++){
                        let id = "dItem" + i;
                        let item = document.getElementById(id);
                        item.innerHTML = val * i;
                    }
                }
                input.value = val;
            }

            function handleChange(event){
                input.value = event.target.value;
                console.log(input.value);
            }

        </script>
    </div>
</body>
</html>