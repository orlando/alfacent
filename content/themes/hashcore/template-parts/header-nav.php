<nav class="navigation">
  <div id="site-nav-mobile" class="site-nav-mobile-wrapper">
    <div class="site-nav-mobile">
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-mobile' ) ); ?>
    </div>
  </div>

  <div id="site-nav" class="site-nav animated">

  	<div class="container">
  		<div class="row">
  			<div class="col-xs-12 col-sm-3">

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
          <div class="header-menu-wrapper">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-desktop' ) ); ?>
          </div>
  			</div>

        <div class="col-sm-1 hidden-xs">
          <div class="header-search-wrapper pull-right">
            <div class="bottom-aligner"></div>
            <div class="header-search-toggle">
              <a class="header-search-toggle-icon" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>

  		</div>
  	</div>
  </div>
</nav>
