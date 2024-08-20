<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f0f0;
        }
        .navbar {
            display: flex;
            background-color: #333;
            justify-content: space-between;
            padding: 10px 20px;
        }
        .navbar a {
            color: #fff;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .carousel {
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
        }
        .carousel img {
            width: 100%;
            display: none;
            animation: fade 1.5s ease-in-out;
        }
        .carousel img.active {
            display: block;
        }
        @keyframes fade {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            text-align: center;
            margin-top: 0;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="#">Category</a>
        <a href="#">Subcategory</a>
        <a href="#">About</a>
        <a href="#">Settings</a>
        <a href="#">Profile</a>
    </div>

    <div class="carousel">
        <img src="image1.jpg" class="active" alt="Image 1">
        <img src="image2.jpg" alt="Image 2">
        <img src="image3.jpg" alt="Image 3">
    </div>

    <div class="content">
        <h1>Welcome To Home Page</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla.</p>
    </div>

    <script>
        const images = document.querySelectorAll('.carousel img');
        let currentImageIndex = 0;

        function showNextImage() {
            images[currentImageIndex].classList.remove('active');
            currentImageIndex = (currentImageIndex + 1) % images.length;
            images[currentImageIndex].classList.add('active');
        }

        setInterval(showNextImage, 3000);
    </script>

</body>
</html>
