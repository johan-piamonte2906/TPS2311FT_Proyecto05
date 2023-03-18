const btnCart = document.querySelector('.menu')
const containerCartProducts = document.querySelector('.cars-shoope')

btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart')
})