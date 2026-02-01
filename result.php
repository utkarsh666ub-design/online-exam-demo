<?php
    $score = 0;
    if(isset($_POST['q1']) && $_POST['q1'] == "B") $score++;
    if(isset($_POST['q2']) && $_POST['q2'] == "B") $score++;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <style>
        body { font-family: Arial; text-align: center; background: #f4f4f4; padding-top: 50px; }
        .score-box { background: white; display: inline-block; padding: 40px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        .final-score { font-size: 50px; color: #007bff; }
    </style>
</head>
<body>
    <div class="score-box">
        <h1>Examination Result</h1>
        <p>Your Total Score is:</p>
        <div class="final-score"><?php echo $score; ?> / 2</div>
        <p><?php echo ($score == 2) ? "Excellent Performance!" : "Keep Practicing!"; ?></p>
        <br>
        <a href="index.php">Retake Test</a>
    </div> 
    <br><br>
<a href="logout.php" style="padding: 10px 20px; background: red; color: white; text-decoration: none; border-radius: 5px;">Final Logout</a>
</body>
</html>
