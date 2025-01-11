<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veckopeng</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="apple-touch-icon" href="assets/apple-touch-icon.png">
    <link rel="stylesheet" href="style.css">
</head>

<header>
    <a href="/veckopeng/login.php" class="admin-link">Logga in som förälder</a>
</header>

<body>

    <main>
        <div class="allowance-tracker">
            <div class="child-column" id="vera-column">
                <div class="child-header">
                    <img src="assets/vera.jpg" alt="Vera" class="child-photo">
                    <h2>Vera</h2>
                </div>
                <div class="coin-grid" id="vera-grid"></div>
            </div>

            <div class="child-column" id="lasse-column">
                <div class="child-header">
                    <img src="assets/lasse.jpg" alt="Lasse" class="child-photo">
                    <h2>Lasse</h2>
                </div>
                <div class="coin-grid" id="lasse-grid">
                    <div class="coin"></div>
                    <div class="coin"></div>
                </div>

            </div>
        </div>

    </main>

    <script src="script.js"></script>
</body>

</html>