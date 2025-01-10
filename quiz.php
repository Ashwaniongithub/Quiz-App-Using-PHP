<?php include 'dbcon.php' ?>
<?php
session_start();
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);
$questions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
} else {
    echo "No questions found";
}

$conn->close();
?>

<form method="POST" action="submit_quiz.php">
    <?php foreach ($questions as $index => $question) { ?>
        <fieldset>
            <legend><?php echo $question['question_text']; ?></legend>
            <input type="radio" name="question_<?php echo $index; ?>" value="1"><?php echo $question['option_1']; ?><br>
            <input type="radio" name="question_<?php echo $index; ?>" value="2"><?php echo $question['option_2']; ?><br>
            <input type="radio" name="question_<?php echo $index; ?>" value="3"><?php echo $question['option_3']; ?><br>
            <input type="radio" name="question_<?php echo $index; ?>" value="4"><?php echo $question['option_4']; ?><br>
        </fieldset>
    <?php } ?>
    <button type="submit">Submit Quiz</button>
</form>
