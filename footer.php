				</div>
			</div>

			<footer class="site-footer" role="contentinfo">
				<div class="inner">
					<div class="row">
						<div class="col-left richtext">

						<? if ( is_active_sidebar('footer')):
								echo dynamic_sidebar('footer');
							endif;
						?>

						</div>
						<div class="col-right">
							<?= module('search')?>
							<?= module('footer-links')?>
						</div>
					</div>
				</div>
			</footer>

		</div>

		<?php wp_footer(); ?>

	</body>
</html>