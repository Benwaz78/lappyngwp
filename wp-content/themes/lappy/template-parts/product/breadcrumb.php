<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ( function_exists( 'woocommerce_breadcrumb' ) ) : ?>
                    <!--breadcrumbs area start-->
                    <div class="breadcrumbs_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <?php
                                        woocommerce_breadcrumb([
                                            'delimiter'   => '',
                                            'wrap_before' => '<ul>',
                                            'wrap_after'  => '</ul>',
                                            'before'      => '<li>',
                                            'after'       => '</li>',
                                            'home'        => 'home',
                                        ]);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--breadcrumbs area end-->
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
