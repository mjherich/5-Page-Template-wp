<?php /* Template Name: Pagebuilder With Sidebar*/ ?>

<?php get_header(); ?>
    
<?php 

    $canon_options = get_option('canon_options');

    // SET MAIN CONTENT CLASS
    $main_content_class = "main-content three-fourths";
    if ($canon_options['sidebars_alignment'] == 'left') { $main_content_class .= " left-main-content"; }

?>

    	
        <!-- start outter-wrapper -->   
        <div class="outter-wrapper">
            <!-- start main-container -->
            <div class="main-container">
                <!-- start main wrapper -->
                <div class="main wrapper clearfix">
                    <!-- start main-content -->
                    <div class="<?php echo esc_attr($main_content_class); ?>">


                        <!-- BEGIN LOOP -->
                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php get_template_part('inc/templates/pagebuilder_output'); ?>
                        	
                        <?php endwhile; ?>

                    </div>
                    <!-- end main-content -->

                    <!-- SIDEBAR -->
                    <?php get_sidebar("page"); ?>
                        
                </div>
                <!-- end main wrapper -->
            </div>
             <!-- end main-container -->
        </div>
        <!-- end outter-wrapper -->


<?php get_footer(); ?>