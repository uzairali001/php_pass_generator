<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PHP Password Generator</title>
    <link rel="stylesheet" href="password/assets/css/reset.css">
    <link rel="stylesheet" href="password/assets/css/styles.css">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
<body>
    <main class="main-container">
        <div class="heading-container">
            <h1>PHP Password Generator</h1>
        </div>
        <div class="form-container">
            <form class="myform" action="generate.php" method="post" id="pass-generate-form">
                <div class="blur"></div>
                <div class="content-container">
                    <div class="field-container plain-password-container">
                        <label for="plain-password">Plain Password</label>
                        <input id="plain-password" class="input" name="plain-password" type="text">
                    </div>
                    
                    <!-- <php echo password_hash("agp@123", PASSWORD_BCRYPT); ?> -->
                    <div class="button-container">
                        <button class="btn red generate-btn" type="submit">Generate</button>
                    </div>

                    <div class="field-container encrypted-password-container" data-js="ec_pass_cont">
                        <label for="">Encrypted Password</label>
                        <div id="encryptedpass-text" class="encryptedpass-text display-ib muted-invert fw-light">Generated Password will be here</div>
                    </div>
                </div>
                
            </form>
        </div>
    </main>

  <section class="toast-container">
  </section>

    <script src="password/assets/scripts/main.js"></script>
</body>
</html>