<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tic Tac Toe</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-image: url('img-slide.jpg');
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .container {
    text-align: center;
    background-color: #fff;
    border-radius: 10px; /* Initial border radius */
    border: 2px solid #ccc; /* Initial border color */
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    padding: 40px;
    max-width: 600px;
    width: 100%;
    overflow: hidden;
    position: relative;
    background-image: url('./images/text-bg-image/bg-img.avif');
    animation: changeBorder 10s infinite alternate; /* Animation for changing border properties */
  }

  @keyframes changeBorder {
    0% {
        border-radius: 10px; /* Initial border radius */
        border-color: #ccc; /* Initial border color */
    }
    50% {
        border-radius: 20px; /* Halfway through animation, change border radius */
        border-color: #6EB7D7; /* Halfway through animation, change border color */
    }
    100% {
        border-radius: 30px; /* At the end of animation, change border radius */
        border-color: #FF5733; /* At the end of animation, change border color */
    }
  }

  h1 {
    font-size: 3em;
    margin-bottom: 20px;
    color: white;
    text-shadow: 2px 2px 2px rgba(0,0,0,0.1);
  }
  .board {
    display: grid;
    grid-template-columns: repeat(3, 100px);
    grid-gap: 10px;
    margin-top: 30px;
    justify-content: center;
  }
  .cell {
    width: 100px;
    height: 100px;
    background-color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2.5em;
    color: #333;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  }
  .cell:hover {
    background-color: #f0f0f0;
    transform: scale(1.05);
  }
  .players {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }
  .player-label {
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 5px;
    color: white;
  }
  .player-input {
    padding: 8px;
    font-size: 1em;
    border: 2px solid #ccc;
    border-radius: 5px;
    text-align: center;
    width: 200px;
    margin: 0 10px;
    transition: border-color 0.3s ease;
    outline: none;
  }
  .player-input:focus {
    border-color: #6EB7D7;
  }
  .btn {
    background-color: #6EB7D7;
    color: #fff;
    padding: 10px 20px;
    font-size: 1.2em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 20px;
    margin-right: 10px; /* Add margin to create space between buttons */
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  }
  .btn:hover {
    background-color: #5C99B4;
  }
  .winner {
    font-size: 2em;
    font-weight: bold;
    margin-top: 20px;
    color: #6EB7D7;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
    animation: slideIn 1s forwards; /* Winner animation */
  }
  @keyframes slideIn {
    0% {
      opacity: 0;
      transform: translateY(-100%);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
  .celebration {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
    display: none;
  }
  .cracker {
    width: 20px;
    height: 20px;
    background-color: #ff0000;
    position: absolute;
    border-radius: 50%;
    animation: crackerAnimation 1s ease-out forwards;
  }
  @keyframes crackerAnimation {
    0% {
      transform: scale(1);
    }
    100% {
      transform: scale(2);
      opacity: 0;
    }
  }
  .confetti {
    width: 5px;
    height: 5px;
    background-color: #FFD700;
    position: absolute;
    border-radius: 50%;
    animation: confettiAnimation 3s ease-out forwards;
  }
  @keyframes confettiAnimation {
    0% {
      transform: translateY(0) rotateZ(0);
    }
    100% {
      transform: translateY(100vh) rotateZ(720deg);
      opacity: 0;
    }
  }
  .balloon {
    width: 30px;
    height: 40px;
    background-color: #00f;
    border-radius: 50%;
    position: absolute;
    bottom: 0;
    animation: balloonAnimation 5s ease-out forwards;
  }
  @keyframes balloonAnimation {
    0% {
      transform: translateY(0) scale(1);
    }
    50% {
      transform: translateY(-100vh) scale(1.5);
    }
    100% {
      transform: translateY(-200vh) scale(2);
      opacity: 0;
    }
  }
  .particle {
    width: 10px;
    height: 10px;
    background-color: #FFD700;
    position: absolute;
    border-radius: 50%;
    opacity: 0;
    animation: explode 1s ease-out forwards;
  }
  @keyframes explode {
    0% {
      opacity: 1;
      transform: scale(1) translate(0, 0);
    }
    100% {
      opacity: 0;
      transform: scale(0.5) translate(var(--x), var(--y));
    }
  }
  /* Popup styles */
  .popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #000;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 300px;
    width: 100%;
    text-align: center;
    display: none; /* Hidden by default */
  }
  .popup h2 {
    font-size: 2em;
    margin: 0;
    color: #fff;
  }
  .popup .btn {
    margin: 20px 0 0 0;
  }
</style>
</head>
<body>

<div class="container">
  <h1>Tic Tac Toe</h1>

  <div class="board" id="board">
    <div class="cell" onclick="handleClick(0)"></div>
    <div class="cell" onclick="handleClick(1)"></div>
    <div class="cell" onclick="handleClick(2)"></div>
    <div class="cell" onclick="handleClick(3)"></div>
    <div class="cell" onclick="handleClick(4)"></div>
    <div class="cell" onclick="handleClick(5)"></div>
    <div class="cell" onclick="handleClick(6)"></div>
    <div class="cell" onclick="handleClick(7)"></div>
    <div class="cell" onclick="handleClick(8)"></div>
  </div>

  <div class="players">
    <div>
      <label for="playerXInput" class="player-label">Player 1:</label>
      <input type="text" id="playerXInput" class="player-input" placeholder="Enter name for X">
    </div>
    <div>
      <label for="playerOInput" class="player-label">Player 2:</label>
      <input type="text" id="playerOInput" class="player-input" placeholder="Enter name for O">
    </div>
    <button class="btn" onclick="startGame()">Start Game</button>
  </div>

  <div id="result" class="winner"></div>
  <div id="celebration" class="celebration"></div>

</div>

<!-- Popup for winner announcement -->
<div id="winnerPopup" class="popup">
  <h2 id="winnerName"></h2>
  <button class="btn" onclick="startGame()">Play Again</button>
</div>

<!-- Popup for draw announcement -->
<div id="drawPopup" class="popup">
  <h2>It's a draw!</h2>
  <button class="btn" onclick="startGame()">Play Again</button>
</div>

<script>
  let currentPlayer = 'X';  // Start with player X
  let playerX = '';
  let playerO = '';
  let board = ['', '', '', '', '', '', '', '', ''];  // Represents the board state
  let gameStarted = false;

  const winPatterns = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8], // rows
    [0, 3, 6], [1, 4, 7], [2, 5, 8], // columns
    [0, 4, 8], [2, 4, 6] // diagonals
  ];

  function handleClick(index) {
    if (!gameStarted) {
      alert('Please start the game by entering player names and clicking the "Start Game" button.');
      return;
    }

    if (board[index] === '' && !checkWin()) {  // Check if cell is empty and game is not won
      board[index] = currentPlayer;  // Update board state with current player
      document.getElementsByClassName('cell')[index].innerText = currentPlayer;  // Update UI
      document.getElementsByClassName('cell')[index].style.backgroundColor = currentPlayer === 'X' ? '#00FF00' : '#FFFF00'; // Change color based on player
      if (checkWin()) {  // Check if current player wins
        displayWinner();
        triggerCelebration();
        gameStarted = false;
      } else if (board.every(cell => cell !== '')) {  // Check if it's a draw
        document.getElementById('drawPopup').style.display = 'block'; // Show the draw popup
        gameStarted = false;
      } else {
        currentPlayer = currentPlayer === 'X' ? 'O' : 'X';  // Switch player
      }
    }
  }

  function checkWin() {
    return winPatterns.some(pattern => {
      if (board[pattern[0]] !== '' &&
          board[pattern[0]] === board[pattern[1]] &&
          board[pattern[1]] === board[pattern[2]]) {
        return true;  // Return true if there's a winning pattern
      }
      return false;
    });
  }

  function displayWinner() {
    let winner = currentPlayer === 'X' ? playerX : playerO;
    document.getElementById('result').innerText = winner + ' wins!';
    document.getElementById('winnerName').innerText = winner + ' wins!';
    document.getElementById('winnerPopup').style.display = 'block'; // Show the winner popup
  }

  function startGame() {
    playerX = document.getElementById('playerXInput').value.trim();
    playerO = document.getElementById('playerOInput').value.trim();
    
    if (playerX === '' || playerO === '') {
      alert('Please enter names for both players before starting the game.');
      return;
    }

    document.getElementById('result').innerText = '';
    currentPlayer = 'X';
    board = ['', '', '', '', '', '', '', '', ''];
    document.querySelectorAll('.cell').forEach(cell => {
      cell.innerText = '';
      cell.style.backgroundColor = '#ffffff';
    });
    document.getElementById('celebration').style.display = 'none'; // Hide celebration
    document.getElementById('winnerPopup').style.display = 'none'; // Hide winner popup
    document.getElementById('drawPopup').style.display = 'none'; // Hide draw popup
    gameStarted = true; // Set the game as started
  }

  // Function to trigger the celebration animation
  function triggerCelebration() {
    const celebrationContainer = document.getElementById('celebration');
    celebrationContainer.innerHTML = ''; // Clear previous particles
    
    // Create cracker bursts
    for (let i = 0; i < 10; i++) {
        const cracker = document.createElement('div');
        cracker.className = 'cracker';
        cracker.style.left = Math.random() * 100 + 'vw';
        cracker.style.top = Math.random() * 100 + 'vh';
        celebrationContainer.appendChild(cracker);
    }

    // Create confetti
    for (let i = 0; i < 100; i++) {
        const confetti = document.createElement('div');
        confetti.className = 'confetti';
        confetti.style.left = Math.random() * 100 + 'vw';
        confetti.style.top = Math.random() * 100 + 'vh';
        celebrationContainer.appendChild(confetti);
    }

    // Create balloons
    for (let i = 0; i < 5; i++) {
        const balloon = document.createElement('div');
        balloon.className = 'balloon';
        balloon.style.left = Math.random() * 100 + 'vw';
        celebrationContainer.appendChild(balloon);
    }

    celebrationContainer.style.display = 'block';
  }
</script>

</body>
</html>
