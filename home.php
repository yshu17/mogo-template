<?php /* Template Name: Home */?>
<?php get_header(); ?>

<div class="wrapper">
  <div class="base">
    <section id="home" class="section intro_mod">
      <h2 class="section_title intro_mod">
        <span class="title1 intro_mod">
          <?php echo get_field('hero_title_1'); ?>
        </span>
        <span class="title2 intro_mod">
          <?php echo get_field('hero_title_2'); ?>
        </span>
      </h2>
    </section>
    <section id="about" class="section">
      <h2 class="section_title">
        <span class="title1">
          <?php echo get_field('about_title_1'); ?>
        </span>
        <span class="title2">
          <?php echo get_field('about_title_2'); ?>
        </span>
      </h2>
      <div class="section_descr">
        <p>
          <?php echo get_field('about_text'); ?>
        </p>
      </div>
      <ul class="stories_list">

        <?php
        global $post;

        $myposts = get_posts([
          'numberposts' => 3,
          'category_name' => 'About',
          'order' => 'ASC',
          // 'orderby' => 'title'
        
        ]);

        if ($myposts) {
          foreach ($myposts as $post) {
            setup_postdata($post);
            ?>
            <li class="stories_l_item">
              <a href="<?php echo get_permalink(); ?>" class="image_link">
                <figure class="image_wrap effect1_mod">
                  <img src="<?php the_post_thumbnail_url(); ?>" class="img" />
                  <figcaption class="image_caption story_mod">
                    <?php echo get_the_title(); ?>
                  </figcaption>
                </figure>
              </a>
            </li>
            <?php
          }
        }
        wp_reset_postdata(); // Сбрасываем $post
        ?>

      </ul>

      <?php if (have_rows('facts_list')): ?>

        <ul class="facts_list">
          <?php while (have_rows('facts_list')):
            the_row();

            $fact_text = get_sub_field('fact_text');
            $fact_num = get_sub_field('fact_num');

            ?>
            <li class="facts_l_item">
              <dl class="fact_block">
                <dt class="fact_text">
                  <?php echo $fact_text ?>
                </dt>
                <dd class="fact_num">
                  <?php echo $fact_num ?>
                </dd>
              </dl>
            </li>
          <?php endwhile; ?>
        </ul>

      <?php endif; ?>

    </section>
    <section id="service" class="section">
      <h2 class="section_title">
        <span class="title1">
          <?php echo get_field('service_title_1'); ?>
        </span>
        <span class="title2">
          <?php echo get_field('service_title_2'); ?>
        </span>
      </h2>

      <?php if (have_rows('services_list')): ?>

        <ul class="services_list">
          <?php while (have_rows('services_list')):
            the_row();

            $service_title = get_sub_field('service_title');
            $service_text = get_sub_field('service_text');
            $service_ico = get_sub_field('service_ico');
            ?>
            <li class="services_l_item">
              <div class="service_block"> <!--photo_mod  -->
                <!-- Что придумал это переназвать все классы как картинки и конкатенировать их в инлайн класс вместе с _mod-->
                <img src="<?php echo $service_ico; ?> ">
                <h3 class="service_title">
                  <?php echo $service_title; ?>
                </h3>
                <div class="service_text">
                  <p>
                    <?php echo $service_text; ?>
                  </p>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>

      <?php endif; ?>
    </section>
    <section class="section">
      <h2 class="section_title">
        <span class="title1">
          <?php echo get_field('wwd_title_1'); ?>
        </span>
        <span class="title2">
          <?php echo get_field('wwd_title_2'); ?>
        </span>
      </h2>
      <div class="section_descr">
        <p>
          <?php echo get_field('wwd_text'); ?>
        </p>
      </div>
      <div class="what">
        <figure class="image_wrap what_mod"><img src="<?php echo get_field('wwd_img'); ?>" class="img"></figure>

        <?php if (have_rows('wwd_list')): ?>

          <ul class="accordion">
            <?php while (have_rows('wwd_list')):
              the_row();

              $accordion_title = get_sub_field('accordion_title');
              $accordion_text = get_sub_field('accordion_text');
              $accordion_ico = get_sub_field('accordion_ico');
              ?>
              <li class="accordion_item">
                <!-- <img src="<?php echo $accordion_ico; ?>" style="display:inline-block"> -->
                <h3 class="accordion_title">
                  <?php echo $accordion_title; ?>
                </h3>
                <div class="accordion_content">
                  <p>
                    <?php echo $accordion_text; ?>
                  </p>
                </div>
              </li>
            <?php endwhile; ?>
          </ul>

        <?php endif; ?>

      </div>
    </section>
    <section class="section">
      <h2 class="section_title">
        <span class="title1">
          <?php echo get_field('team_title_1'); ?>
        </span>
        <span class="title2">
          <?php echo get_field('team_title_2'); ?>
        </span>
      </h2>
      <div class="section_descr">
        <p>
          <?php echo get_field('team_text'); ?>
        </p>
      </div>

      <ul class="team_list">
        <?php
        global $post;

        $teammates = get_posts([
          'numberposts' => -1,
          'post_type' => 'team',
          'order' => 'ASC',
        ]);

        if ($teammates) {
          foreach ($teammates as $post) {
            setup_postdata($post);
            $title_name = get_the_title();
            ?>

            <li class="team_l_item">
              <div class="teammate_block">
                <figure class="image_wrap effect1_mod"><img src="<?php the_post_thumbnail_url(); ?>"
                    alt="<?php echo $title_name; ?>" title="<?php echo $title_name; ?>" class="img" />
                  <figcaption class="image_caption">

                    <?php if (have_rows('teammate_link_list')): ?>

                      <ul class="teammate_socials">
                        <?php while (have_rows('teammate_link_list')):
                          the_row();

                          $social_link = get_sub_field('social_link');
                          $social_ico = get_sub_field('social_ico');
                          $social_ico_title = $social_ico['title'];
                          $social_link_url = $social_link['url'];
                          $social_link_target = $social_link['target'] ? $social_link['target'] : '_blank';

                          ?>
                          <li class="teammate_s_item">
                            <a target="<?php echo esc_attr($social_link_target); ?>" href="<?php echo $social_link_url; ?>"
                              class="teammate_s_link <?php echo esc_html($social_ico_title); ?>_mod"></a>
                          </li>

                        <?php endwhile; ?>
                      </ul>

                    <?php endif; ?>

                  </figcaption>
                </figure>
                <span class="image_c_title">
                  <?php echo $title_name; ?>
                </span>
                <span class="image_c_text">
                  <?php echo get_field('teammate_position'); ?>
                </span>
              </div>
            </li>
            <?php
          }
        }
        wp_reset_postdata(); // Сбрасываем $post
        ?>
      </ul>
    </section>
    <?php
    global $post;
    $testimonials = get_posts([
      'numberposts' => 4,
      'post_type' => 'testimonials',
      'order' => 'ASC',
    ]);

    if ($testimonials) {
      ?>
        <section class="section what_mod">       
          <h2 class="section_title">
            <span class="title1">
              <?php echo get_field('testimonials_title_1'); ?>
            </span>
            <span class="title2">
              <?php echo get_field('testimonials_title_2'); ?>
            </span>
          </h2>

          <ul class="clients">
            <?php
              foreach ($testimonials as $post) {
                setup_postdata($post);
                $title_name = get_the_title();
                $post_content = get_the_content();
                ?>
                  <li class="client_block">
                    <div class="client_image"><img src="<?php the_post_thumbnail_url(); ?>" class="img" /></div>
                    <div class="text_wrap">
                      <div class="image_c_title">
                        <?php echo $title_name; ?>
                      </div>
                      <div class="image_c_text">
                        <?php echo get_field('position') ?>
                      </div>
                      <div class="text">
                        <p>
                          <?php echo $post_content; ?>
                        </p>
                      </div>
                    </div>
                  </li>
                <?php
              }
            ?>
          </ul>
        </section>
      <?php
    }
    wp_reset_postdata(); // Сбрасываем $post
    ?>
    <section id="blog" class="section">
      <h2 class="section_title">
        <span class="title1"><?php echo get_field('blog_title'); ?></span>
        <span class="title2"><?php echo get_field('blog_subtitle'); ?></span>
      </h2>
      <ul class="recent_list">
        <?php
        global $post;

        $my_blog = get_posts([
          'numberposts' => 3,
          'category_name' => 'Blog',
          'orderby' => 'date',
          'order' => 'DESC',
        ]);
        if ($my_blog ) {
          foreach ($my_blog  as $post) {
            setup_postdata($post);
            ?>
            <li class="recent_item">
              <article class="post">
                <div class="image_wrap blog_mod"><img src=" <?php the_post_thumbnail_url(); ?>" class="img blog_mod" /></div>
                <h2 class="post_title"><a href="<?php echo get_post_permalink(); ?>" class="post_link"> <?php the_title(); ?> </a></h2>
                <div class="post_text">
                  <p> <?php the_content(); ?> </p>
                </div><a href="#" class="post_date"><span class="post_d_day"><?php echo get_the_date('d'); ?></span><span
                    class="post_d_month"><?php echo get_the_date('F'); ?></span></a>
                <div class="post_stat_wrap"><a href="#views" class="post_stat views_mod"><?= gt_get_post_view(); ?></a><a href="#comments"
                    class="post_stat comm_mod"><?php echo get_comments_number(); ?></a></div>
              </article>
            </li>
            <?php
          }
        }
        wp_reset_postdata();
        ?>
      </ul>    
    </section>
  </div>
<?php get_footer(); ?>