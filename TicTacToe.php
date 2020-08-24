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

        .cell:hover {
            background-color: mediumvioletred;
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
            color: #000000;
            font-size: 225px;
        }

        .won::after {
            color: #111111;
        }
    </style>
    <script>
        // HTML Elements
        const statusDiv = document.querySelector('.turn');
        const resetDiv = document.querySelector('.reset');
        const cellDivs = document.querySelectorAll('.cell');

        // game constants
        const xSymbol = '×';
        const oSymbol = '○';

        // game variables
        let gameIsLive = true;
        let xIsNext = true;


        // functions
        const letterToSymbol = (letter) => letter === 'x' ? xSymbol : oSymbol;

        const handleWin = (letter) => {
            gameIsLive = false;
            if (letter === 'x') {
                statusDiv.innerHTML = `${letterToSymbol(letter)} has won!`;
            } else {
                statusDiv.innerHTML = `<span>${letterToSymbol(letter)} has won!</span>`;
            }
        };

        const checkGameStatus = () => {
            const topLeft = cellDivs[0].classList[1];
            const topMiddle = cellDivs[1].classList[1];
            const topRight = cellDivs[2].classList[1];
            const middleLeft = cellDivs[3].classList[1];
            const middleMiddle = cellDivs[4].classList[1];
            const middleRight = cellDivs[5].classList[1];
            const bottomLeft = cellDivs[6].classList[1];
            const bottomMiddle = cellDivs[7].classList[1];
            const bottomRight = cellDivs[8].classList[1];

            // check winner
            if (topLeft && topLeft === topMiddle && topLeft === topRight) {
                handleWin(topLeft);
                cellDivs[0].classList.add('won');
                cellDivs[1].classList.add('won');
                cellDivs[2].classList.add('won');
            } else if (middleLeft && middleLeft === middleMiddle && middleLeft === middleRight) {
                handleWin(middleLeft);
                cellDivs[3].classList.add('won');
                cellDivs[4].classList.add('won');
                cellDivs[5].classList.add('won');
            } else if (bottomLeft && bottomLeft === bottomMiddle && bottomLeft === bottomRight) {
                handleWin(bottomLeft);
                cellDivs[6].classList.add('won');
                cellDivs[7].classList.add('won');
                cellDivs[8].classList.add('won');
            } else if (topLeft && topLeft === middleLeft && topLeft === bottomLeft) {
                handleWin(topLeft);
                cellDivs[0].classList.add('won');
                cellDivs[3].classList.add('won');
                cellDivs[6].classList.add('won');
            } else if (topMiddle && topMiddle === middleMiddle && topMiddle === bottomMiddle) {
                handleWin(topMiddle);
                cellDivs[1].classList.add('won');
                cellDivs[4].classList.add('won');
                cellDivs[7].classList.add('won');
            } else if (topRight && topRight === middleRight && topRight === bottomRight) {
                handleWin(topRight);
                cellDivs[2].classList.add('won');
                cellDivs[5].classList.add('won');
                cellDivs[8].classList.add('won');
            } else if (topLeft && topLeft === middleMiddle && topLeft === bottomRight) {
                handleWin(topLeft);
                cellDivs[0].classList.add('won');
                cellDivs[4].classList.add('won');
                cellDivs[8].classList.add('won');
            } else if (topRight && topRight === middleMiddle && topRight === bottomLeft) {
                handleWin(topRight);
                cellDivs[2].classList.add('won');
                cellDivs[4].classList.add('won');
                cellDivs[6].classList.add('won');
            } else if (topLeft && topMiddle && topRight && middleLeft && middleMiddle && middleRight && bottomLeft && bottomMiddle && bottomRight) {
                gameIsLive = false;
                statusDiv.innerHTML = 'Game is tied!';
            } else {
                xIsNext = !xIsNext;
                if (xIsNext) {
                    statusDiv.innerHTML = `${xSymbol} is next`;
                } else {
                    statusDiv.innerHTML = `<span>${oSymbol} is next</span>`;
                }
            }
        };


        // event Handlers
        const handleReset = () => {
            xIsNext = true;
            statusDiv.innerHTML = `${xSymbol} is next`;
            for (const cellDiv of cellDivs) {
                cellDiv.classList.remove('x');
                cellDiv.classList.remove('o');
                cellDiv.classList.remove('won');
            }
            gameIsLive = true;
        };

        const handleCellClick = (e) => {
            const classList = e.target.classList;

            if (!gameIsLive || classList[1] === 'x' || classList[1] === 'o') {
                return;
            }

            if (xIsNext) {
                classList.add('x');
                checkGameStatus();
            } else {
                classList.add('o');
                checkGameStatus();
            }
        };


        // event listeners
        resetDiv.addEventListener('click', handleReset);

        for (const cellDiv of cellDivs) {
            cellDiv.addEventListener('click', handleCellClick)
        }
    </script>
</head>

<body>

    <div class="container">
        <h1 class="title"> Tic <span> Tac </span> Toe </h1>
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