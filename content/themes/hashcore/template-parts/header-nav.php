<nav id="site-nav">
  <header class="site-header">
  	<div class="container">
  		<div class="row">
  			<div class="col-xs-12 col-sm-4">

  				<div class="header-branding">
            <?php if ( hashcore_the_custom_logo() ) : ?>
          	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              <?php hashcore_the_custom_logo(); ?>
          	</a>
            <?php endif; // End logo image check. ?>
  				</div>

          <div class="header-mobile-toggle pull-right visible-xs-inline-block">
            <button class="mobile-toggle">
    	        <span class="mobile-toggle-strip">Mobile Toggle</span>
    	      </button>
          </div>

  			</div>
  			<div class="col-sm-8 hidden-xs">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-desktop' ) ); ?>
  			</div>

  		</div>
  	</div>
  </header>

  <div id="site-nav-mobile">
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-mobile' ) ); ?>
  </div>
</nav>
