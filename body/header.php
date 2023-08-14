<header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
        <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
        <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
        <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        <?php if (isLoggedIn()) { ?>
        <li><a href="updateUser.php" class="nav-link"><i class="bx bxs-user-detail"></i> <span>Edit</span></a></li>
        <li><a href="index.php?logout='1'" class="nav-link"><i class="bx bx-log-out"></i> <span>Logout</span></a></li>
        <?php }else{?>
          <li><a href="signIn.php" class="nav-link"><i class="bx bx-log-in"></i> <span>Sign-in</span></a></li>
          <li><a href="register.php" class="nav-link"><i class="bx bx-user-plus"></i> <span>Register</span></a></li>
        <?php }?>
      </ul>
    </nav><!-- .nav-menu -->

</header>