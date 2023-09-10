   </main>
   <footer id="main-footer" class="bg-bglight-200 pt-12 dark:bg-bgdark-200">
      <div class="flex flex-wrap justify-between gap-8 max-w-7xl mb-8 px-3 mx-auto">
         <div class="basis-full md:basis-2/5">
            <?php if(has_custom_logo()): ?>
               <?php
                  $custom_logo_id = get_theme_mod('custom_logo');
                  $custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
                  $custom_logo_url = $custom_logo_data[0];
               ?>
               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="w-60 mb-5"></a>
            <?php else: ?>
               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" class="mb-5 text-lg font-semibold text-textlight-200 hover:text-brand-200 dark:text-textdark-100 dark:hover:text-brand-100"><h3><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></h3></a>
            <?php endif; ?>
            <p><strong>pcnutemanggung.or.id</strong> adalah media online yang dikelola oleh LTN PCNU Kabupaten Temanggung untuk memberikan update berita terbaru seputar Islam, NU, dan kebudayaan yang terjadi sepanjang hari serta artikel bermanfaat lainnya.</p>
         </div>
         <div>
            <?php if(has_nav_menu( 'informasi' )): ?>
            <h6 class="text-lg text-textlight-200 font-semibold mb-5 dark:text-textdark-100">Informasi</h6>
            <?php wp_nav_menu( array(
               'theme_location'  => 'informasi',
               'container' => false,
               'menu_class' => 'menu-informasi flex flex-col space-y-2.5'
            ) );
            ?>
            <?php endif;?>
         </div>
         <div>
            <h6 class="text-lg text-textlight-200 font-semibold mb-5 dark:text-textdark-100">Keislaman</h6>
            <ul class="flex flex-col space-y-2.5">
               <?php
               $article_categories =get_categories( array(
                  'orderby'      => 'count',
                  'order'        => 'DESC',
                  'number'       => 5,
                  'child_of'    => '9'
               ) );
               foreach ($article_categories as $article_category) {
                  echo '<li><a href="' . get_category_link($article_category->term_id) . '" class="hover:text-textlight-200 dark:hover:text-textdark-100">' . '#' . $article_category->name . '</a></li>';
               }
               ?>
            </ul>
         </div>
         <div>
            <h6 class="text-lg text-textlight-200 font-semibold mb-5 dark:text-textdark-100">Berita</h6>
            <ul class="flex flex-col space-y-2.5">
               <?php
               $berita_categories =get_categories( array(
                  'orderby'      => 'id',
                  'order'        => 'ASC',
                  'number'       => 5,
                  'child_of'    => '1'
               ) );
               foreach ($berita_categories as $berita_category) {
                  echo '<li><a href="' . get_category_link($berita_category->term_id) . '" class="hover:text-textlight-200 dark:hover:text-textdark-100">' . '#' . $berita_category->name . '</a></li>';
               }
               ?>
            </ul>
         </div>
      </div>
      <div class="flex flex-col max-w-7xl pb-6 px-3 mx-auto">
         <hr class="mb-6 border-t-border-100 dark:border-t-border-200">
         <p class="text-center">Copyright &copy; 2019 - <?php echo date("Y"); ?> &bull; <a href="<?php echo get_bloginfo('url');?>" class="text-brand-100 hover:text-brand-200"><?php echo get_bloginfo('name'); ?></a> &bull; dikelola oleh LTN PCNU Kabupaten Temanggung</p>
      </div>
   </footer>
   <?php wp_footer(); ?>
</body>
</html>