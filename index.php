<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Car Race Game</title>
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
            background: #f87171;
            border-radius: 8px;
            bottom: 10px;
            left: 10px;
            transition: left 0.05s;
        }
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
    <h1 class="text-2xl font-bold mb-4">Simple Car Race Game</h1>
    <div id="gameArea" class="shadow-lg rounded-lg">
        <div class="car" id="car"></div>
        <div class="finish"></div>
    </div>
    <button id="startBtn" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Start Race</button>
    <div id="result" class="mt-4 text-xl font-semibold"></div>
    <script>
        const car = document.getElementById('car');
        const startBtn = document.getElementById('startBtn');
        const result = document.getElementById('result');
        let raceInterval = null;
        let carPos = 10;
        const finishLine = 530; // gameArea width - car width

        function resetGame() {
            carPos = 10;
            car.style.left = carPos + 'px';
            result.textContent = '';
            startBtn.disabled = false;
        }

        function startRace() {
            startBtn.disabled = true;
            raceInterval = setInterval(() => {
                carPos += Math.random() * 10 + 2; // random speed
                if (carPos >= finishLine) {
                    carPos = finishLine;
                    car.style.left = carPos + 'px';
                    clearInterval(raceInterval);
                    result.textContent = '🏁 Finished!';
                    startBtn.disabled = false;
                } else {
                    car.style.left = carPos + 'px';
                }
            }, 50);
        }

        startBtn.addEventListener('click', () => {
            resetGame();
            startRace();
        });

        resetGame();
    </script>
</body>
</html>