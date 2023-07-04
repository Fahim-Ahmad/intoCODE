
function displayResult() {
  var htmlElement = document.querySelector("#html").value;
  var cssElement = document.querySelector("#css").value;
  // console.log(htmlElement);
  // console.log(cssElement)

  var resultElement = document.querySelector("#result");
  resultElement.innerHTML = '<div class="output-box">' + htmlElement + "</div>";
  // console.log(resultElement);

  var cssElement = cssElement.split("}");
  // console.log(cssElement)
  var cssElementUpdate = "";
  for (var i = 0; i < cssElement.length; i++) {
    var line = cssElement[i].trim();
    // console.log(line)
    // console.log(line.length);
    // console.log(line.length > 0);
    if (line.length > 0) {
    cssElementUpdate += '.output-box ' + line + '}\n';
    }
  }

  var cssStyle = document.createElement("style");
  // console.log(cssStyle);
  cssStyle.textContent = cssElementUpdate;
  console.log(cssStyle);

  resultElement.prepend(cssStyle);
}

function handleDragOver(event) {
  event.preventDefault();
  event.dataTransfer.dropEffect = "copy";
  // console.log(event.dataTransfer.dropEffect);
}

function handleFileDrop(event) {
  event.preventDefault();

  var files = event.dataTransfer.files;
  // console.log('files:', files);

  var filesTable = document.querySelector(".files-list");
  // console.log('filesTable:', filesTable);

  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    // console.log('file:', file);

    var fileName = document.createElement("span");
    fileName.innerText = file["name"];
    // console.log('fileName:', fileName);

    var uuid = document.createElement("span");
    uuid.className = "hidden";
    uuid.innerText = URL.createObjectURL(file);
    // console.log('uuid:', uuid);

    var copyBtn = document.createElement("button");
    copyBtn.innerText = "Copy";
    copyBtn.classList.add("copy-btn");
    copyBtn.addEventListener("click", createCopyHandler(uuid.innerText));

    var showBtn = document.createElement("button");
    showBtn.innerText = "Preview";
    showBtn.classList.add("show-btn");
    showBtn.addEventListener("click", createShowHandler(uuid.innerText));

    var tableRow = document.createElement("tr");
    tableRow.appendChild(document.createElement("td")).appendChild(fileName);
    tableRow.appendChild(document.createElement("td")).appendChild(uuid);
    tableRow.appendChild(document.createElement("td")).appendChild(copyBtn);
    tableRow.appendChild(document.createElement("td")).appendChild(showBtn);

    filesTable.appendChild(tableRow);
  }

  console.log(filesTable);
}

function createCopyHandler(text) {
  return function () {
    var dummyElement = document.createElement("textarea");
    dummyElement.value = text;
    document.body.appendChild(dummyElement);
    dummyElement.select();
    document.execCommand("copy");
    document.body.removeChild(dummyElement);
  };
}

function createShowHandler(url) {
  return function () {
    window.open(url, "_blank");
  };
}
