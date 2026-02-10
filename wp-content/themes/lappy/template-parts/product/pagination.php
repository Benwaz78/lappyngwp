<?php
defined( 'ABSPATH' ) || exit;

global $wp_query;

$current = max( 1, get_query_var( 'paged' ) );
$total   = $wp_query->max_num_pages;

if ( $total > 1 ) : ?>
    <div class="shop_toolbar t_bottom">
        <div class="pagination">
            <ul>

                <?php
                // Page numbers
                for ( $i = 1; $i <= $total; $i++ ) {
                    if ( $i == $current ) {
                        echo '<li class="current">' . $i . '</li>';
                    } else {
                        echo '<li><a href="' . esc_url( get_pagenum_link( $i ) ) . '">' . $i . '</a></li>';
                    }
                }

                // NEXT link
                if ( $current < $total ) {
                    echo '<li class="next"><a href="' . esc_url( get_pagenum_link( $current + 1 ) ) . '">next</a></li>';
                }

                // LAST page link ( >> )
                echo '<li><a href="' . esc_url( get_pagenum_link( $total ) ) . '">>></a></li>';
                ?>

            </ul>
        </div>
    </div>
<?php endif; ?>
