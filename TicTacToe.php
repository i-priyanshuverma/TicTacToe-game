<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TicTacToe</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #091922;
            display: flex;
            justify-content: center;
        }

        .container {
            background: #0DA192;
            margin: 25px;
            padding: 25px;
            /* height: 20vw;
            width: 20vw; */
            border-radius: 10%;

        }

        .title {
            text-align: center;
        }

        .title span {
            color: #F2EBD3;
        }

        .status {
            display: flex;
            margin-top: 25px;
            font-size: 25px;
            justify-content: space-around;
            height: 30px;
        }

        .turn span {
            color: #F2EBD3;
        }

        .reset {
            cursor: pointer;
        }

        .reset:hover {
            color: #F2EBD3;
        }

        .game-cell-grid {
            background: #14BDAC;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            grid-gap: 15px;
            margin-top: 50px;
        }

        .cell {
            background-color: #0DA192;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            height: 200px;
            width: 200px;
        }

        .x .o {
            cursor: default;
        }

        .x::after {
            content: '×';
            font-size: 200px;
        }

        .o::after {
            content: '○';
            color: #F2EBD3;
            font-size: 225px;
        }

        .won::after {
            color: #BD022F;
        }
    </style>
   
</head>

<body>

    <div class="container">
        <div class="title"> Tic <span> Tac </span> Toe </div>
        <div class="status">
            <div class="turn">X is next</div>
            <div class="reset">Reset</div>
        </div>
        <div class="game-cell-grid">
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
            <div class="cell"></div>
        </div>
    </div>

</body>

</html>