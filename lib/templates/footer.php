<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
 /* Define Templates */
 $templates = new NoticiasYa_Template_Loader;

?>

</div><!-- #content -->
</div><!-- #page -->
</div><!-- #wrap -->


<div id="footer_promos" class="section footer-promos">
	<div class="grid grid--no-gutters">
		<div class="grid__item medium-up--one-half grid__item--full">
			<div data-component-name="default" class="newsletter footer-promos__item" data-wow-offset="20">
				<div class="footer-promos__item__inner">
					<h3 class="text-center">MANTENTE INFORMADO / ÚNETE</h3>
					<form class="form-horizontal">
						<input aria-label="Enter your email address" type="name" name="name" class="footer__subscribe-form-email__1kVKK" placeholder="Your Name">
						<input aria-label="Enter your email address" type="email" name="email" class="footer__subscribe-form-email__1kVKK" placeholder="Email Address">
						<button class="button btn btn--black" type="submit">Unete <i class="icon icon--arrow-right"></i></button>
					</form>
				</div>
			</div>
		</div>
		<div class="grid__item medium-up--one-half grid__item--full">
			<div data-component-name="default" class="anunciate inverse footer-promos__item" data-wow-offset="20">
				<div class="footer-promos__item__inner">
					<div class="vertical-center">
						<h3>ANÚNCIATE CON NOSOTROS</h3>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<a class="button btn" href="/anunciate">Mas informacion <i class="icon icon--arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="section-footer" class="section">
	<footer id="footer" class="footer">
		<section>
			<div class="footer-wrap">
				<div class="container">
					<div class="container-inner">
						<div class="row flexify-equal-columns">
							<?php
                if (is_active_sidebar('footer')) {
                  dynamic_sidebar('footer');
                }
              ?>
						</div>
					</div>
				</div>

				<div class="footer-sub clearfix">
					<div class="container">
						<div class="footer-sub-links col-md-3">

						</div>

						<div class="footer-sub-links col-md-6 text-center">
							<ul class="list-inline text-center">
								<li>Copyright © <?php echo get_bloginfo( 'name' ); ?> Entravision – All rights reserved.</li>
							</ul>
						</div>

						<div class="footer-sub__logo col-md-3">
							<?php $templates->get_template_part( 'template-parts/ny_logo'); ?>
						</div>
					</div>
				</div>

			</div>
		</section>
	</footer>
  <?php $templates->get_template_part( 'template-parts/mobile-menu'); ?>

</div>



<?php wp_footer(); ?>

</body>

</html>
