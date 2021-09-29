<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Contact Us</title>
    </head>
    <body>
       <header class="header">
            <nav>
                <ul>
                    <li><a href="file1.html">Home</a></li>
                    <li><a href="">About</a></li>
                </ul>   
            </nav>
        </header>
        
        <div class="contact">
            <h2>Contact Us</h2>
            <form method="POST" action="" id="demo-form">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="text" name="phone" placeholder="Phone No" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Write something about this page" required></textarea><br>
                <div class="g-recaptcha" data-sitekey="6Lc7R_AbAAAAAA95lAOtBL54juAI6Ol8qJ8dzc9g"></div><br>
                <input type="submit" name="submit" value="Send Message" required class="submit">
                <br>
            </form>
            <div class="status">
              <?php
                if(isset($_POST['submit'])){
                  $user_name = $_POST['name'];
                  $phone = $_POST['phone'];
                  $user_email = $_POST['email'];
                  $user_message = $_POST['message'];
                  

                  $email_from = 'nasrin1706351@outlook.com';
                  $email_subject = 'New Form Submission';
                  $email_body = "Name: $user_name.\n".
                                "Phone: $phone.\n"."Email: $user_email.\n"."User Message: $user_message.\n";
                $to_eamil = "nasrin79991@gmail.com";
                $headers = 'From: $email_from \r\n';
                $headers .= 'Reply-to: $user_email\r\n';

                $secretkey = '6Lc7R_AbAAAAALev69AUr6RB5oIYpqz3NJ04YTl2';
                $responsekey = $_POST['g-recaptcha-response'];
                $userip = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey&remoteip=$userip";

                $response = file_get_contents($url);
                $response = json_decode($response);

                if($response->success){
                  mail($to_eamil,$email_subject,$email_body,$headers);
                  echo "Message sent successfully";
                }
                else{
                  echo "<span> Invalid Captcha, Please Try Again </span>";
                }

                              }
              
              ?>
          </div>
        </div>
       
    </body>
</html>