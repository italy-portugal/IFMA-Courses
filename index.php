<?php get_header(); ?>

<?php get_template_part('template-part', 'head'); ?>

<!-- start content container -->

<div class="row dmbs-content">

    <?php //left sidebar ?>
    <?php get_sidebar( 'left' ); ?>
    <?php get_template_part('template-part', 'search'); ?>
    <div class="col-md-<?php devdmbootstrap3_main_content_width(); ?> dmbs-main">

            <?php // theloop
                if ( have_posts() ) : while ( have_posts() ) : the_post();

                    // single post
                    if ( is_single() ) : ?>

                        <div <?php post_class(); ?>>
<article class="container course-list">
                            <h2 class="page-header course-title">
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>
                            <div class="course-details">
                            <p><i class="fa fa-calendar"></i> <?php echo date('M d, Y',strtotime(get_field('start_date'))); ?></p>
                            <?php


                                ?>

                            <p><i class="fa fa-road"></i> <?php array_walk(get_field('delivery_method'),'walk_delivery_method'); ?></p>

                            <?php if (get_field("accredited")=="Yes") { ?>
                            <p><i class="fa fa-check"></i> Accredited</p>
                            <?php } else { ?>
                            <p><i class="fa fa-ban"></i> Accredited</p>
                            <?php } ?>


                            <p><i class="fa fa-globe"></i> <a href="<?php get_field("website"); ?>">Website</a></p>
                            </div>
                            <?php the_excerpt(); ?>

                            <a href="<?php echo get_permalink(); ?>" class="btn btn-default pull-right"> Read More...</a>
                            </articl
                            <h2 class="page-header"><?php the_title() ;?></h2>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail(); ?>
                                <div class="clear"></div>
                            <?php endif; ?>
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                            <?php get_template_part('template-part', 'postmeta'); ?>
                            <?php comments_template(); ?>

                        </div>
                    <?php
                    // list of posts
                    else : ?>
                       <div <?php post_class(); ?>>

                            <article class="container course-list">
                            <h2 class="page-header course-title">
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'devdmbootstrap3' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </h2>
                            <div class="course-details">
                            <p><i class="fa fa-calendar"></i> <?php echo date('M d, Y',strtotime(get_field('start_date'))); ?></p>
                            <?php


                                ?>

                            <p><i class="fa fa-road"></i> <?php if (is_array(get_field('delivery_method'))) {
                              array_walk(get_field('delivery_method'),'walk_delivery_method');
                               } else {
                                   echo get_field('delivery_method');
                               }
                               ?></p>


                            <?php if (get_field("accredited")=="Yes") { ?>
                            <p><i class="fa fa-check"></i> Accredited</p>
                            <?php } else { ?>
                            <p><i class="fa fa-ban"></i> Accredited</p>
                            <?php } ?>


                            <p><i class="fa fa-globe"></i> <a href="<?php get_field("website"); ?>">Website</a></p>
                            </div>
                            <?php the_excerpt(); ?>

                            <a href="<?php echo get_permalink(); ?>" class="btn btn-default pull-right"> Read More...</a>
                            </article
                            <?php wp_link_pages(); ?>
                            <?php get_template_part('template-part', 'postmeta'); ?>
                            <?php  if ( comments_open() ) : ?>
                                   <div class="clear"></div>
                                  <p class="text-right">
                                      <a class="btn btn-success" href="<?php the_permalink(); ?>#comments"><?php comments_number(__('Leave a Comment','devdmbootstrap3'), __('One Comment','devdmbootstrap3'), '%' . __(' Comments','devdmbootstrap3') );?> <span class="glyphicon glyphicon-comment"></span></a>
                                  </p>
                            <?php endif; ?>
                       </div>

                     <?php  endif; ?>

                <?php endwhile; ?>
                <?php posts_nav_link(); ?>
                <?php else: ?>

                    <?php get_404_template(); ?>

            <?php endif; ?>

   </div>

   <?php //get the right sidebar ?>
   <?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>
