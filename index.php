<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pass Generator</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
<body>
    <main class="main-container">
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

                <div class="field-container encrypted-password-container">
                    <label for="">Encrypted Password</label>
                    <div id="encryptedpass-text" class="encryptedpass-text display-ib muted-invert fw-light">Generated Password will be here</div>
                </div>
            </div>
            
        </form>
    </main>

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

    <script src="assets/scripts/main.js"></script>
</body>
</html>