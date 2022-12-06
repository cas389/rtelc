<!-- Pulls in Header.php Information -->
<?php get_header(); ?>

<!-- Hero Image and Page Title -->
<section class="hero-section-page">
  <?php the_post_thumbnail('full'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 main-section">
        <h2 class="page-h2"><?php the_title(); ?></h2>
      </div>
    </div>
  </div>
</section> <!-- End of hero-section Section -->


<!-- Main Text on Page.php pages -->
<main class="container">
  <div class="row">
    <section class="col-md-12 main-section">
      <?php
      //Adds Breadcrumb
      BreadcrumFunction();
      ?>
    </section>
      <section class="col-md-8 main-section">
        <?php
          // WordPress Loop
          if(have_posts()){
            while(have_posts()){
              the_post(); ?>

              <article class="individual-posts">
                <p><?php the_content(); ?></p>

                <!-- Display Author and Publish Date Links -->
                <?php post_data_for_single_posts(); ?>
              </article> <!-- Individual Post -->

            <?php
            }
          }
        ?>

        <section class="comment-section">
          <?php // Comment Form
            comment_form();

            // Comments Template
            comments_template(); ?>
        </section>
      </section> <!-- Ends the col-md-9 Container -->

      <!-- Sidebar Container with Widget Section -->
      <aside class="col-md-4 aside-section">
        <?php
          dynamic_sidebar('right-sidebar-posts');
        ?>

          <?php
          //Query
          $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' =>  4,
            'order'          => 'DESC',
            'orderby'        => 'rand',
          );

          $query = new WP_Query($args);

          if($query->have_posts()){
            while($query->have_posts()){
              $query->the_post(); ?>

              <div class="small-preview-blog-div">
                <div class="small-preview-blog-photo">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                </div>
                <div class="small-preview-blog-text">
                  <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><a class="read-more-link" href="<?php the_permalink(); ?>">Read More...</a></p>
                </div>
              </div>
            <?php
            } // Closes while
          }// Closes if statment
        ?>
      </aside><!-- Ends the Col-md-3 Aside -->
    </div><!-- Ends the Row Div -->
  </main>

  <section class="orange-bottom-border">

  </section>

<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
