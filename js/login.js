$(function () {
  const loginForm = $('.loginForm form');

  if (loginForm.length > 0) {
    loginForm.on('submit', (event) => {
      event.preventDefault();

      $.ajax({
        url: loginForm.attr('action'),
        type: 'post',
        data: {
          username: loginForm.find('#username').val(),
          password: loginForm.find('#password').val()
        },
        success: () => {
          window.location.href = "/";
        },
        error: () => {
          loginForm.find('.error').html('Wrong credentials!')
        },
      });
    });
  }
});
