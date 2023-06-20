function browserGreeting() {
    const language = navigator.language; // haalt de taal van de webrowers op
    let greeting = "";  // maak een lege string 
  
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
      greetingElement.textContent = greeting;  // textcontent string property
    }
  }
  
  window.addEventListener("DOMContentLoaded", browserGreeting); // Deze code voegt een functie toe die wordt uitgevoerd zodra de webpagina volledig is geladen.
    
    