<?php
/*
 Template Name: Methodology
*/
  global $header_class;
$header_class = "home";
?>

<?php 
global $body_class;
$body_class = "methodology";

get_header(); ?>
            
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="scroll-btn">
          <div class="scroll-btn__inner"></div>
          <div class="scroll-btn__inner"></div>
          <div class="scroll-btn__inner"></div>
</div>

 <div id="loader-wrapper">
   <div id="loader"></div>
 </div> 

   <div id="scene" class="methode-section">
       <div class="movie-wrap">
           <video class="methode-movie" preload="true" id="methodVideo">
                 <source src="<?php the_field('video'); ?>" type="video/mp4" "> 
                 <!-- <source src="images/movie.webm" type="video/webm"> -->
         </video>
       </div>
       <div class="slider_wrap">
               <div id="full-width-slider" class="royalSlider contentSlider heroSlider rsMinW rsDefault">
               <?php $slide_count = 0; ?>
               <?php if( have_rows('slides') ): while( have_rows('slides') ): the_row(); ?>
                  <div class="slide">
                      <div class="leftside">
                        <?php // first slide displayed a little different 
                        if ( $slide_count == 0 ) : ?>
                          <h1><?php the_sub_field('title'); ?></h1>
                        <?php else : ?>
                          <h3><?php the_sub_field('title'); ?></h3>
                        <?php endif; ?>
                        <div class="border"></div>
                        <?php the_sub_field('text'); ?>
                      </div>
                      <div class="rightside">
                        <?php $img = get_sub_field('image'); ?>
                        <img src="<?php echo $img['url']; ?>">
                      </div>
                  </div> 
                  <?php $slide_count++; ?>
                <?php endwhile; endif; ?>

               </div><!--end of full width Slider-->
          </div><!--end of slider wrap-->



<!--       <div class="dots">
          <ul>
             <li class="active" data-slide="0" data-movie-position="0" data-movie-playtime="1000"><a></a></li>
             <li data-slide="1" data-movie-position="1.1" data-movie-playtime="2000"><a></a></li>
             <li data-slide="2" data-movie-position="3.1" data-movie-playtime="1000"><a></a></li>
             <li data-slide="3" data-movie-position="4.1" data-movie-playtime="1000"><a></a></li>
             <li data-slide="4" data-movie-position="5.1" data-movie-playtime="1000"><a></a></li>
             <li data-slide="5" data-movie-position="6.1" data-movie-playtime="1000"><a></a></li>
             <li data-slide="6" data-movie-position="7.1" data-movie-playtime="1000"><a></a></li>
          </ul>
      </div> -->
       
      <div class="dots">
          <ul>
          <?php $slide_num = 0; ?>
          <?php if( have_rows('slides') ): while( have_rows('slides') ): the_row(); ?>
             <li class="<?php if ( $slide_num == 0 ) echo "active"; ?>" data-slide="<?php echo $slide_num; ?>" data-movie-position="<?php the_sub_field('movie_position'); ?>" data-movie-playtime="<?php the_sub_field('movie_playtime'); ?>"><a></a></li>
             <?php $slide_num++; ?>          
          <?php endwhile; endif; ?>
          </ul>
      </div>

    </div>


        <a class="explore-more capa modalBoxOpen" data-window="modal-contact">
             <div class="wrapper_700">
                        <h3><?php the_field('footer_title'); ?></h3>
                        <ul>
                              <li><div class="button-blue-border"><?php the_field('footer_cta_text'); ?></div></li>
                        </ul>
            </div>
        </a>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
