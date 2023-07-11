const ul = `
<ul>
   <li>one</li>
   <li>two</li>
   <li>three</li>
</ul>
`
const myDiv = document.querySelector('.sec');

myDiv.innerHTML = ul;

const img = document.createElement('img');
img.src = "https://picsum.photos/500";
img.width = 250
img.height = 250
img.classList.add('cute')
img.alt = "Cute Puppy"

myDiv.appendChild(img)

const myHTML = `
<div class="fDiv">
   <p>paragraph one</p>
   <p>paragraph two</p>
</div>
`

const ulElement = myDiv.querySelector('ul')
ulElement.insertAdjacentHTML('beforebegin', myHTML)

const fDiv = myDiv.querySelector('.fDiv');
fDiv.children[1].classList.add('warning')
fDiv.firstElementChild.remove();

function generatePlayerCard(name, age, height) {
    const html =  `
      <div class="playercard">
          <h2>${name} - ${age}</h2>
          <p>They are ${height} and ${age} years old. In Dog years this person 
             would be ${age * 7 }. That would be a tall dog!</p>
          <button class="delete" type="button">&times Delete</button>
      </div>
    `
    return html;
}

const cards = document.createElement('div')
cards.classList.add('cards');

let cardsHTML = generatePlayerCard('wes', 12, 150);
cardsHTML += generatePlayerCard('kokok', 12, 150);
cardsHTML += generatePlayerCard('carren', 12, 150);
cardsHTML += generatePlayerCard('scott', 12, 150);


myDiv.insertAdjacentElement('beforebegin', cards);

cards.innerHTML = cardsHTML;

const button = document.querySelectorAll(".delete");

//delete function
function deleteCard(event) {
    const buttonClicked = event.currentTarget;
    buttonClicked.parentElement.remove()
}

button.forEach(button => button.addEventListener('click', deleteCard))
