window.addEventListener("orientationchange", function() {
  var title = document.querySelector("#title");
  
  if (window.orientation === 0 || window.orientation === 180) {
    title.textContent = "Hi, please rotate your device :)";
    document.body.style.backgroundColor = '#17a2b8';
  } else {
    title.textContent = "Congrats! You managed it.";
    document.body.style.backgroundColor = '#e1ff00';
  }
});