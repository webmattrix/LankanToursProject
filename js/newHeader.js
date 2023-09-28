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
