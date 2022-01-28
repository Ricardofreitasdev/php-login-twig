/* eslint-disable linebreak-style */

const btnToggle = document.querySelector('#btn-sidebar');

if (btnToggle) {
  btnToggle.addEventListener('click', () => {
    document.querySelector('.sidebar').classList.toggle('small');
  });
}
