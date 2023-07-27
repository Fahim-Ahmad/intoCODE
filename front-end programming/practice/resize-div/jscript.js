
const adminBoxes = document.querySelectorAll('.admin-box'); // get all boxes

adminBoxes.forEach(box => {
    const expandSpan = box.querySelector('.box-expand');
    const titleSpan = box.querySelector('.box-title');
    const innerContent = box.querySelector('.admin-box-inner-contents');
    

    expandSpan.addEventListener('click', () => {
      box.classList.toggle('expand-active'); // expand the box
      box.classList.toggle('always-first'); // move the box at first position
      titleSpan.classList.toggle('hide'); // hide box title
      innerContent.classList.toggle('hide'); // show box contents

      if(box.classList.contains('expand-active')) {
        expandSpan.innerText = 'x';
        box.setAttribute('style', 'z-index:0');
      } else {
        expandSpan.innerText = '';
        box.setAttribute('style', 'z-index:1');
      }
      
    });
  }
);

