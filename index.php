<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// 20 Questions Array
$questions = [
    1 => ["q" => "Father of Computer?", "options" => ["Newton", "Charles Babbage", "Einstein", "Tesla"], "ans" => "Charles Babbage"],
    2 => ["q" => "Capital of India?", "options" => ["Mumbai", "Delhi", "Kolkata", "Chennai"], "ans" => "Delhi"],
    3 => ["q" => "Smallest planet?", "options" => ["Earth", "Mars", "Mercury", "Jupiter"], "ans" => "Mercury"],
    4 => ["q" => "CPU stands for?", "options" => ["Central Process Unit", "Control Unit", "Central Processing Unit", "None"], "ans" => "Central Processing Unit"],
    5 => ["q" => "Which gas do plants absorb?", "options" => ["Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen"], "ans" => "Carbon Dioxide"],
    6 => ["q" => "Full form of WWW?", "options" => ["World Wide Web", "World Word Web", "Web Wide World", "None"], "ans" => "World Wide Web"],
    7 => ["q" => "Largest ocean?", "options" => ["Atlantic", "Indian", "Pacific", "Arctic"], "ans" => "Pacific"],
    8 => ["q" => "Who wrote 'Ramayana'?", "options" => ["Valmiki", "Tulsidas", "Vyasa", "Kalidas"], "ans" => "Valmiki"],
    9 => ["q" => "Currency of USA?", "options" => ["Euro", "Dollar", "Yen", "Rupee"], "ans" => "Dollar"],
    10 => ["q" => "Smallest state of India?", "options" => ["Goa", "Sikkim", "Tripura", "Assam"], "ans" => "Goa"],
    11 => ["q" => "What is 15 + 25?", "options" => ["30", "35", "40", "45"], "ans" => "40"],
    12 => ["q" => "Brain of computer?", "options" => ["RAM", "CPU", "Monitor", "Keyboard"], "ans" => "CPU"],
    13 => ["q" => "Longest river?", "options" => ["Ganga", "Nile", "Amazon", "Thames"], "ans" => "Nile"],
    14 => ["q" => "Ship of Desert?", "options" => ["Elephant", "Horse", "Camel", "Lion"], "ans" => "Camel"],
    15 => ["q" => "Fastest animal?", "options" => ["Tiger", "Cheetah", "Lion", "Leopard"], "ans" => "Cheetah"],
    16 => ["q" => "First PM of India?", "options" => ["Nehru", "Modi", "Gandhi", "Patel"], "ans" => "Nehru"],
    17 => ["q" => "Formula of Water?", "options" => ["CO2", "H2O", "O2", "NaCl"], "ans" => "H2O"],
    18 => ["q" => "Days in Leap year?", "options" => ["365", "366", "364", "360"], "ans" => "366"],
    19 => ["q" => "Red Planet?", "options" => ["Venus", "Mars", "Saturn", "Jupiter"], "ans" => "Mars"],
    20 => ["q" => "Iron Man of India?", "options" => ["Nehru", "Bhagat Singh", "Sardar Patel", "Bose"], "ans" => "Sardar Patel"]
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Exam</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; padding: 20px; }
        .container { max-width: 800px; background: white; padding: 30px; margin: auto; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-bottom: 20px; }
        .question { background: #fff; margin-bottom: 20px; padding: 20px; border-left: 5px solid #007bff; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .timer { font-size: 22px; font-weight: bold; color: #dc3545; }
        button { background: #28a745; color: white; padding: 12px 30px; border: none; border-radius: 6px; cursor: pointer; font-size: 18px; width: 100%; }
        button:hover { background: #218838; }
        .logout-btn { color: #dc3545; text-decoration: none; font-weight: bold; border: 1px solid #dc3545; padding: 5px 10px; border-radius: 4px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Online Exam Demo</h2>
        <div class="timer">⏳ <span id="time">10:00</span></div>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
    <form action="result.php" method="POST" id="examForm">
        <?php foreach($questions as $id => $q): ?>
            <div class="question">
                <p><strong>Question <?php echo $id; ?>:</strong> <?php echo $q['q']; ?></p>
                <?php foreach($q['options'] as $opt): ?>
                    <label style="display: block; margin: 8px 0; cursor: pointer;">
                        <input type="radio" name="q<?php echo $id; ?>" value="<?php echo $opt; ?>" required>
                        <?php echo $opt; ?>
                    </label>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <button type="submit">Submit My Exam</button>
    </form>
</div>

<script>
    var timeLeft = 600; // 10 Minutes
    var timerDisplay = document.getElementById('time');
    var timer = setInterval(function() {
        var minutes = Math.floor(timeLeft / 60);
        var seconds = timeLeft % 60;
        if (seconds < 10) seconds = "0" + seconds;
        timerDisplay.innerHTML = minutes + ":" + seconds;
        if (timeLeft <= 0) {
            clearInterval(timer);
            alert("Time is up! Your exam will be submitted automatically.");
            document.getElementById('examForm').submit();
        }
        timeLeft--;
    }, 1000);
</script>
</body>
</html>
