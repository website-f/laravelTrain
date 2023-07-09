const p = document.querySelector('h2');
const button = document.querySelector('.klik');
button.addEventListener("click", function() {
    if (p.innerText != "KOKOK I am Head" && p.classList != "tist") {
    p.insertAdjacentText("afterbegin", " KOKOK ");
    p.classList.toggle("tist") 
    } else {
        p.innerText = "I am Head"
        p.classList.toggle("tist")
    }
})

const myDiv = document.querySelector('.sec')
const myParagraph = document.createElement('p')
myParagraph.textContent = "I am P"
myParagraph.classList.add('tist')

p.insertAdjacentElement('afterend',myParagraph)
