window.addEventListener("orientationchange", function() {
  var title = document.getElementById("title");
  
  if (window.orientation === 0 || window.orientation === 180) {
    title.textContent = "Hi, please rotate your device :)";
    document.body.style.backgroundColor = 'aqua';
  } else {
    title.textContent = "Congrats! You managed it.";
    document.body.style.backgroundColor = '#e1ff00';
  }
});