$(document).ready(function() {
  let showForm = $('.builders__join-btn');
  let closeForm = $('.join__form-close');
  let form = $('.builders__join');
  let quotes = $('.builders__quotes');
  
  showForm.on('click', function() {
    quotes.toggleClass('active');
    form.toggleClass('active');
  })

  closeForm.on('click', function() {
    quotes.toggleClass('active');
    form.toggleClass('active');
  })

  // form.on('submit', function() {
  //   quotes.toggleClass('active');
  //   form.toggleClass('active');
  // })

  let languageForm = $('.languages-form');
  let changeLanguage = 'http://brotherhood.com/setlocale/' + $('.languages-form select').change().val();
  $('.languages-form select').change(function () {
    languageForm.attr('action', changeLanguage).submit();
  })
});
