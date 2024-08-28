<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            width: 18rem; /* Smaller card width */
        }
        .card-img-top {
            width: 285px; /* Set image width */
            height: 200px; /* Set image height */
            object-fit: cover; /* Ensure the image fits within the bounds */
            margin: auto; /* Center the image horizontally */
        }
        .btn-cart {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-cart .bi {
            margin-right: 8px; /* Space between the icon and text */
            font-size: 1.2rem;
        }
        .button-row {
            display: flex;
            justify-content: center;
            gap: 10px; /* Space between the buttons */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center g-4 mt-5">
            <!-- Card 1 -->
            <div class="col-md-3 me-2">
                <div class="card text-center">
                    <img src="https://via.placeholder.com/50" class="card-img-top" alt="Sample Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">$29.99</p>
                        <div class="button-row">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                            <a href="#" class=" btn-cart">
                                <i class="bi bi-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-3 me-2">
                <div class="card text-center">
                    <img src="https://via.placeholder.com/50" class="card-img-top" alt="Sample Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">$39.99</p>
                        <div class="button-row">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                            <a href="#" class=" btn-cart">
                                <i class="bi bi-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-3 me-2">
                <div class="card text-center">
                    <img src="https://via.placeholder.com/50" class="card-img-top" alt="Sample Product Image">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">$49.99</p>
                        <div class="button-row">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                            <a href="#" class=" btn-cart">
                                <i class="bi bi-cart-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>
