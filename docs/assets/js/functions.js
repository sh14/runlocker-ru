// получаемобъект по селектору
function j (selector) {
  return document.querySelectorAll(selector)
}

// добавить класс к элементу
function addClass (obj, className) {
  let classes = obj.classList
  let newClasses = []
  classes.forEach((item) => {
    newClasses.push(item + '_' + className)
  })
  newClasses.push(className)
  // obj.className = classes.join(' ') + ' ' + newClasses.join(' ')
  obj.className += ' ' + newClasses.join(' ')
}

// удалить класс элемента
function removeClass (obj, className) {
  // obj.classList.map((item) => {return item.className.replace('_' + className, '').replace(' ' + className, '') })
  let classes   = obj.className.split('_' + className).join('').split(' ' + className).join('').split(' ')
  classes       = Array.from(new Set(classes))
  obj.className = classes.join(' ')
}

function toggleMenu () {
  let menu = j('.js-menu')
  menu.forEach((item) => {
    if (item.className.indexOf('show') < 0) {
      addClass(item, 'show')
    } else {
      removeClass(item, 'show')
    }
  })

}
