import gsap from "gsap";

const burger = document.querySelector(".burger");
const burgerLineOne = document.querySelector(".burger__line--top");
const burgerLineTwo = document.querySelector(".burger__line--bottom");
const menu = document.querySelector(".menu");
const links = document.querySelectorAll(".menu__link");

// Gsap animation
const menuTimeline = gsap.timeline({ paused: true });

menuTimeline.to(menu, {
    duration: 0.5,
    opacity: 1,
    visibility: "visible",
    ease: "power3.inOut",
});

menuTimeline.to(
    links,
    {
        duration: 1,
        y: "-50%",
        stagger: 0.1,
        ease: "power3.inOut",
    },
    "-=0.5"
);

menuTimeline.reverse();

// Handle functions
const handleBurgerMouseEntered = () => {
    if (window.innerWidth > 768) {
        burgerLineOne.classList.add("burger__line--top--hover");
        burgerLineTwo.classList.add("burger__line--bottom--hover");

        if (menu.classList.contains("menu--active")) {
            burgerLineOne.classList.add("burger__line--top--hover");
            burgerLineTwo.classList.add("burger__line--bottom--hover");
            burgerLineOne.classList.remove("burger__line--top--active");
            burgerLineTwo.classList.remove("burger__line--bottom--active");
        }
    }
};

const handleBurgerMouseLeaved = () => {
    if (window.innerWidth > 768) {
        burgerLineOne.classList.remove("burger__line--top--hover");
        burgerLineTwo.classList.remove("burger__line--bottom--hover");

        if (menu.classList.contains("menu--active")) {
            burgerLineOne.classList.add("burger__line--top--active");
            burgerLineTwo.classList.add("burger__line--bottom--active");
        }
    }
};

const handleBurgerClicked = () => {
    menuTimeline.reversed(!menuTimeline.reversed());
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
