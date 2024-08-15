document.querySelectorAll('.col30 img').forEach((image) => {
    image.addEventListener('mouseover', () => {
        image.style.transform = 'scale(1.1)';
        image.style.boxShadow = '0 0 20px rgba(255, 255, 255, 0.5)';
    });

    image.addEventListener('mouseout', () => {
        image.style.transform = 'scale(1)';
        image.style.boxShadow = '0 0 0 rgba(255, 255, 255, 0)';
    });
});
