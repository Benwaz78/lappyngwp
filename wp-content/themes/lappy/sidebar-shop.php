<div class="col-lg-3 col-md-12">
    <!--sidebar widget start-->
    <aside class="sidebar_widget">

       <div class="widget_list widget_categories">

       </div>
        
        <div class="widget_list widget_categories">
            <h3>Filter Laptops</h3>
            <ul class="lappy-filter-accordion">

                <li class="widget_sub_categories">
                    <a href="javascript:void(0)">Filter By Brand</a>
                    <ul class="widget_dropdown_categories">
                        <?php theme_product_attribute_filter( 'product_brand' ); ?>
                        <!-- or product_brand -->
                    </ul>
                </li>


                <li class="widget_sub_categories">
                    <a href="javascript:void(0)">Filter By Laptop Generations</a>
                    <ul class="widget_dropdown_categories">
                        <?php theme_product_attribute_filter( 'pa_laptop-generation' ); ?>
                    </ul>
                </li>

                <li class="widget_sub_categories">
                    <a href="javascript:void(0)">Filter By RAM</a>
                    <ul class="widget_dropdown_categories">
                        <?php theme_product_attribute_filter( 'pa_ram' ); ?>
                    </ul>
                </li>

                <li class="widget_sub_categories">
                    <a href="javascript:void(0)">Filter By Storage</a>
                    <ul class="widget_dropdown_categories">
                        <?php theme_product_attribute_filter( 'pa_hdd' ); ?>
                    </ul>
                </li>

                <li class="widget_sub_categories">
                    <a href="javascript:void(0)">Filter By Screen Size</a>
                    <ul class="widget_dropdown_categories">
                        <?php theme_product_attribute_filter( 'pa_screen-size' ); ?>
                    </ul>
                </li>

                <li class="widget_sub_categories">
                    <a href="javascript:void(0)">Filter By Operating System</a>
                    <ul class="widget_dropdown_categories">
                        <?php theme_product_attribute_filter( 'pa_operating-system' ); ?>
                    </ul>
                </li>

                <li class="widget_sub_categories">
                    <a href="javascript:void(0)">Filter By Condition</a>
                    <ul class="widget_dropdown_categories">
                        <?php theme_product_attribute_filter( 'pa_condition' ); ?>
                    </ul>
                </li>

            </ul>
        </div>









        
       <?php render_banner('sidebar_left'); ?>
    </aside>
    <!--sidebar widget end-->
</div>