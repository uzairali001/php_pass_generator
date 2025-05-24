<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Password Hash</title>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/styles.css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">

<body>
  <main class="main-container">
    <div class="heading-container">
      <h1>Password Hash</h1>
    </div>
    <div class="form-container">
      <form class="myform" action="generate.php" method="post" id="form">
        <div class="content-container">

          <div class="field-container">
            <label for="algo">Algorithm</label>
            <select class="select-field" name="algo">
              <option value="bcrypt">Bcrypt</option>
              <option value="md5">MD5</option>
              <option value="sha1">SHA1</option>
              <option value="sha256">SHA256</option>
              <option value="sha512">SHA512</option>
              <option value="sha3-256">SHA3-256</option>
              <option value="sha3-512">SHA3-512</option>
            </select>
          </div>

          <div class="field-container">
            <label for="plain-text">Plain Password</label>
            <input id="plain-text" class="input-field" name="plain-text" type="password">
          </div>

          <!-- <php echo password_hash("agp@123", PASSWORD_BCRYPT); ?> -->
          <div class="button-container">
            <button class="btn red generate-btn" type="submit">Generate Hash</button>
          </div>

          <div class="field-container encrypted-password-container" data-js="ec_pass_cont">
            <label for="">Hashed Password</label>
            <div id="encryptedpass-text" class="encryptedpass-text display-ib muted-invert fw-light">Generated hash will be here</div>
          </div>
        </div>

      </form>
    </div>
  </main>

  <section class="toast-container">
  </section>

  <script src="assets/scripts/main.js"></script>
</body>

</html>