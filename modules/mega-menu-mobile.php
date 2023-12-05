<nav id="nav_mobile" class="nav__mobile">
    <div>
        <div class="menu__logo"><img src="<?php echo esc_url(get_stylesheet_directory_uri().'/img/logo.png'); ?>" alt="<?php bloginfo('name'); ?>"></div>
        <ul>
            <?php
                while(have_rows('mega_menu', 'option')) : the_row();
                
                if(get_sub_field('menu_item_hide')) { continue; }    
            ?>
                <li>
                    <a href="<?php the_sub_field('menu_item_link'); ?>">
                        <?php the_sub_field('menu_item_label'); ?>
                    </a>

                    <?php if(have_rows('menu_item_columns')): ?>
                        <ul>
                            <?php 
								while(have_rows('menu_item_columns')) : 
									the_row();
									
									$column_name = get_sub_field('column_name');
									$column_name_link = get_sub_field('column_link');
									$column_name_link_target = get_sub_field('column_name_link_target');

									$has_ul = false;

									if($column_name): ?>
										<li>
											<?php
												if($column_name_link):
													$target = '';
													if($column_name_link_target) {
														$target = ' target="_blank"';
													}
											?>
												<a href="<?php echo $column_name_link; ?>"<?php echo $target; ?>>
											<?php endif; ?>
											<?php echo $column_name; ?>
											<?php if($column_name_link): ?></a><?php endif; ?>
											<ul>
									<?php endif;
							?>
                                <?php
										
                                    // -------------- COLUMN --------------
                                    if(get_row_layout() == 'submenu_column'):

                                        $column_subs = get_sub_field('column_subs');
                                        foreach($column_subs as $column_sub):

                                            $post_img = '';
                                            $post_title = '';
                                            $post_url = '';

                                            if($column_sub['type'] == 'post') {

                                                $post_id = $column_sub['post'];
                                                $post_title = get_the_title($post_id);
                                                $post_url = get_permalink($post_id);

                                            } else {

                                                $custom = $column_sub['custom'];
                                                $post_title = $custom['label'];
                                                $post_url = $custom['url'];

                                            }
                                ?>       
                                        <li>
                                            <a href="<?php echo $post_url; ?>">
                                                <?php echo $post_title; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>

									<?php if($column_name): ?>
											</ul>
										</li>
									<?php endif; ?>

                                <?php
                                    // -------------- Icon Links --------------
                                    elseif(get_row_layout() == 'icon_links'):
                                        $column_subs = get_sub_field('column_subs');

                                        foreach($column_subs as $column_sub):
                                            $label = $column_sub['label'];
                                            $url = $column_sub['url'];
                                    ?>
                                        <li>
                                            <a href="<?php echo $url; ?>">
                                                <?php echo $label; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>

                                
                                <?php endif; // end layout check ?>

                            <?php endwhile; ?>
                        </ul><!-- panel -->
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</nav>
