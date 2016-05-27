<?php
$widget_title = wp_kses_post( $instance['widget_title'] );
$tabs_selection = wp_kses_post( $instance['tabs_selection'] );
$widget_tag = wp_kses_post( $instance['widget_tag'] );
?>


<?php if ( $widget_title ) { ?>
  <h1<?php echo ' class="soua-tab-title"' ?>>
    <?php echo $widget_title ?>
  </h1>
<?php } ?>

<?php if ( $tabs_selection == 'horizontal' ) : ?>

<div class="soua-tab">

    <ul class="soua-tabs">
        <?php foreach( $instance['repeater'] as $i => $repeater ) : ?>
        <li><a href="#"> <?php echo $repeater['tab_title']; ?></a></li>
        <?php endforeach; ?>
    </ul> <!-- / tabs -->

    <div class="tab_content">
        <?php foreach( $instance['repeater'] as $i => $repeater ) : ?>
        <div class="tabs_item">
            <p><?php echo $repeater['tab_content'] ?></p>
        </div> <!-- / tabs_item -->
        <?php endforeach; ?>

    </div> <!-- / tab_content -->
</div> <!-- / tab -->

<?php elseif($tabs_selection == 'vertical'): ?>


    <div class="soua-tab vertical">

        <ul class="soua-tabs ">
            <?php foreach( $instance['repeater'] as $i => $repeater ) : ?>
                <li><a href="#"> <?php echo $repeater['tab_title']; ?></a></li>
            <?php endforeach; ?>
        </ul> <!-- / tabs -->

        <div class="tab_content">
            <?php foreach( $instance['repeater'] as $i => $repeater ) : ?>
                <div class="tabs_item">
                    <p><?php echo $repeater['tab_content'] ?></p>
                </div> <!-- / tabs_item -->
            <?php endforeach; ?>

        </div> <!-- / tab_content -->
    </div> <!-- / tab -->



<?php endif; ?>
