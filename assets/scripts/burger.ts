const burger = document.querySelector(".burger");
const burgerLineOne = document.querySelector(".burger__line--top");
const burgerLineTwo = document.querySelector(".burger__line--bottom");
const menu = document.querySelector(".menu");

// Handle functions
const handleBurgerMouseEntered = () => {
    burgerLineOne.classList.add("burger__line--top--hover");
    burgerLineTwo.classList.add("burger__line--bottom--hover");

    if (menu.classList.contains("menu--active")) {
        burgerLineOne.classList.add("burger__line--top--hover");
        burgerLineTwo.classList.add("burger__line--bottom--hover");
        burgerLineOne.classList.remove("burger__line--top--active");
        burgerLineTwo.classList.remove("burger__line--bottom--active");
    }
};

const handleBurgerMouseLeaved = () => {
    burgerLineOne.classList.remove("burger__line--top--hover");
    burgerLineTwo.classList.remove("burger__line--bottom--hover");

    if (menu.classList.contains("menu--active")) {
        burgerLineOne.classList.add("burger__line--top--active");
        burgerLineTwo.classList.add("burger__line--bottom--active");
    }
};

const handleBurgerClicked = () => {
    burgerLineOne.classList.add("burger__line--top--active");
    burgerLineTwo.classList.add("burger__line--bottom--active");

    if (menu.classList.contains("menu--active")) {
        burgerLineOne.classList.remove("burger__line--top--active");
        burgerLineTwo.classList.remove("burger__line--bottom--active");
    }

    menu.classList.toggle("menu--active");
};

// Add event listeners
burger.addEventListener("mouseenter", handleBurgerMouseEntered);

burger.addEventListener("mouseleave", handleBurgerMouseLeaved);

burger.addEventListener("click", handleBurgerClicked);
