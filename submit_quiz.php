<?php include 'dbcon.php' ?>
<?php
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

<h2>Quiz Result</h2>
<p>Total Questions: <?php echo $total_questions; ?></p>
<p>Attempted Questions: <?php echo $attempted; ?></p>
<p>Wrong Answers: <?php echo $wrong; ?></p>
<p>Percentage: <?php echo round($percentage, 2); ?>%</p>
