$(function () {
  const movies = $('.movies');

  // Display thank you message after 30 seconds
  setTimeout(() => {
    movies.find('.message').css('display', 'block');
  }, 30000);

  // Show/hide movies based on screen width
  const toggleMovies = () => {
    if (movies.length > 0) {
      if (window.innerWidth <= 767) {
        movies.find('.movie').each((index, movie) => {
          movie = $(movie);
          movie.data('year') <= 2000 && movie.css('display', 'none');
        })
      } else {
        movies.find('.movie').each((index, movie) => {
          movie = $(movie);
          movie.css('display', 'block');
        })
      }
    }
  };

  toggleMovies();

  // run toggleMovies on screen resize
  $(window).on('resize', () => {
    toggleMovies();
  })
});
