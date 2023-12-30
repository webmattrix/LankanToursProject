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

function showCity(id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
      if (r.readyState == 4) {
        var t = r.responseText;
        var responseObj = JSON.parse(t);
        document.getElementById('city_container').classList.remove('d-none');
        document.getElementById('city_container').classList.add('d-block');
        document.getElementById('text_img').innerText = responseObj.city;
        document.getElementById('things_text').innerText = "Places to visit in " + responseObj.city;
        document.getElementById('city_img').src = "./assets/img/City/"+responseObj.img;

        const placesContainer = document.getElementById('things');

        placesContainer.innerHTML = '';

        responseObj.places.forEach(place => {
            const card = document.createElement('div');
            card.classList.add('card');
        
            const cardImg = document.createElement('img');
            cardImg.src = "./assets/img/places/"+place.image_path;
            cardImg.alt = place.place_name;
        
            const cardOverlay = document.createElement('div');
            cardOverlay.classList.add('card-overlay');
            const span = document.createElement('span');
            span.textContent = place.place_name;
        
            cardOverlay.appendChild(span);
            card.appendChild(cardImg);
            card.appendChild(cardOverlay);
        
            placesContainer.appendChild(card);
        });
      }
    };
  
    r.open(
      "GET",
      "../assets/model/showCity.php?id=" +
        id,
      true
    );
    r.send();
}