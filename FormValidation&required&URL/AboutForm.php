<!DOCTYPE HTML>  
<html>
  <head>
    <style>
      .error {color: #FF0000;}
    </style>
  </head>
  <body>  

    <?php
      // define variables and set to empty values
      // 定义变量并设置为空值
      $name = $email = $gender = $comment = $website = "";
      $nameErr = $emailErr = $genderErr = $websiteErr = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["name"])) {
                $nameErr = "Name is required";
              } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    // check if name only contains letters and whitespace
                  $nameErr = "Only letters and white space allowed";
                }
              }
              
              if (empty($_POST["email"])) {
                $emailErr = "Email is required";
              } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format";
                }
              }
                
              if (empty($_POST["website"])) {
                $website = "";
              } else {
                $website = test_input($_POST["website"]);
                // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                  $websiteErr = "Invalid URL";
                }
              }
            
              if (empty($_POST["comment"])) {
                $comment = "";
              } else {
                $comment = test_input($_POST["comment"]);
              }
            
              if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
              } else {
                $gender = test_input($_POST["gender"]);
              }
            }


          //$_SERVER['REQUEST_METHOD'] 返回用于访问页面的请求方法（如POST）。
          //$name = test_input($_POST["name"]);
          //$email = test_input($_POST["email"]);
          //$website = test_input($_POST["website"]);
          //$comment = test_input($_POST["comment"]);
          //$gender = test_input($_POST["gender"]);
          
          //test用于赋值给每个
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //从用户输入数据中去除不必要的字符（额外的空格、制表符、换行符）（使用 PHP trim() 函数）
        //从用户输入数据中删除反斜杠 (\)（使用 PHP stripslashes() 函数）
        return $data;
      }
      //这个函数的含义？

    ?>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <!-- 什么是 htmlspecialchars() 函数？
    htmlspecialchars() 函数将特殊字符转换为 HTML 实体。这意味着它将用 < 替换像 < 和 > 这样的 HTML 字符。和 >。
    这可以防止攻击者通过在表单中​​注入 HTML 或 Javascript 代码（跨站点脚本攻击）来利用代码。 -->
      Name: <input type="text" name="name" value="<?php echo $name;?>">
      <span class="error">* <?php echo $nameErr;?></span>
      <br><br>
      E-mail: <input type="text" name="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
      Website: <input type="text" name="website" value="<?php echo $website;?>">
      <span class="error"><?php echo $websiteErr;?></span>
      <br><br>
      Comment: <textarea name="comment" rows="5" cols="40" value="<?php echo $comment;?>"></textarea>
      <!-- </textarea>这条命里的含义 -->
      <br><br>
      Gender:
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other
      <span class="error">* <?php echo $genderErr;?></span>
      <br><br>
      <input type="submit" name="submit" value="Submit">  
    </form>

    <?php
      echo "<h2>Your Input:</h2>";
      echo $name;
      echo "<br>";
      echo $email;
      echo "<br>";
      echo $website;
      echo "<br>";
      echo $comment;
      echo "<br>";
      echo $gender;
    ?>

  </body>
</html>





<!-- <HTML>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            Website: <input type="text" name="website"><br>
            Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
            Gender:
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="other">Other   
        </form>
    </body>
</HTML> -->



