<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package bootcake
 */

if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    <div id="sidebar" class="" role="complementary">
        <div class="sidebar-inner">
            <aside class="widget-area">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </aside>
        </div>
    </div>
<?php }
