	<?php do_action('before_footer'); ?>

	<footer role="contentinfo">

		<div class="footer__menus">
			<div class="max__width">
				
				<?php
				while (have_rows('footer_menus', 'options')) : the_row();

					$footer_menu = get_sub_field('footer_menu');
				?>
					<article class="footer__menu">
						<?php if ($footer_menu) : ?>
							<h5><?php echo $footer_menu->name; ?> <i class="fas fa-chevron-down"></i></h5>
							<?php wp_nav_menu(array('menu' => $footer_menu->name, 'container' => false)); ?>
						<?php endif; ?>
					</article>

				<?php endwhile; ?>
			</div>
		</div>

		<div class="subfooter footer__social">
			<div class="max__width">
				<ul>
					<li><a href="https://www.facebook.com/Walford.and.Round.Opticians/?locale=en_GB" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
					<li><a href="https://uk.linkedin.com/company/walford-&-round" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
					<li><a href="https://twitter.com/walfordandround?lang=en" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/walford_and_round_opticians/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
				</ul>
			</div>
		</div>
	</footer>

	<div class="spotlight-search">
		<div class="spotlight-search--content">
			<a href="#" class="spotlight-close"><i class="fal fa-times"></i></a>

			<h2>Search Pollards Opticians</h2>
			<form action="<?php echo esc_url(home_url()); ?>">
				<input type="text" name="s" placeholder="ie. News" />
				<button type="submit" class="button primary"><i class="fal fa-search"></i></button>
			</form>
		</div>
	</div>

	</div><!-- #page -->

	<?php wp_footer(); ?>
	
	</body>

	</html>