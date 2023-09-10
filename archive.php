<?php get_header(); ?>
   <div class="max-w-7xl mx-auto px-3">
      <?php if(is_category()): ?>
         <h1 class="text-xl sm:text-2xl lg:text-3xl text-textlight-200 font-montserrat font-semibold dark:text-textdark-100 mb-2 sm:mb-3"><?php single_cat_title(); ?></h1>
         <?php the_archive_description(); ?>
      <?php else: ?>
         <h1 class="text-xl sm:text-2xl lg:text-3xl text-textlight-200 font-montserrat font-semibold dark:text-textdark-100 mb-2 sm:mb-3"><?php the_archive_title(); ?></h1>
         <?php the_archive_description(); ?>
      <?php endif; ?>
      <?php if(have_posts()): ?>
         <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-7 xl:mt-8 gap-6 sm:gap-5 md:gap-4 xl:gap-6 mb-8">
            <?php while(have_posts()): ?>
               <?php the_post(); ?>
               <div>
                  <?php if(has_post_thumbnail()): ?>
                  <?php $archive_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
                  <div class="overflow-hidden relative min-h-[300px] sm:min-h-[250px] md:min-h-[230px] lg:min-h-[210px] xl:min-h-[220px] bg-cover bg-center bg-no-repeat mb-2 sm:mb-3 xl:mb-4" style="background-image: url(<?php echo $archive_thumbnail[0]; ?>);">
                     <a href="<?php the_permalink() ?>" class="space-x-0 md:space-x-4 absolute top-0 left-0 w-full h-full transition duration-300 ease-in-out bg-textlight-200 opacity-25 hover:opacity-40 dark:opacity- dark:hover:opacity-50 text-textlight-200 dark:text-textlight-200"><?php the_title(); ?></a>
                  </div>
                  <?php endif; ?>
                  <div class="flex flex-wrap flex-row items-center gap-3 sm:gap-2 xl:gap-4 text-sm mb-1 sm:mb-2">
                     <span class="flex flex-row items-center space-x-2 sm:space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 sm:w-6 sm:h-6 text-brand-100">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID'))); ?>" class="hover:text-brand-200 dark:text-textdark-200 dark:hover:text-brand-100"><?php the_author(); ?></a>
                     </span>
                     <span class="flex flex-row items-center space-x-2 sm:space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:w-5 sm:h-5 text-brand-100">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('j M Y'); ?></time>
                     </span>
                  </div>
                  <h2 class="text-lg md:text-base xl:text-lg text-textlight-200 font-montserrat font-semibold dark:text-textdark-100 mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p class="text-base"><?php $archive_excerpt = get_the_excerpt(); $archive_excerpt = substr($archive_excerpt, 0, 65); $archive_excerpt_result = substr($archive_excerpt, 0, strrpos($archive_excerpt, '')); echo $archive_excerpt; ?> ...</p>
               </div>
            <?php endwhile; ?>
         </div>
         <?php the_posts_pagination(array(
            'prev_next'       => false,
            'mid_size'        => 2,
            'end_size'        => 1

         )); ?>
      <?php else: ?>
         <p>Belum ada artikel yang dipublish</p>
      <?php endif; ?>
   </div>
<?php get_footer(); ?>