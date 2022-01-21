/* eslint-disable linebreak-style */

class Tabs {
  // eslint-disable-next-line no-shadow
  constructor(formLogin, formRegister, loginTab, registerTab) {
    this.selectedTab = 0;
    this.formLogin = formLogin;
    this.formRegister = formRegister;
    this.loginTab = loginTab;
    this.registerTab = registerTab;
  }

  // eslint-disable-next-line class-methods-use-this
  activeTab(tab) {
    if (tab === 1) {
      this.loginTab.classList.remove('tab-active');
      this.registerTab.classList.add('tab-active');
      this.formLogin.classList.remove('active');
      this.formRegister.classList.add('active');
    } else {
      this.loginTab.classList.add('tab-active');
      this.registerTab.classList.remove('tab-active');
      this.formRegister.classList.remove('active');
      this.formLogin.classList.add('active');
    }
  }

  init() {
    this.loginTab.addEventListener('click', () => {
      this.selectedTab = 0;
      this.activeTab(this.selectedTab);
    });

    this.registerTab.addEventListener('click', () => {
      this.selectedTab = 1;
      this.activeTab(this.selectedTab);
    });
  }
}

const TAB = new Tabs(
  document.querySelector('#form-login'),
  document.querySelector('#form-register'),
  document.querySelector('#tab-login'),
  document.querySelector('#tab-register'),
);

TAB.init();
