<aside>
    <nav>
        <ul class="side-navbar">
            <li class="side-navbar-item">
                <a class="side-navbar-link <?php echo $activeInformation ?>" href="information">
                    <i class="fas fa-info"></i>
                    <span class="side-navbar-link-text">Information</span>
                </a>
            </li>

            <li class="side-navbar-item">
                <a class="side-navbar-link <?php echo $activeFavourites ?>" href="favourites">
                    <i class="fas fa-heart"></i>
                    <span class="side-navbar-link-text">Favourites</span>
                </a>
            </li>

            <li class="side-navbar-item">
                <a class="side-navbar-link <?php echo $activeOrderHistory ?>" href="orderHistory">
                    <i class="fas fa-history"></i>
                    <span class="side-navbar-link-text">Order History</span>
                </a>
            </li>

            <li class="side-navbar-item">
                <a class="side-navbar-link <?php echo $activeSettings ?>" href="settings">
                    <i class="fas fa-cog"></i>
                    <span class="side-navbar-link-text">Settings</span>
                </a>
            </li>

            <li class="side-navbar-item">
                <a class="side-navbar-link <?php echo $activeYourAccount ?>" href="yourAccount">
                    <i class="fas fa-user"></i>
                    <span class="side-navbar-link-text">Your account</span>
                </a>
            </li>

        </ul>
    </nav>
</aside>