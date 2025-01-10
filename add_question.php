<?php include ('dbcon.php') ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question_text = $_POST['question_text'];
    $option_1 = $_POST['option_1'];
    $option_2 = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4 = $_POST['option_4'];
    $correct_option = $_POST['correct_option'];

   

    $sql = "INSERT INTO questions (question_text, option_1, option_2, option_3, option_4, correct_option)
            VALUES ('$question_text', '$option_1', '$option_2', '$option_3', '$option_4', '$correct_option')";

    if ($conn->query($sql) === TRUE) {
        echo "New question added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="add_question.php">
    Question: <input type="text" name="question_text" required><br>
    Option 1: <input type="text" name="option_1" required><br>
    Option 2: <input type="text" name="option_2" required><br>
    Option 3: <input type="text" name="option_3" required><br>
    Option 4: <input type="text" name="option_4" required><br>
    Correct Option: 
    <select name="correct_option">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
        <option value="4">Option 4</option>
    </select><br>
    <button type="submit">Add Question</button>
</form>
