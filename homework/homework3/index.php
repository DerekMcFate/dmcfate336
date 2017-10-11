<?php
session_start();

function selectCheck($choice) {
        if ($choice == $_GET['selection']) {
            return "selected";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Form Simulator</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Manuale" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
    </head>
    <body>
        
        <div>
        <h1><span>General Quiz</span></h1>
        <hr/>
        <form method="get" action="index.php">
        <h2><span>Question 1</span></h2>
        <p id="question">Which of these are considered fruits?</p>
        <br/>
            <label><input type="checkbox" name="check1" value="value1" <?=($_GET['check1']=='value1')?"checked":""?>>Orange</label><br/>
            <label><input type="checkbox" name="check2" value="value2" <?=($_GET['check2']=='value2')?"checked":""?>>Potato</label><br/>
            <label><input type="checkbox" name="check3" value="value3" <?=($_GET['check3']=='value3')?"checked":""?>>Apple</label><br/>
            <label><input type="checkbox" name="check4" value="value4" <?=($_GET['check4']=='value4')?"checked":""?>>Chestnut</label><br/>
            <label><input type="checkbox" name="check5" value="value5" <?=($_GET['check5']=='value5')?"checked":""?>>Banana</label><br/>
            <?php
            if($_GET['check1'] == 'value1' && $_GET['check2'] != 'value2' && $_GET['check3'] == 'value3' && $_GET['check4'] != 'value4' && $_GET['check5'] == 'value5') {
                echo "<h3>Correct!</h3>";
            } else {
                echo "<p>Incorrect</p>";
            }
            ?>
        <h2><span>Question 2</span></h2>
        <p id="question">CSUMB is located in which city?</p>
        <br/>
            <select name="selection">
                <option value="">Select</option>
                <option <?=selectCheck('option1')?> value="option1">Monterey</option>
                <option <?=selectCheck('option2')?> value="option2">Seaside</option>
                <option <?=selectCheck('option3')?> value="option3">Marina</option>
            </select>
            <?php
            if($_GET['selection'] != "") {
            if($_GET['selection'] == "option3") {
                echo "<h3>Correct!</h3>";
            } else {
                echo "<p>Incorrect</p>";
            }
            } else {
                echo "<p>Error, please select an answer.</p>";
            }
            ?>
        <h2><span>Question 3</span></h2>
        <p id="question">The best course of action if a bear wanders up to you is to challenge it to a rousing game of cards.</p>
        <br/>
            <label><input type="radio" name="radioButton" value="radio1" <?=($_GET['radioButton']=='radio1')?"checked":""?>>True</label>
            <br/>
            <label><input type="radio" name="radioButton" value="radio2" <?=($_GET['radioButton']=='radio2')?"checked":""?>>False</label>
            <?php
            if($_GET['radioButton'] == 'radio2') {
                echo "<h3>Correct!</h3>";
            } else {
                echo "<p>Incorrect</p>";
            }
            ?>
        <h2><span>Question 4</span></h2>
        <p id="question">What color are clouds (usually)?</p>
        <br/>
            <input type="search" name="userEntry" placeholder="Enter answer here" value="<?=$_GET['userEntry']?>">
            <?php
            if($_GET['userEntry'] != "") {
                if($_GET['userEntry'] == "white") {
                    echo "<h3>Correct!</h3>";
                } else {
                    echo "<p>Incorrect</p>";
                }
            } else {
                echo "<p>Error: Question remains unanswered.";
            }
            ?>
        <h2><span>Question 5</span></h2>
        <p id="question">Please estimate a value between 80 and 100.</p>
        <br/>
            <input type="range" name="range" value="<?=$_GET['range']?>">
            <?php
            if($_GET['range'] > 80) {
                echo "<h3>Correct!</h3>";
            } else {
                echo "<p>Incorrect</p>";
            }
            ?>
        <br/>
        <div id="submit">
            <input type="submit" value="Submit Answers">
        </div>
        </form>
        <hr/>
        </div>
        <br/>
        <p id="foot">This website is for educational purposes only. All information presented is fictitious in nature. 2017</p>
        <div id="buddy">
            <img src="img/buddy_verified.png">
        </div>
    </body>
</html>