
const adminBoxes = document.querySelectorAll('.admin-box'); // get all boxes

adminBoxes.forEach((box01, index01) => {
  const expandSpan = box01.querySelector('.box-expand');
  const titleSpan = box01.querySelector('.box-title');
  const innerContent = box01.querySelector('.admin-box-inner-contents');

  expandSpan.addEventListener('click', () => {
    const isOpen = box01.classList.contains('expand-active');

    // Close all other open toggles
    adminBoxes.forEach((box02, Index02) => {
      if (Index02 !== index01) {
        box02.classList.remove('expand-active');
        box02.classList.remove('always-first');
        box02.querySelector('.box-expand').innerText = '';
        box02.setAttribute('style', 'z-index:1');
        box02.querySelector('.box-title').classList.remove('hide');
        box02.querySelector('.admin-box-inner-contents').classList.add('hide');
      }
    });

    // Toggle the clicked box
    box01.classList.toggle('expand-active'); // expand the box
    box01.classList.toggle('always-first'); // move the box at first position
    titleSpan.classList.toggle('hide'); // hide box title
    innerContent.classList.toggle('hide'); // show box contents

    if (box01.classList.contains('expand-active')) {
      expandSpan.innerText = 'x';
      box01.setAttribute('style', 'z-index:0');
    } else {
      expandSpan.innerText = '';
      box01.setAttribute('style', 'z-index:1');
    }

  });
});