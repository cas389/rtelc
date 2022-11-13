<!-- Pulls in Header.php Information -->
<?php get_header(); ?>

<!-- Hero Image and Page Title -->
<section class="hero-section-page">
  <img src="http://localhost:8888/rtelc/wp-content/uploads/2022/11/playground.jpg" alt="">
  <div class="container">
    <div class="row">
      <div class="col-md-12 main-section">
        <h2 class="page-h2">Rose Tree Early Learning Center Blog</h2>
      </div>
    </div>
  </div>
</section> <!-- End of hero-section Section -->


<main class="container main-section">
  <div class="row">
    <div class="col-md-12">
      <section class="col-md-12 main-section">
        <?php
        //Adds Breadcrumb
        BreadcrumFunction();
        ?>
      </section>
    </div>


    <?php
    //Query

    $args = array(
      'post_type'      => 'post',
      'post_status'    => 'publish',
      'posts_per_page' =>  4,
      'order'          => 'DESC',
      'orderby'        => 'post_date',
    );

    $query = new WP_Query($args);

    if($query->have_posts()){
      while($query->have_posts()){
        $query->the_post(); ?>
          <div class="blog-post col-sm-6 col-lg-3">
            <?php the_post_thumbnail('medium');?>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><a class="read-more-link" href="<?php the_permalink(); ?>">Read More...</a></p>
          </div> <?php
        } // Closes while
      }// Closes if statment
      ?>
      <p class="pagination-para"><?php pagination_for_site(); ?></p>
    </div>
  </main> <!-- Ends the Main Container -->


<section class="orange-bottom-border">

</section>
<!-- Pulls in Footer.php Information -->
<?php get_footer(); ?>
