<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Race Game</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #gameArea {
            position: relative;
            width: 600px;
            height: 400px;
            background: #e0e7ef;
            overflow: hidden;
            margin: auto;
        }
        .car {
            position: absolute;
            width: 60px;
            height: 30px;
            border-radius: 8px;
            bottom: 10px;
        }
        .car1 { background: #f87171; top: 80px; }
        .car2 { background: #34d399; top: 200px; }
        .finish {
            position: absolute;
            right: 0;
            top: 0;
            width: 10px;
            height: 100%;
            background: #22d3ee;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <h1 class="text-2xl font-bold mb-4">Car Race Game</h1>
    <div id="gameArea" class="shadow-lg rounded-lg">
        <div class="car car1" id="car1"></div>
        <div class="car car2" id="car2"></div>
        <div class="finish"></div>
    </div>
    <button id="startBtn" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Start Race</button>
    <div id="result" class="mt-4 text-xl font-semibold"></div>
    <div class="mt-2 text-gray-700">
        <div>Player 1: <span class="font-bold">W</span> (forward), <span class="font-bold">S</span> (back)</div>
        <div>Player 2: <span class="font-bold">↑</span> (forward), <span class="font-bold">↓</span> (back)</div>
    </div>
    <script>
        const car1 = document.getElementById('car1');
        const car2 = document.getElementById('car2');
        const startBtn = document.getElementById('startBtn');
        const result = document.getElementById('result');
        const finishLine = 530;
        let car1Pos = 10, car2Pos = 10;
        let gameActive = false;

        function resetGame() {
            car1Pos = 10;
            car2Pos = 10;
            car1.style.left = car1Pos + 'px';
            car2.style.left = car2Pos + 'px';
            result.textContent = '';
            gameActive = false;
            startBtn.disabled = false;
        }

        function startRace() {
            gameActive = true;
            startBtn.disabled = true;
        }

        function checkWin() {
            if (car1Pos >= finishLine) {
                result.textContent = '🏁 Player 1 Wins!';
                gameActive = false;
                startBtn.disabled = false;
            } else if (car2Pos >= finishLine) {
                result.textContent = '🏁 Player 2 Wins!';
                gameActive = false;
                startBtn.disabled = false;
            }
        }

        document.addEventListener('keydown', (e) => {
            if (!gameActive) return;
            // Player 1: W/S
            if (e.key === 'w' || e.key === 'W') {
                car1Pos += 15;
                if (car1Pos > finishLine) car1Pos = finishLine;
                car1.style.left = car1Pos + 'px';
                checkWin();
            }
            if (e.key === 's' || e.key === 'S') {
                car1Pos -= 15;
                if (car1Pos < 10) car1Pos = 10;
                car1.style.left = car1Pos + 'px';
            }
            // Player 2: Arrow Up/Down
            if (e.key === 'ArrowUp') {
                car2Pos += 15;
                if (car2Pos > finishLine) car2Pos = finishLine;
                car2.style.left = car2Pos + 'px';
                checkWin();
            }
            if (e.key === 'ArrowDown') {
                car2Pos -= 15;
                if (car2Pos < 10) car2Pos = 10;
                car2.style.left = car2Pos + 'px';
            }
        });

        startBtn.addEventListener('click', () => {
            resetGame();
            startRace();
        });

        resetGame();
    </script>
</body>
</html>