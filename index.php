<?php get_header(); ?>
<div class="max-w-7xl mx-auto px-3">
   <div class="flex flex-wrap-reverse xl:flex-nowrap space-x-0 xl:space-x-7 2xl:space-x-10 justify-between gap-6 lg:gap-7 xl:gap-0">
      <div class="basis-full xl:basis-3/12">
         <?php get_sidebar(); ?>
      </div>
      <div class="basis-full xl:basis-3/4 overflow-hidden">
         <?php while(have_posts()): ?>
            <?php the_post(); ?>
            <?php if(has_post_thumbnail()):
               $index_featured_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full'); ?>
               <img class="w-full h-64 sm:h-96 md:h-[500px] lg:h-[600px] object-cover mb-5 sm:6 md:mb-7" src="<?php echo $index_featured_img[0]; ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <h1 class="text-xl sm:text-2xl lg:text-3xl text-textlight-200 font-montserrat font-semibold dark:text-textdark-100 mb-3 sm:mb-4"><?php the_title(); ?></h1>
            <div class="content">
               <?php the_content(); ?>
            </div>
         <?php endwhile; ?>
      </div>
   </div>
</div>
<?php get_footer(); ?>