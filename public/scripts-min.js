class Tabs{constructor(t,e,s,i){this.selectedTab=0,this.formLogin=t,this.formRegister=e,this.loginTab=s,this.registerTab=i}activeTab(t){1===t?(this.loginTab.classList.remove("tab-active"),this.registerTab.classList.add("tab-active"),this.formLogin.classList.remove("active"),this.formRegister.classList.add("active")):(this.loginTab.classList.add("tab-active"),this.registerTab.classList.remove("tab-active"),this.formRegister.classList.remove("active"),this.formLogin.classList.add("active"))}init(){this.loginTab.addEventListener("click",()=>{this.selectedTab=0,this.activeTab(this.selectedTab)}),this.registerTab.addEventListener("click",()=>{this.selectedTab=1,this.activeTab(this.selectedTab)})}}const TAB=new Tabs(document.querySelector("#form-login"),document.querySelector("#form-register"),document.querySelector("#tab-login"),document.querySelector("#tab-register"));TAB.init();