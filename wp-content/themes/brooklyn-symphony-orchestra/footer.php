			<footer role="contentinfo">

				<div id="inner-footer" class="clearfix">
		          <hr />
		          <div id="widget-footer" class="clearfix row-fluid">
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : ?>
		            <?php endif; ?>
		            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : ?>
		            <?php endif; ?>
		          </div>

		          <div id="bottomfooter">
					<div class="row">
						<div class="span12">
						<?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
						</div>
					</div>
					<div class="row">
						<div class="span12">
							<img src="<?php bloginfo('url');?>/wp-content/uploads/2012/08/logo-footer.jpg">
							<p class="attribution"> &copy; <?php bloginfo('name'); ?></p>
							<p class="pull-left"><a href="http://awkale.me" target="_blank" title="Alex W. Kale">Website by Alex Kale</a></p>
						</div>
					</div>

					</div> <! -- end #bottomfooter -->

				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->

		</div> <!-- end #container -->

		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->

		<?php wp_footer(); // js scripts are inserted using this function ?>

	</body>

</html>