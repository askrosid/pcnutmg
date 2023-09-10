<div class="flex flex-col gap-6 xl:gap-8 pr-0 md:pr-4 xl:pr-0 sticky top-2">
   <div>
      <h5 class="text-base sm:text-lg uppercase text-textlight-200 dark:text-textdark-200 mb-2 border-b-2 border-brand-100 dark:border-brand-200">Kategori Populer</h5>
      <ul>
         <?php
            $sidebar_categories =get_categories( array(
               'orderby'      => 'count',
               'order'        => 'DESC',
               'number'       => 6,
               'exclude_tree' => '1',
               'childless'    => true
            ) );
            foreach ($sidebar_categories as $sidebar_category) {
               echo '<li class="py-2 border-b"><a href="' . get_category_link($sidebar_category->term_id) . '" class="text-sm uppercase hover:text-brand-200 dark:hover:text-brand-200">' . $sidebar_category->name . '</a></li>';
            }
         ?>
      </ul>
   </div>
   <div>
      <h5 class="text-base sm:text-lg uppercase text-textlight-200 dark:text-textdark-200 border-b-2 mb-5 border-brand-100 dark:border-brand-200">Tags Terpopuler</h5>
      <ul class="flex flex-row flex-wrap gap-2">
         <?php
            $tags = get_tags( array(
               'taxonomy'     => 'post_tag',
               'orderby'      => 'count',
               'order'        => 'DESC',
               'number'       => 10
            ) );
            foreach($tags as $tag) {
               echo '<li class="w-max basis-auto"><a class="py-1 px-2 text-sm uppercase hover:text-brand-200 border hover:border-brand-200 dark:border-textdark-200 dark:text-textdark-200 dark:hover:border-brand-200 dark:hover:text-brand-200" href="' . get_category_link($tag->term_id) . '">' . '#' . $tag->name . '</a></li>';
            }
         ?>
      </ul>
   </div>
   <div>
      <a href="<?php echo get_permalink( get_page_by_path( 'periklanan' ) ); ?>" class="group hover:bg-textlight-200"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/space.png'; ?>" alt="Pasang Iklan" class="transition duration-300 ease-in-out group-hover:brightness-75 dark:brightness-75 dark:group-hover:brightness-90"></a>
   </div>
</div>