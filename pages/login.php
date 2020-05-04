<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabella</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<main class="container">
  <section class="header">
    <div class="title">
        <?php
        if ($GLOBALS['country'] === 'FR'):
            echo "Bienvenu";
        elseif ($GLOBALS['country'] == 'DE'):
            echo "Willkommen";
        else:
            echo "Welcome";
        endif;
        ?>
    </div>
    Please log-in to continue:
  </section>
  <section class="loginForm">
    <form method="POST" action="../server/login.php">
      <div class="error"></div>
      <div class="form-input">
        <label for="username">Username:</label>
        <input type="text" id="username" required>
      </div>
      <div class="form-input">
        <label for="password">Password:</label>
        <input type="password" id="password" required>
      </div>
      <div class="form-submit">
        <input type="submit" value="Submit"/>
      </div>
    </form>
  </section>
</main>
<script type="text/javascript" src="/js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="/js/login.js"></script>
</body>
</html>
