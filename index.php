<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Exam Live Demo</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; padding: 20px; }
        .exam-card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 600px; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px; }
        #timer { color: #d9534f; font-size: 1.5rem; font-weight: bold; }
        .question { margin-bottom: 20px; font-size: 1.1rem; }
        .options { margin-left: 10px; }
        .btn-submit { background-color: #28a745; color: white; border: none; padding: 12px 25px; border-radius: 5px; cursor: pointer; font-size: 1rem; width: 100%; transition: 0.3s; }
        .btn-submit:hover { background-color: #218838; }
    </style>
</head>
<body>
    <div class="exam-card">
        <div class="header">
            <h2>SSC CGL Mock Test</h2> <a href="logout.php" style="color:red; text-decoration:none; font-weight:bold; margin-left:10px;">[Logout]</a>
            <div id="timer">10:00</div>
        </div>
        <form id="examForm" action="result.php" method="POST">
            <div class="question">
                <p><strong>Q1. Which of the following is the capital of France?</strong></p>
                <div class="options">
                    <input type="radio" name="q1" value="A"> A) Berlin<br>
                    <input type="radio" name="q1" value="B"> B) Paris<br>
                    <input type="radio" name="q1" value="C"> C) Madrid<br>
                </div>
            </div>
            <div class="question">
                <p><strong>Q2. What is 15% of 200?</strong></p>
                <div class="options">
                    <input type="radio" name="q2" value="A"> A) 20<br>
                    <input type="radio" name="q2" value="B"> B) 30<br>
                    <input type="radio" name="q2" value="C"> C) 40<br>
                </div>
            </div>
            <button type="submit" class="btn-submit">Submit Assessment</button>
        </form>
    </div>
 <script>
        let time = 600; // 10 Minutes
        const display = document.getElementById('timer');
        setInterval(() => {
            if(time <= 0) document.getElementById('examForm').submit();
            let mins = Math.floor(time / 60);
            let secs = time % 60;
            display.innerHTML = `${mins}:${secs < 10 ? '0' : ''}${secs}`;
            time--;
        }, 1000);
    </script>
</body>
</html>
