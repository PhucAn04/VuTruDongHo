<?php
    // Get the current day of the week (0 = Sunday, 1 = Monday, etc.)
    $dayOfWeek = date('w');

    // Define images for each day of the week
    $weeklyImages = [
        [
            'assets/img/hoangImg/slider/slide1.png',
            'assets/img/hoangImg/slider/slide2.png',
            'assets/img/hoangImg/slider/slide3.png'
        ],
        [
            'assets/img/hoangImg/slider/slide4.jpg',
            'assets/img/hoangImg/slider/slide5.png',
            'assets/img/hoangImg/slider/slide6.png'
        ],
        [
            'assets/img/hoangImg/slider/slide7.png',
            'assets/img/hoangImg/slider/slide8.png',
            'assets/img/hoangImg/slider/slide9.png'
        ],
        // Add more arrays for each day of the week if needed
    ];

    // Select images for the current day
    $images = $weeklyImages[$dayOfWeek % count($weeklyImages)];
?>

