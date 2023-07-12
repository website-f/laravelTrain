

const buyButtons = document.querySelectorAll('.buy');

function handleBuyButtons(event) {
    console.log(parseFloat(event.target.dataset.price));

}

buyButtons.forEach(function(buyButton) {
    buyButton.addEventListener('click', handleBuyButtons);
})