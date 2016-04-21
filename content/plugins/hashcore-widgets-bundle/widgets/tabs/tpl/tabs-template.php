<?php
$widget_title =  wp_kses_post($instance['widget_title']);
$tabs_selection =  wp_kses_post($instance['tabs_selection']);
?>


<?php if ($widget_title) { ?>
    <h3 class="widget-title">
        <span><?php echo $widget_title ?></span>
    </h3>
<?php } ?>


<?php if($tabs_selection == 'horizontal'): ?>

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