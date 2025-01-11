<?php
include 'dbcon.php';
session_start();


$sql = "SELECT * FROM questions";
$result = $conn->query($sql);
$questions = [];
$attempted = 0;
$correct = 0;
$wrong = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}

foreach ($questions as $index => $question) {
    if (isset($_POST["question_$index"])) {
        $user_answer = $_POST["question_$index"];
        $attempted++;
        
        if ($user_answer == $question['correct_option']) {
            $correct++;
        } else {
            $wrong++;
        }
    }
}

$total_questions = count($questions);
$percentage = ($correct / $total_questions) * 100;

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Result</title>
    <!-- Bootstrap CSS -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Space+Grotesk:wght@300..700&display=swap');
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: space grotesk;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
        }
        .result-card {
            padding: 20px;
            border: 1px solid #007bff;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .result-item {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="result-card">
        <h2 class="text-center">Quiz Result</h2>
        <div class="result-item">
            <strong>Total Questions:</strong> <?php echo $total_questions; ?>
        </div>
        <div class="result-item">
            <strong>Attempted Questions:</strong> <?php echo $attempted; ?>
        </div>
        <div class="result-item">
            <strong>Wrong Answers:</strong> <?php echo $wrong; ?>
        </div>
        <div class="result-item">
            <strong>Percentage:</strong> <?php echo round($percentage, 2); ?>%
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
