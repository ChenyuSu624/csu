<?php
    $score = 0;
    $answers = array("The People's Republic of China",'Beijing','1.3 billion','Panda','dog');
    if (isset($_GET['firstName']) && isset($_GET['lastName'])) {
        global $score,$answers;
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
        // if(isset($_GET['ans1']))
        // {
        //     $ans1 = $_GET['ans1'];
        //   if($ans1 == $answers[0])
        //   {
        //       $score += 1;
        //   }
        //   else{
        //       break;
        //   }
        // }
        // if(isset($_GET['ans2']))
        // {
        //     $ans2 = $_GET['ans2'];
        //     if($ans2 == $answers[3])
        //       {
        //           $score += 1;
        //       }
        //       else{
        //           break;
        //       }
        // }        
        // if(isset($_GET['ans3']))
        // {
        //     $ans3 = $_GET['ans3'];
        //     if($ans3 == $answers[4])
        //       {
        //           $score += 1;
        //       }
        //       else{
        //           break;
        //       }
        // }
        // echo "You have earned ".$score." out of 5 points.";
        
    }
    else {
        echo "You have to enter both First and Last Name...";
    }
    
    function checkedAns($ans)
    {
        global $score,$answers;
      if($ans == $_GET['ans'])
      {
        echo "selected";
      }

    // if($ans == $answers[1])
    //   {
    //       $score += 1;
    //   }
    //   else{
    //       break;
    //   }
             
    }
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Chinese Culture Quiz</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <h1>Welcome to Chinese Culture Quiz</h1>
        <hr>
        
        <form>
        <div class="row">
            <div class="col">
                First Name: <br/>
              <input type="text" class="form-control" placeholder="First name" value = "<?=$_GET['firstName']?>"/>
            </div>
            <div class="col">
                Last Name: <br/>
              <input type="text" class="form-control" placeholder="Last name" value = "<?=$_GET['lastName']?>"/>
            </div>
            <div class="col">
            Email address (Optional)<br/>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@gmail.com">
        </div>
        </div>
        <hr>
        <div class="form-group">
            What's the full name of China<br/>
                <input type="text" name="textans1" placeholder="Enter your answer" value = "<?=$_GET['ans1']?>"/>
        </div>
        
        
        <div class="form-group">
                What's the capital city of China?</br/>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option value="" > - Select One - </option> 
                  <option <?=checkedAns('Shanghai')?>>  Shanghai </option>
                  <option <?=checkedAns('Shenyang')?>>  Shenyang </option>
                  <option <?=checkedAns('Beijing')?>>  Beijing </option>
                </select><br />
        </div>
        <div class="form-group">
            What's the population?<br/>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                  <option value="" > - Select One - </option> 
                  <option <?=checkedAns('1.3 billion')?>>  1.3 billion </option>
                  <option <?=checkedAns('1.4 billion')?>>  1.4 billion </option>
                  <option <?=checkedAns('1.2 billion')?>>  1.2 billion </option>
                </select>
        </div>
        
        <div class="form-group">
            Wha are the four Chinese Great Inventions:<br/>
                <input type="text" name="textans1" placeholder="Enter your answer" value = "<?=$_GET['ans2']?>"/>
        </div>
        <div class="form-check">
            What's the national treasure of China?<br/>
              <input type="radio" name="Panda" id="Panda" value="Panda" >
              <label for="Panda"> Panda </label>
              <input type="radio" name="Tiger" id="Tiger" value="Tiger" >
              <label for="Tiger"> Tiger </label>
              <input type="radio" name="Dragon" id="Dragon" value="Dragon" >
              <label for="Dragon"> Dragon </label>
              
        </div>
        <div class="form-group">
            What is the year 2018 in the zodiac animal cycle?<br/>
                <input type="text" name="textans1" placeholder="Enter your answer" value = "<?=$_GET['ans3']?>"/>
        </div>
        <hr>
        <input type="submit" value="Submit">
        <br/>
        </form>

    </body>
</html>