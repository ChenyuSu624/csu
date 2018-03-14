<?php
    if (isset($_GET['firstName']) && isset($_GET['lastName'])) {
        
        $firstName = $_GET['firstName'];
        $lastName = $_GET['lastName'];
    
    }
    else {
        echo "You have to enter both First and Last Name...";
    }
    
    function checkedAns($ans)
    {
      if($ans == $_GET['ans'])
      {
        echo "selected";
      }
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
            What's the full name of China<br/>
                <input type="text" name="textans1" placeholder="Enter your answer" value = "<?=$_GET['ans1']?>"/>
        </div>
        <hr>
        <input type="submit" value="Submit">
        <br/>
        </form>

    </body>
</html>