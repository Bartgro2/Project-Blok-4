function browserGreeting() {
    const language = navigator.language;
    let greeting = "";
  
    if (language === "en") {
      greeting = "Hello,";
    } else if (language === "fr") {
      greeting = "Bonjour,";
    } else if (language === "es") {
      greeting = "¡Hola,";
    } else {
      greeting = "welkom,";
    }
  
    const greetingElement = document.getElementById("greeting");
    if (greetingElement) {
      greetingElement.textContent = greeting;
    }
  }
  
  window.addEventListener("DOMContentLoaded", browserGreeting);
    
    