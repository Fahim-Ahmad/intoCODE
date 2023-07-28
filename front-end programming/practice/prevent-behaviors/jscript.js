let preventElements = document.querySelectorAll('.prevent-behavior');
// console.log(preventElements)

preventElements.forEach(preventElement => {
    // console.log(preventElement.classList)

    if (preventElement.classList.contains('prevent-paste')) {
        // console.log('prevent paste');

        preventElement.addEventListener('paste', function(event) {
            event.preventDefault();
            alert("Pasting text is not allowed in this input.");
        })

    } else if (preventElement.classList.contains('prevent-copy')) {
        // console.log('prevent copy');

        preventElement.addEventListener('copy', function(event) {
            event.preventDefault();
            alert("Copying is not allowed for this text.");
        })

    } else if (preventElement.classList.contains('prevent-select')) {
        // console.log('prevent select');

        preventElement.addEventListener('selectstart', function(event) {
            event.preventDefault();
        })

    } else if (preventElement.classList.contains('prevent-type')) {
        // console.log('prevent type');

        preventElement.addEventListener('keypress', function(event) {
            event.preventDefault();
            alert("Writing text is not allowed in this box.");
        })

    }

})

