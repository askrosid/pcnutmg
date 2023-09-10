<li>
   <div class="flex flex-wrap md:flex-nowrap gap-4 sm:gap-5">
      <div class="basis-full md:basis-[290px]">
         <?php $latest_post_filter_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); ?>
         <a href="<?php the_permalink(); ?>" class="group hover:bg-textlight-200"><img src="<?php echo $latest_post_filter_thumbnail[0]; ?>" alt="<?php the_title(); ?>" class="h-72 sm:h-96 md:h-[200px] lg:h-[210px] min-w-full md:min-w-[290px] lg:min-w-[320px] object-cover transition duration-300 ease-in-out group-hover:brightness-75 dark:brightness-75 dark:group-hover:brightness-90"></a>
      </div>
      <div class="basis-full md:basis-auto flex flex-col flex-nowrap justify-start md:justify-center gap-2">
         <?php
         $latest_post_filter_categories = get_the_category();
         if (! empty($latest_post_filter_categories[1])){
            echo '<a href="' . esc_url( get_category_link( $latest_post_filter_categories[1]->term_id ) ) . '" class="text-sm text-textlight-200 hover:text-brand-200 dark:text-textdark-200 dark:hover:text-brand-100 uppercase max-w-max pb-1 b-4 border-b-4 border-brand-100 dark:border-brand-200 dark:hover:border-brand-300">' . esc_html( $latest_post_filter_categories[1]->name ) . '</a>';
         } else {
            echo '<a href="' . esc_url( get_category_link( $latest_post_filter_categories[0]->term_id ) ) . '" class="text-sm text-textlight-200 hover:text-brand-200 dark:text-textdark-200 dark:hover:text-brand-100 uppercase max-w-max pb-1 border-b-4 border-brand-100 dark:border-brand-200 dark:hover:border-brand-300">' . esc_html( $latest_post_filter_categories[0]->name ) . '</a>';
         }
         ?>
         <a href="<?php the_permalink(); ?>" class="text-lg sm:text-xl text-textlight-200 hover:text-brand-200 font-montserrat font-semibold dark:text-textdark-100 dark:hover:text-brand-300"><h3><?php the_title(); ?></h3></a>
         <p class="sm:text-lg md:text-base lg:text-lg"><?php $latest_post_filter_excerpt = get_the_excerpt(); $latest_post_filter_excerpt = substr($latest_post_filter_excerpt, 0, 105); $latest_post_filter_excerpt_result = substr($latest_post_filter_excerpt, 0, strrpos($latest_post_filter_excerpt, '')); echo $latest_post_filter_excerpt; ?> ...</p>
         <div class="flex flex-wrap flex-row items-center gap-3 sm:gap-4 text-sm">
            <span class="flex flex-row items-center space-x-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-7 sm:w-7 sm:h-7 text-brand-100">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
               </svg>
               <a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID'))); ?>" class="hover:text-brand-200 dark:text-textdark-200 dark:hover:text-brand-100"><?php the_author(); ?></a>
               </span>
            <span class="flex flex-row items-center space-x-2">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-brand-100">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
               </svg>
               <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
            </span>
         </div>
      </div>
   </div>
</li>