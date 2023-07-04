document.addEventListener('mousemove', function(point) {
    var div = document.querySelector('#follow');
    var divArea = div.getBoundingClientRect();
    // console.log('div top:', divArea.top, 'div right:', divArea.right, 'div bottom:', divArea.bottom, 'div left:', divArea.left)

    var mouseX = point.clientX;
    var mouseY = point.clientY;
    // console.log('Mouse Point X:', mouseX, '-Mouse Point Y:', mouseY)

    
    if (mouseX < divArea.left || mouseX > divArea.right) {
        div.style.left = mouseX + 'px';
    }
    
    if (mouseY < divArea.top || mouseY > divArea.bottom) {
        div.style.top = mouseY + 'px';
    }

    // direction left
    if (mouseX < divArea.left){
        document.querySelector('#direction').innerText = 'Going left';
    }

    // direction right
    if (mouseX > divArea.right){
        document.querySelector('#direction').innerText = 'Going right';
    }

    // direction up
    if (mouseY < divArea.top){
        document.querySelector('#direction').innerText = 'Going up';
    } 
    if (mouseY < divArea.top && mouseX < divArea.left) {
        document.querySelector('#direction').innerText = 'Going up left';
    }
    if (mouseY < divArea.top && mouseX > divArea.right) {
        document.querySelector('#direction').innerText = 'Going up right';
    }

    // direction down
    if (mouseY > divArea.bottom){
        document.querySelector('#direction').innerText = 'Going down';
    } 
    if (mouseY > divArea.bottom && mouseX < divArea.left) {
        document.querySelector('#direction').innerText = 'Going down left';
    }
    if (mouseY > divArea.bottom && mouseX > divArea.right) {
        document.querySelector('#direction').innerText = 'Going down right';
    }

    if (
        mouseX >= divArea.left &&
        mouseX <= divArea.right &&
        mouseY >= divArea.top &&
        mouseY <= divArea.bottom
    ) {
        document.querySelector('#direction').innerHTML = '&hearts;';
    }

})

