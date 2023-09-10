<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
   
   <?php wp_head(); ?>
</head>
<body <?php body_class('bg-bglight-100 text-textlight-100 font-montserrat font-normal text-base dark:bg-bgdark-100 dark:text-textdark-200'); ?>>
   <header id="main-header" class="border-b border-b-border-100 dark:border-b dark:border-b-border-200">
      <div class="flex mx-auto max-w-7xl px-3 h-[70px] items-center sm:h-20 lg:h-24">
         <div class="flex justify-start w-4/5 md:w-1/3 lg:w-1/4">
            <?php if(has_custom_logo()): ?>
               <?php
                  $custom_logo_id = get_theme_mod('custom_logo');
                  $custom_logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
                  $custom_logo_url = $custom_logo_data[0];
               ?>
               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="w-60"></a>
            <?php else: ?>
               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" class="text-lg font-semibold text-textlight-200 hover:text-brand-200 dark:text-textdark-100 dark:hover:text-brand-100"><h3><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></h3></a>
            <?php endif; ?>
         </div>
         <div class="flex justify-end space-x-10 w-1/5 md:w-2/3 lg:w-3/4">
            <button id="toggledark" class="group" onclick="toggleDark()" name="toggle">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="nne sun w-6 h-6 stroke-brand-100 group-hover:stroke-brand-200">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
               </svg>
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="moon w-6 h-6 stroke-brand-100 group-hover:stroke-brand-200">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
               </svg>
            </button>
         </div>
      </div>
   </header>
   <main id="main-content" class="py-10 md:py-12">