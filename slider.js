const images = [
    "images/slide1.jpg",
    "images/slide2.jpg",
    "images/slide3.jpg",
    "images/slide4.jpg"
];

let index = 0;

function showSlide() {
    document.getElementById("slide").src = images[index];
}

function nextSlide() {
    index++;

    if (index >= images.length) {
        index = 0;
    }

    showSlide();
}

function prevSlide() {
    index--;

    if (index < 0) {
        index = images.length - 1;
    }

    showSlide();
}

setInterval(nextSlide, 3000);