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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Form</title>
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
        fieldset {
            border: 2px solid #007bff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
            color: #007bff;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Quiz Questions</h2>
    <form method="POST" action="submit_quiz.php">
        <?php foreach ($questions as $index => $question) { ?>
            <fieldset>
                <legend><?php echo htmlspecialchars($question['question_text']); ?></legend>
                <div class="d-flex justify-content-around">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question_<?php echo $index; ?>" value="1" id="q<?php echo $index; ?>_1">
                    <label class="form-check-label" for="q<?php echo $index; ?>_1"><?php echo htmlspecialchars($question['option_1']); ?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question_<?php echo $index; ?>" value="2" id="q<?php echo $index; ?>_2">
                    <label class="form-check-label" for="q<?php echo $index; ?>_2"><?php echo htmlspecialchars($question['option_2']); ?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question_<?php echo $index; ?>" value="3" id="q<?php echo $index; ?>_3">
                    <label class="form-check-label" for="q<?php echo $index; ?>_3"><?php echo htmlspecialchars($question['option_3']); ?></label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="question_<?php echo $index; ?>" value="4" id="q<?php echo $index; ?>_4">
                    <label class="form-check-label" for="q<?php echo $index; ?>_4"><?php echo htmlspecialchars($question['option_4']); ?></label>
                </div>
                </div>
            </fieldset>
        <?php } ?>
        <button type="submit" class="btn btn-custom btn-block">Submit Quiz</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

