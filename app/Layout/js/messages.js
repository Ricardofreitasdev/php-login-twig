/* eslint-disable linebreak-style */

const messages = document.querySelector('.messages');

window.addEventListener('load', () => {
  setTimeout(() => {
    if (messages.classList.length > 1) {
      messages.classList.remove(messages.classList[1]);
    }
  }, 2000);
});
