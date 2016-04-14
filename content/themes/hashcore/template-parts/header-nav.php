<nav id="site-nav">
  <header class="site-header">
  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-xs-12 col-sm-4">
  				<div class="header-branding">

            <?php if ( hashcore_the_custom_logo() ) : ?>
          	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <?php hashcore_the_custom_logo(); ?>
          	</a>
            <?php endif; // End logo image check. ?>

  				</div>
          <div class="header-branding pull-right">
            <button class="mobile-toggle visible-xs-inline-block">
    	        <i class="fa fa-bars" aria-hidden="true"></i>
    	      </button>
          </div>

  			</div>
  			<div class="col-sm-8 hidden-xs">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
  				<!--ul class="header-links">
  					<li class="header-link"><a href="/about">Who we are</a></li>
  					<li class="header-link"><a href="/team">Team</a></li>
  					<li class="header-link"><a href="/projects">Work</a></li>
  					<li class="header-link"><a href="/hire-us">Hire us</a></li>
  				</ul-->
  			</div>

  		</div>
  	</div>
  </header>

  <div id="site-nav-mobile">
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    <!--div class="site-nav-mobile">
      <ul class="site-nav-mobile-links">
        <li class="site-nav-mobile-link">
          <a href="/about">
            <h3 class="site-nav-mobile-link__text">Who we are</h3>
            <p class="site-nav-mobile-link__info">Who we are?</p>
          </a>
        </li>

        <li class="site-nav-mobile-link">
          <a href="/team">
            <h3 class="site-nav-mobile-link__text">Team</h3>
            <p class="site-nav-mobile-link__info">We're Hash Labs</p>
          </a>
        </li>

        <li class="site-nav-mobile-link">
          <a href="/projects">
            <h3 class="site-nav-mobile-link__text">Our Work</h3>
            <p class="site-nav-mobile-link__info">This is what we do best!</p>
          </a>
        </li>

        <li class="site-nav-mobile-link">
          <a href="/hire-us">
            <h3 class="site-nav-mobile-link__text">Hire us</h3>
            <p class="site-nav-mobile-link__info">Ready to create something awesome?</p>
          </a>
        </li>

      </ul>
    </div-->
  </div>
</nav>
