// Get the necessary elements
const display = document.getElementById("display");
const startButton = document.getElementById("startButton");
const pauseButton = document.getElementById("pauseButton");
const resetButton = document.getElementById("resetButton");
const lapList = document.getElementById("lapList");

let timer; // To store the interval timer
let isRunning = false; // To track if the stopwatch is running
let seconds = 0, minutes = 0, hours = 0; // To track time
let lapCount = 1;

startButton.addEventListener("click", () => {
    if (!isRunning) {
        timer = setInterval(updateTime, 1000);
        isRunning = true;
        startButton.textContent = "Pause";
    } else {
        clearInterval(timer);
        isRunning = false;
        startButton.textContent = "Resume";
    }
     // Handle lap time
    if (isRunning) {
        const lapTime = display.textContent;
        const lapItem = document.createElement("li");
        lapItem.textContent = `Lap ${lapCount}: ${lapTime}`;
        lapList.appendChild(lapItem);
        lapCount++;
    }

});


pauseButton.addEventListener("click", () => {
    if (isRunning) {
        clearInterval(timer);
        isRunning = false;
        startButton.textContent = "Resume";
    }
});

resetButton.addEventListener("click", () => {
    clearInterval(timer);
    isRunning = false;
    startButton.textContent = "Start";
    display.textContent = "00:00:00";
    seconds = minutes = hours = 0;
    lapList.innerHTML = "";
});

function updateTime() {
    seconds++;
    if (seconds === 60) {
        seconds = 0;
        minutes++;
        if (minutes === 60) {
            minutes = 0;
            hours++;
        }
    }
    display.textContent = `${hours < 10 ? "0" : ""}${hours}:${minutes < 10 ? "0" : ""}${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
}

