

function setCookie(name, value, days) {
    let expires = '';
    if (days) {
      const date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = `; expires=${date.toUTCString()}`;
    }
    document.cookie = `${name}=${value || ''}${expires}; path=/`;
  }
  
  function getCookie(name) {
    const nameEQ = `${name}=`;
    const cookies = document.cookie.split(';');
    for(let i = 0; i < cookies.length; i++) {
      let cookie = cookies[i];
      while (cookie.charAt(0) === ' ') {
        cookie = cookie.substring(1, cookie.length);
      }
      if (cookie.indexOf(nameEQ) === 0) {
        return cookie.substring(nameEQ.length, cookie.length);
      }
    }
    return null;
  }
  const linkElement = document.getElementById('theme-style');
  let baseurl = window.location.origin;
  function setTheme() {
    
    if (document.getElementById('mode').checked) {
      setCookie('theme', 'dark-mode', 1); // Set cookie for dark mode
      linkElement.href = `${baseurl}/assets/css/dark-mode.css`;
    } else {
      setCookie('theme', 'light-mode', 1); // Set cookie for light mode
      linkElement.href = `${baseurl}/assets/css/style.css`;
    }
    $('.header-top-right ul li .theme-toggle .switch-label').removeClass('darkButton');
    $('.header-top-right ul li .theme-toggle .switch-handle').removeClass('switchDarkButton');
  }
  
  let darkMode = getCookie('theme'); // Retrieve the value of the 'theme' cookie
  console.log(darkMode, "last cookie value");
  if (darkMode === "dark-mode") { // Use strict equality comparison
    linkElement.href = `${baseurl}/assets/css/dark-mode.css`;
    
    $('.header-top-right ul li .theme-toggle .switch-label').addClass('darkButton')
    $('.header-top-right ul li .theme-toggle .switch-handle').addClass('switchDarkButton')
    
    
  } else {
    linkElement.href = `${baseurl}/assets/css/style.css`;
    $('.header-top-right ul li .theme-toggle .switch-label').removeClass('darkButton');
    $('.header-top-right ul li .theme-toggle .switch-handle').removeClass('switchDarkButton');
  }
  
  