import gsap from "gsap";
import { isMobile } from "./utils/isMobile";

const menu = document.querySelector(".menu");
const menuBgLayer = document.querySelector(".menu__bg__layer") as HTMLElement;
const menuLinks = document.querySelectorAll(
    ".menu__link"
) as NodeListOf<HTMLLinkElement>;
const burger = document.querySelector(".burger");
const burgerLineOne = document.querySelector(".burger__line--top");
const burgerLineTwo = document.querySelector(".burger__line--bottom");

/* Gsap animations */
const menuTimeline = gsap.timeline({ paused: true });

menuTimeline.to(menu, {
    duration: 0.5,
    opacity: 1,
    visibility: "visible",
    ease: "power3.inOut",
});

menuTimeline.to(
    menuLinks,
    {
        duration: 1,
        y: "-50%",
        stagger: 0.1,
        ease: "power3.inOut",
    },
    "-=0.5"
);

menuTimeline.reverse();

/* Handle burger animation's functions */
const handleBurgerMouseEntered = () => {
    if (isMobile()) {
        burgerLineOne.classList.add("burger__line--top--hover");
        burgerLineTwo.classList.add("burger__line--bottom--hover");

        if (menu.classList.contains("menu--active")) {
            burgerLineOne.classList.add("burger__line--top--hover--active");
            burgerLineTwo.classList.add("burger__line--bottom--hover--active");
            burgerLineOne.classList.remove("burger__line--top--active");
            burgerLineTwo.classList.remove("burger__line--bottom--active");
        }
    }
};

const handleBurgerMouseLeaved = () => {
    if (isMobile()) {
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
        burgerLineOne.classList.remove("burger__line--top--hover--active");
        burgerLineTwo.classList.remove("burger__line--bottom--hover--active");
    }

    menu.classList.toggle("menu--active");
};

/* Handle hover link animation's functions */
// const handleChangeMenuImgBgLayerMouseEnter = async (e: Event) => {
//     const target = e.target as HTMLLinkElement;

//     menuBgLayer.style.setProperty(
//         "--bgLayerMenuImg",
//         `url(${target.dataset.bg})`
//     );

//     e.target.addEventListener("transitionstart", () => {
//         menuLinks.forEach((link) => {
//             link.removeEventListener(
//                 "mouseover",
//                 handleChangeMenuImgBgLayerMouseEnter
//             );
//         });
//     });

//     e.target.addEventListener("transitionend", () => {
//         menuLinks.forEach((link) => {
//             link.addEventListener(
//                 "mouseover",
//                 handleChangeMenuImgBgLayerMouseEnter
//             );
//         });
//     });
// };

const handleChangeMenuImgBgLayerMouseEnter = async (e: Event) => {
    const target = e.target as HTMLLinkElement;

    await removeEventListenerOnLinks(e);

    menuBgLayer.style.setProperty(
        "--bgLayerMenuImg",
        `url(${target.dataset.bg})`
    );

    await addEventListenerOnLinks(e);
};

const removeEventListenerOnLinks = async (e: Event) => {
    menuLinks.forEach((link) => {
        e.target.removeEventListener(
            "transitionstart",
            handleChangeMenuImgBgLayerMouseEnter
        );
    });
};

const addEventListenerOnLinks = async (e: Event) => {
    menuLinks.forEach((link) => {
        e.target.addEventListener(
            "transitionend",
            handleChangeMenuImgBgLayerMouseEnter
        );
    });
};

/* Add event listeners */
burger.addEventListener("mouseenter", handleBurgerMouseEntered);

burger.addEventListener("mouseleave", handleBurgerMouseLeaved);

burger.addEventListener("click", handleBurgerClicked);

menuLinks.forEach((link) => {
    link.addEventListener("mouseover", handleChangeMenuImgBgLayerMouseEnter);
});
