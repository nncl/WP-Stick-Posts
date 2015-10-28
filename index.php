<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test Enviroment</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Test Enviroment</h1>
    <div class="row">
      <?php
        $stickies = get_option('sticky_posts');
        if ($stickies) {
          query_posts(array_merge($wp_query->query,
          array('post__in' => $stickies)));
        }
      ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="col-xs-6 col-md-4">
        <article>
          <a href="<?php the_permalink(); ?>">
            <header class="text-center">
              <h1><?php the_title(); ?></h1>
            </header>
          </a>
        </article>
      </div>
      <?php endwhile?>
      <?php else: ?>
      <?php endif; ?>
    </div>

    ====================
    ====================

    <div class="row">
      <?php query_posts(
        array(
          "post__not_in"	 =>	get_option("sticky_posts"),
          'posts_per_page' => 1
        )
      );?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="col-xs-6 col-md-4">
        <article>
          <a href="<?php the_permalink(); ?>">
            <header class="text-center">
              <h1><?php the_title(); ?></h1>
            </header>
          </a>
        </article>
      </div>
      <?php endwhile?>
      <?php else: ?>
      <?php endif; ?>
    </div>
  </body>
</html>
