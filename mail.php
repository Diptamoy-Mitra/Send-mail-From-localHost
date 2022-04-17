<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail Using PHP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row ">
            <div class="col-md-4 offset-md-4 mail-form ">
                <h2 class="text-center">Send Message</h2>
                <p class="text-center">Send mail to anyone from Localhost.</p>
                <!-- starting PHP CODE -->
                <?php
                   // if user click on send button
                   if(isset($_POST['send'])){
                       //getting all user entered data
                       $recipient=$_POST['email'];
                       $subject=$_POST['subject'];
                       $message=$_POST['message'];
                       $sender="From: mitradiptamoy70@gmail.com";
                       //if user leave empty among of them
                       if(empty($recipient) || empty($subject)||empty( $message)){
                            ?>
                            <!-- dispaly an alert message if one of field is empty -->
                            <div class="alert alert-danger text-center">
                                <?php echo "All input fields are required! " ?>
                            </div>
                            <?php
                       }
                       else{
                           //PHP function to send mail
                           if(mail($recipient, $subject, $message ,$sender)){
                            ?>
                            <!-- display a successfull message if once mail sent successfully -->

                            <div class="alert alert-success text-center">
                                <?php echo "Your mail sent successfully to $recipient" ?>
                            </div>
                            <?php
                            
                           }
                           else{
                               ?>
                            <!-- display an alert message if some how mail can't send  -->

                            <div class="alert alert-danger text-center">
                                <?php echo "Failed while sending your mail !" ?>
                            </div>
                            <?php
                           }
                       }
                   }

                ?>
                <!-- End php code  -->
                <form action="mail.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Recipients">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="10" class="form-control textarea"
                            placeholder="Compose message.."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="form-control button btn-primary" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>