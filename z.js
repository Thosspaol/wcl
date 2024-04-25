sendNotification("info", "Hello user!");

function sendNotification(type, text) {
  let notificationBox = document.querySelector(".notification-box");
  const alerts = {
    success: {
      icon: `<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>`,
      color: "green-500"
    }
  };
  let component = document.createElement("div");
  component.className = `relative flex items-center bg-${alerts[type].color} text-white text-sm font-bold px-4 py-3 rounded-md opacity-0 transform transition-all duration-500 mb-1`;
  component.innerHTML = `${alerts[type].icon}<p>${text}</p>`;
  notificationBox.appendChild(component);
  setTimeout(() => {
    component.classList.remove("opacity-0");
    component.classList.add("opacity-1");
  }, 1); //1ms For fixing opacity on new element
  setTimeout(() => {
    component.classList.remove("opacity-1");
    component.classList.add("opacity-0");
    //component.classList.add("-translate-y-80"); //it's a little bit buggy when send multiple alerts
    component.style.margin = 0;
    component.style.padding = 0;
  }, 5000);
  setTimeout(() => {
    component.style.setProperty("height", "0", "important");
  }, 5100);
  setTimeout(() => {
    notificationBox.removeChild(component);
  }, 5700);
  //If you can do something more elegant than timeouts, please do, but i can't
}