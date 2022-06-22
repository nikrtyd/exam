if (document.querySelector('#show_add_photo')) {
  document.querySelector('#show_add_photo').addEventListener('click', function () {
    document.querySelector('#add_new_photo').classList.add('open');
  });

  document.querySelector('#cancel').addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector('#add_new_photo').classList.remove('open');
  });
}

let header_button = document.querySelector('.mobile_icon');
header_button.addEventListener('click', function () {
  let header = document.querySelector('header');
  if (header.classList.contains('open')) {
    header.classList.remove('open');
    header_button.querySelector('img').src = 'menu.png';
  }
  else {
    header.classList.add('open');
    header_button.querySelector('img').src = 'close.png';
  }
});
