<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        
        <header>
            <div class="container" id="nav_container">
                <nav id="navbar">
                    <a href="home.php">
                        <img src="logo.png" style="width: 200px;">
                    </a>
                    <ul>
                        <li><a href="home.php" class="home-active">Home</a></li>
                        <li><a href="post-offer.php" class="offer-active">Post Offers</a></li>
                        <li><a href = "place-events.php" class="event-active">Place Events</a></li>
                        <li><a href = "pricing.php" class="pricing-active">Pricing</a></li>
                        <li><a href = "#" class="view-profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                    </ul>
                    <div>
                        <ul>
                            <li><form action="../php/Logout.inc.php" method="post">
                                <button name="logout_in" class="logout-btn" name="logout_submit">Logout</button>
                            </form></li>
                        </ul>
                    </div>
                    
                </nav>
            </div>
        </header>
        <script>
            var lastScrollTop = 0;
            var navbar = document.getElementById("nav_container");
            window.addEventListener("scroll", function(){
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (scrollTop > lastScrollTop) {
                    navbar.style.top = "-65.25px";
                }
                else{
                    navbar.style.top = "0";
                }
                lastScrollTop = scrollTop;
            });
        </script>
    </body>
</html>