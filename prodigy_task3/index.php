<!DOCTYPE html>
<html>
<head>
    <title>Tic-Tac-Toe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #333;
        }

        #game-board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-gap: 5px;
            margin: 30px auto;
        }

        .cell {
            width: 100px;
            height: 100px;
            border: 2px solid #555;
            text-align: center;
            font-size: 2em;
            background-color: #fff;
            cursor: pointer;
        }

        .cell:hover {
            background-color: #eee;
        }

        /* Add some colors for X and O */
        .cell.X {
            color: #e74c3c;
        }

        .cell.O {
            color: #3498db;
        }

        /* Style the reset button */
        #reset-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1.2em;
            cursor: pointer;
        }

        #reset-button:hover {
            background-color: #2980b9;
        }

        #message {
            font-size: 1.5em;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Tic-Tac-Toe</h1>
    <div id="game-board">
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
   

<button id="reset-button">Reset Game</button>
<div id="message"></div>
<script>
    // Define variables to track the game state
    let currentPlayer = 'X';
    let cells = document.querySelectorAll('.cell');
    let gameEnded = false;
    let message = document.getElementById('message');

    // Add click event listeners to each cell
    cells.forEach(cell => {
        cell.addEventListener('click', () => {
            if (cell.innerHTML === '' && !gameEnded) {
                cell.innerHTML = currentPlayer;
                if (checkWinner()) {
                    message.textContent = currentPlayer + ' wins!';
                    gameEnded = true;
                    setTimeout(resetGame, 2000); // Reset after 2 seconds
                } else if ([...cells].every(cell => cell.innerHTML !== '')) {
                    message.textContent = "It's a tie!";
                    gameEnded = true;
                    setTimeout(resetGame, 2000); // Reset after 2 seconds
                } else {
                    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
                }
            }
        });
    });

    // Implement a function to check for a winner
    function checkWinner() {
        // Add your win conditions here
        // Check rows, columns, and diagonals for a win
        // Update the game state as necessary

        // Example code to check for a win
        if (
            // Check rows
            (cells[0].innerHTML === currentPlayer && cells[1].innerHTML === currentPlayer && cells[2].innerHTML === currentPlayer) ||
            // Check columns
            (cells[0].innerHTML === currentPlayer && cells[3].innerHTML === currentPlayer && cells[6].innerHTML === currentPlayer) ||
            // Check diagonals
            (cells[0].innerHTML === currentPlayer && cells[4].innerHTML === currentPlayer && cells[8].innerHTML === currentPlayer) ||
            (cells[2].innerHTML === currentPlayer && cells[4].innerHTML === currentPlayer && cells[6].innerHTML === currentPlayer)
        ) {
            return true;
        }
        return false;
    }

    // Function to reset the game
    function resetGame() {
        cells.forEach(cell => {
            cell.innerHTML = '';
        });
        message.textContent = '';
        gameEnded = false;
        currentPlayer = 'X';
    }

    // Add a click event listener to the reset button
    document.getElementById('reset-button').addEventListener('click', resetGame);
</script>
</body>
</html>

</body>
</html>
