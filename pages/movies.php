<?php
// Call Movies API using CURL
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => 'http://www.omdbapi.com/?apikey=d8ecb486&s=red',
    CURLOPT_TIMEOUT => 5,
    CURLOPT_CONNECTTIMEOUT => 5,
    CURLOPT_FAILONERROR => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
));

$result = json_decode(curl_exec($ch), true);

$movies = [];
$error = false;
// Validate response
filter_var($result['Response'], FILTER_VALIDATE_BOOLEAN) ? $movies = $result['Search'] : $error = true;
?>

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
  <a href="/server/logout.php" class="logout">logout</a>
  <section class="header">
    <div class="title">Movies</div>
  </section>
  <section class="movies">
      <?php foreach ($movies as $movie): ?>
        <div class="movie" data-year="<?php echo $movie['Year'] ?>">
          <div class="movie-poster">
            <img src="<?php echo $movie['Poster'] ?>" alt="<?php echo $movie['Title'] ?>">
          </div>
          <div class="movie-title"><?php echo $movie['Title'] ?></div>
          <div><?php echo $movie['Year'] ?></div>
        </div>
      <?php endforeach; ?>

      <?php if ($error): ?>
        API error, please make sure Posters API is working.
      <?php endif; ?>
    <div class="message">Thank you!</div>
  </section>
</main>
<script type="text/javascript" src="/js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="/js/movies.js"></script>
</body>
</html>
