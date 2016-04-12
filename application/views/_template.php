<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{title}</title>
    <link rel="stylesheet" href="/public/css/foundation.css"/>
    <script src="/public/js/vendor/modernizr.js"></script>
</head>
<body>

<div class="contain-to-grid">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="#">Stock Ticker</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
                <li><a href="/">Home</a></li>
                <li><a href="/stock">Stocks</a></li>
                <li><a href="/player">Profiles</a></li>
                <?php
                if (!empty($_SESSION['player'])) {
                    echo "<li><a href='/login/logout'>Logout</a></li>";
                    echo "<li><a href='/player/" . $_SESSION['player'] . "'>" . $_SESSION['player'] . "</a></li>";
                } else {
                    echo "<li><a href='/login'>Login / Register</a></li>";
                }
                ?>
            </ul>
        </section>
    </nav>
</div>

<div class="row">
    <div class="large-12 columns">
        <h1>{title}</h1>
    </div>
</div>

{content}

<script src="/public/js/vendor/jquery.js"></script>
<script src="/public/js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
