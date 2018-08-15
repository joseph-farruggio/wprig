<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wprig
 */
if (is_page('contact')) { $bodyClass = "transparent"; }

?>
	<!doctype html>
	<html <?php language_attributes(); ?> class="no-js">

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php if (! wprig_is_amp() ) : ?>
			<script>
				document.documentElement.classList.remove("no-js");
			</script>
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class($bodyClass); ?>>
		<div id="page" class="site" :class="{ navOpen: navOpen }">
			<a class="skip-link screen-reader-text" href="#primary">
				<?php esc_html_e('Skip to content', 'wprig'); ?>
			</a>
			<header id="masthead" class="site-header">
				<div class="container">
					<?php if (has_header_image() ) : ?>
						<figure class="header-image">
							<?php the_header_image_tag(); ?>
						</figure>
					<?php endif; ?>
					<div class="site-branding">
						<?php if (is_page('contact') ) : ?>
							<a href="<?php echo site_url(); ?>" class="custom-logo-link" rel="home" itemprop="url">
								<img src="<?php echo get_theme_mod('bizrocket_alt_logo'); ?>" class="custom-logo" alt="Biz Rocket" itemprop="logo">
							</a>
						<?php else :
							the_custom_logo();
						endif; ?>
						
						<?php if (is_front_page() && is_home() ) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
								<?php bloginfo('name'); ?>
							</a>
						</h1>
					
						<?php else : ?>
						<p class="site-title">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
								<?php bloginfo('name'); ?>
							</a>
						</p>
						<?php endif; ?>

						<?php $wprig_description = get_bloginfo('description', 'display'); ?>
						<?php if ($wprig_description || is_customize_preview() ) : ?>
						<p class="site-description">
							<?php echo $wprig_description; /* WPCS: xss ok. */ ?>
						</p>
						<?php endif; ?>
					</div>
					<!-- .site-branding -->

					<nav id="site-navigation" class="main-navigation"  :class="{ navOpen: navOpen }" aria-label="<?php esc_attr_e('Main menu', 'wprig'); ?>" <?php if (wprig_is_amp()
					    ) : ?> [class]=" siteNavigationMenu.expanded ? 'main-navigation toggled-on' : 'main-navigation' "
						<?php endif; ?>>
						<?php if (wprig_is_amp() ) : ?>
						<amp-state id="siteNavigationMenu">
							<script type="application/json">
								{
									"expanded": false
								}

							</script>
						</amp-state>
						<?php endif; ?>
						
						<span
							aria-label="<?php esc_attr_e('Open menu', 'wprig'); ?>" 
							aria-controls="primary-menu" 
							aria-expanded="false"
							<?php if (wprig_is_amp() ) : ?> on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )" [aria-expanded]="siteNavigationMenu.expanded
							? 'true' : 'false'"
							<?php endif; ?>>

							<span class="menu-trigger">
								<i class="menu-trigger-bar top"></i>
								<i class="menu-trigger-bar middle"></i>
								<i class="menu-trigger-bar bottom"></i>
							</span>
							<span class="close-trigger">
								<i class="close-trigger-bar left"></i>
								<i class="close-trigger-bar right"></i>
							</span>

						</span>

						<button 
							@click="navOpen = !navOpen"
							class="menu-toggle"
							aria-label="<?php esc_attr_e('Open menu', 'wprig'); ?>" 
							aria-controls="primary-menu" 
							aria-expanded="false"
							data-text-original="MENU"
							data-text-swap="CLOSE"
						    <?php if (wprig_is_amp() ) : ?> on="tap:AMP.setState( { siteNavigationMenu: { expanded: ! siteNavigationMenu.expanded } } )" [aria-expanded]="siteNavigationMenu.expanded
							? 'true' : 'false'"
							<?php endif; ?>>
							<?php esc_html_e('Menu', 'wprig'); ?>
						</button>

						<div class="primary-menu-container">
							<ul class="menu" id="primary-menu" :class="{subMenuOpen: subMenuOpen}">
								<menu-item 
									v-cloak
									v-for="item in navItems"
									v-if="item.post_parent == 0 && item.title !== 'Contact'"
									:key="item.object_id"
									:class="{subMenuOpen: item.active}"
									v-bind:active="item.active"
									v-bind:url="item.url"
									v-bind:object_id="item.object_id"
									v-bind:post_parent="item.post_parent"
									v-bind:title="item.title">
									<div class="menu-item-container">
										<a :href="item.url">{{ item.title }}</a> 
										<span @click="item.active = !item.active; subMenuOpen = !subMenuOpen"><i class="fa fa-arrow-right"></i></span>
									</div>
									<ul class="sub-menu">
										<sub-menu-item 
											v-for="subItem in navItems"
											:key="subItem.object_id"
											v-if="subItem.post_parent == item.object_id"
											v-bind:object_id="subItem.object_id"
											v-bind:url="subItem.url"
											v-bind:ID="subItem.ID"
											v-bind:post_parent="subItem.post_parent"
											v-bind:title="subItem.title">
										</sub-menu-item>
										<span @click="subMenuOpen = !subMenuOpen" class="menu-back"><i class="fa fa-arrow-left"></i> Back</span>
									</ul>
								</menu-item>
								<li class=""><div class="menu-item-container"><a href="https://www.bizrocket.net/contact/">Contact</a></div></li>
								
							</ul>
							
							<?php
									// wp_nav_menu(
									// 		array(
									// 		'theme_location' => 'primary',
									// 		'menu_id'        => 'primary-menu',
									// 		'container'      => 'ul',
									// 		)
									// );
							?>
						</div>
					</nav>
					<!-- #site-navigation -->
				</div>
			</header>
			<!-- #masthead -->
