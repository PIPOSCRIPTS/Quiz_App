<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Question:<input type="text" name="question" placeholder="Question">
        <br>
        <label for="answer1">a:</label>
        <input id="answer1" type="text" name="answer1" placeholder="Answer 1">
        <br>
        <label for="answer2">b:</label>
        <input id="answer2" type="text" name="answer2" placeholder="Answer 2">
        <br>
        <label for="answer3">c:</label>
        <input id="answer3" type="text" name="answer3" placeholder="Answer 3">
        <br>
        <label for="answer4">d:</label>
        <input id="answer4" type="text" name="answer4" placeholder="Answer 4">                                         
        <br>
        <label for="correct">Correct:</label>
        <input id="correct" type="text" name="correct" placeholder="Correct">
        <button name="add">Add</button>
        <br>
        <br>
        <br>
        <button name="cleardata">clear</button>
    </form>
    <?php
    if (isset($_POST["add"])) {
        $question = $_POST["question"];
        $answer1 = $_POST["answer1"];
        $answer2 = $_POST["answer2"];
        $answer3 = $_POST["answer3"];
        $answer4 = $_POST["answer4"];
        $correct = $_POST["correct"];
        
        
        
        $data ="\n".$question."\n".$answer1."\n".$answer2."\n".$answer3."\n".$answer4."\n".$correct;
        file_put_contents("data.txt",$data,FILE_APPEND);
        $gttxtdata = file_get_contents("data.txt");
        $arr = explode("\n",$gttxtdata);
        file_put_contents("text.json","[");
        
        
        
        for ($i = 1; $i < count($arr); $i+= 6) {
            $ques = $arr[$i];
            $ans1 = $arr[$i+1];
            $ans2 = $arr[$i+2];
            $ans3 = $arr[$i+3];
            $ans4 = $arr[$i+4];
            $corr = $arr[$i+5];
            $jsondata ='"question"'.':"'.$ques.'",'."\n".'"a"'.':"'.$ans1.'",'."\n".'"b"'.':"'.$ans2.'",'."\n".'"c"'.':"'.$ans3.'",'."\n".'"d"'.':"'.$ans4.'",'."\n".'"correct"'.':"'.$corr.'"'."\n";
            
            file_put_contents("text.json","{".$jsondata."},",FILE_APPEND);
        }
        file_put_contents("text.json",'{"question":"1+1",'."\n".'"a":"2",'."\n".'"b":"3",'."\n".'"c":"4",'."\n".'"d":"5",'."\n".'"correct":"a"'."\n".'}]',FILE_APPEND);
    }
    if (isset($_POST['cleardata'])) {
    	file_put_contents("text.json"," ");
    	file_put_contents("data.txt"," ");
    }
    
    
    ?>
</body>
</html>