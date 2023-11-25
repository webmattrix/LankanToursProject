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
        document.getElementById('city_img').src = responseObj.img;

        // var things  = document.getElementById('things');

        // responseObj.images.forEach(function (image) {
        //     var cardElement = document.createElement("div");
        //     cardElement.className = "card";
    
        //     var imgElement = document.createElement("img");
        //     imgElement.src = image.path;
        //     imgElement.alt = "Card 1";
    
        //     var overlayElement = document.createElement("div");
        //     overlayElement.className = "card-overlay";

        //     var span = document.createElement("span");
        //     span.innerText = "whale watching";
    
        //     cardElement.appendChild(imgElement);
        //     cardElement.appendChild(overlayElement);
        //     overlayElement.appendChild(span);

        //     things.appendChild(cardElement);
        // });
      }
    };
  
    r.open(
      "GET",
      "/LankanToursProject/assets/model/showCity.php?id=" +
        id,
      true
    );
    r.send();
}