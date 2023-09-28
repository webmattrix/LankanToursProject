window.onscroll = () => {
  console.log(scrollY);
  if (scrollY > 100) {
    document.getElementById("headerContainer").style.opacity = 0.8;
  } else {
    document.getElementById("headerContainer").style.opacity = 1;
  }
};

document.getElementById("headerContainer").addEventListener("mousemove", () => {
  document.getElementById("headerContainer").style.opacity = 1;
});

document
  .getElementById("headerContainer")
  .addEventListener("mouseleave", () => {
    if (scrollY > 100) {
      document.getElementById("headerContainer").style.opacity = 0.8;
    }
  });

document
  .getElementById("headerMorePanel")
  .addEventListener("mouseout", () => {});

document.getElementById("headerMoreIcon").addEventListener("click", () => {
  document.getElementById("headerMorePanel").classList.toggle("d-none");
});
