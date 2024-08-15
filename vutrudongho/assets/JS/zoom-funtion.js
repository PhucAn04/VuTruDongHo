// zoom-funtion.js

document.addEventListener("DOMContentLoaded", function() {
    const img = document.querySelector('.product_img img');
    const magnifier = document.createElement('div');
    magnifier.classList.add('magnifier');
    document.querySelector('.product_img').appendChild(magnifier);

    img.addEventListener('mousemove', function(event) {
        const { offsetX, offsetY } = event;
        const { width, height } = img.getBoundingClientRect();
        
        // Show the magnifier
        magnifier.classList.add('visible');

        // Set the position of the magnifier
        magnifier.style.left = `${offsetX - magnifier.offsetWidth / 2}px`;
        magnifier.style.top = `${offsetY - magnifier.offsetHeight / 2}px`;

        // Set the background of the magnifier to zoom in on the image
        magnifier.style.backgroundImage = `url(${img.src})`;
        magnifier.style.backgroundSize = `${width * 2}px ${height * 2}px`; // Zoom level
        magnifier.style.backgroundPosition = `-${offsetX * 2 - magnifier.offsetWidth / 2}px -${offsetY * 2 - magnifier.offsetHeight / 2}px`;
    });

    img.addEventListener('mouseleave', function() {
        magnifier.classList.remove('visible');
    });
});
