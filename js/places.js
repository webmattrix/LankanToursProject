const cardSlider = document.querySelector(".card-slider");
const cards = document.querySelector(".cards");
const prevButton = document.getElementById("prev-btn");
const nextButton = document.getElementById("next-btn");
let cardIndex = 0;

nextButton.addEventListener("click", () => {
    const lastCardIndex = cards.children.length - 1;

    if (cardIndex < lastCardIndex) {
        cardIndex++;
        updateCardSlider();

        if (cardIndex >= lastCardIndex - 3) {
            nextButton.disabled = true; // Disable "Next" button when there are 4 or fewer cards left
        }

        prevButton.disabled = false; // Enable "Previous" button
    }
});

prevButton.addEventListener("click", () => {
    if (cardIndex > 0) {
        cardIndex--;
        updateCardSlider();

        if (cardIndex === 0) {
            prevButton.disabled = true; // Disable "Previous" button when the first card is showing
        }

        nextButton.disabled = false; // Enable "Next" button
    }
});

function updateCardSlider() {
    const cardWidth = cards.children[0].offsetWidth;
    const translateX = -cardIndex * cardWidth;
    cards.style.transform = `translateX(${translateX}px)`;
}

// Initially, disable "Previous" button since we start at the first card
prevButton.disabled = true;

if (cards.children.length <= 3) {
    nextButton.disabled = true; // Disable "Next" button when there are 4 or fewer cards left
}