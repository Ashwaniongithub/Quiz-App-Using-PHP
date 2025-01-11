<?php include ('dbcon.php') ?>
<?php
$msg=false;
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
       $msg=true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question</title>
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
        .form-group label {
            font-weight: bold;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
<div class="container-fluid bg-dark" > 
         <h1 class="text-white p-3 text-center">Quiz App Using PHP</h1>
         <button class="btn btn-info" onclick="window.location.href='quiz.php'">Start Quiz</button>
</div>

<div class="container">
        
    <?php 
    if($msg){
        echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Great!</strong> New Question Added SuccessFully.
        </div>';
    }
     ?>
    <h4 class="text-center">Add a New Question</h4>
    <form method="POST" action="add_question.php">
        <div class="form-group">
            <label for="question_text">Question:</label>
            <input type="text" class="form-control" id="question_text" name="question_text" required>
        </div>
        
        <div class="form-group">
            <label for="option_1">Option 1:</label>
            <input type="text" class="form-control" id="option_1" name="option_1" required>
        </div>

        <div class="form-group">
            <label for="option_2">Option 2:</label>
            <input type="text" class="form-control" id="option_2" name="option_2" required>
        </div>

        <div class="form-group">
            <label for="option_3">Option 3:</label>
            <input type="text" class="form-control" id="option_3" name="option_3" required>
        </div>

        <div class="form-group">
            <label for="option_4">Option 4:</label>
            <input type="text" class="form-control" id="option_4" name="option_4" required>
        </div>

        <div class="form-group">
            <label for="correct_option">Correct Option:</label>
            <select class="form-control" id="correct_option" name="correct_option">
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
            </select>
        </div>

        <button type="submit" class="btn btn-custom btn-block">Add Question</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

