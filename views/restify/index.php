<?php defined('SYSPATH') or die('No direct script access.') ?>
<?php echo View::factory('restify/header', array('path' => $path)); ?>

	<div id="wrapper">

		<?php echo Form::open(NULL) ?>
	
			<div id="header">
	
				<div id="request">
			
					<div id="method">
						<?php echo Form::radio('method', 'GET', TRUE, array('id' => 'method_get')), Form::label('method_get', 'GET'), PHP_EOL; ?>
						<?php echo Form::radio('method', 'POST', FALSE, array('id' => 'method_post')), Form::label('method_post', 'POST'), PHP_EOL; ?>
						<?php echo Form::radio('method', 'PUT', FALSE, array('id' => 'method_put')), Form::label('method_put', 'PUT'), PHP_EOL; ?>
						<?php echo Form::radio('method', 'DELETE', FALSE, array('id' => 'method_delete')), Form::label('method_delete', 'DELETE'); ?>			
					</div>		
		
					<?php echo HTML::anchor('#', '<span></span>', array('id' => 'settings')); ?>
	
					<?php echo Form::input('url', NULL, array('id' => 'url', 'placeholder' => 'http://api.example.com/resource.json?key=value', 'class' => 'ui-widget-content ui-corner-all')) ?>
			
					<?php echo Form::submit('submit', 'Request', array('id' => 'submit')); ?>
					
					<div id="loader"></div>
					
					<div class="clear"></div>
				</div>
	
				<div class="clear"></div>
			</div>
	
			<div id="config">
	
				<div class="tabs">
					<ul>
						<li><?php echo HTML::anchor('#config_data', __('Data')); ?></li>
						<li><?php echo HTML::anchor('#config_headers', __('Headers')); ?></li>
						<li><?php echo HTML::anchor('#config_settings', __('Settings')); ?></li>
						<li><?php echo HTML::anchor('#config_about', __('About')); ?></li>			
					</ul>
					<div id="config_data" class="post_rows">
	
						<?php echo HTML::anchor('#', __('Add Row'), array('id' => 'add_data')); ?>
						
						<ul></ul>
						
					</div>
					<div id="config_headers" class="post_rows">
						
						<?php echo HTML::anchor('#', __('Add Row'), array('id' => 'add_header')); ?>					
	
						<ul></ul>						
						
					</div>
					<div id="config_settings">
						
						<dl>
						    <dt><?php echo Form::label('setting_useragent', __('User Agent')) ?></dt>
						    <dd><?php echo Form::input('setting_useragent', $useragent, array('class' => 'ui-widget-content ui-corner-all', 'id' => 'setting_useragent')) ?></dd>
						</dl>	
					
						<dl>
						    <dt><?php echo Form::label('setting_referer', __('Referer')) ?></dt>
						    <dd><?php echo Form::input('setting_referer', $referer, array('class' => 'ui-widget-content ui-corner-all', 'id' => 'setting_referer')) ?></dd>
						</dl>			

						<dl>
						    <dt>Cookies</dt>
						    <dd><?php echo Form::checkbox('setting_cookies', 1, TRUE, array('id' => 'setting_cookies')) ?><?php echo Form::label('setting_cookies', __('Return Cookies')) ?></dd>
						</dl>	
						
					</div>
					<div id="config_about">

						<p>Thank you for your interest in <?php echo HTML::anchor('http://restify.io'); ?>. This tool is here to make RESTful testing easier. It was created by <?php echo HTML::anchor('http://morgan.ly', 'Micheal Morgan'); ?>.</p>
						
						<p>Restify is an open source <?php echo HTML::anchor('http://kohanaframework.org/', 'Kohana'); ?> module and is available on GitHub: <?php echo HTML::anchor('http://github.com/michealmorgan/kohana-restify'); ?>.</p>

					</div>
				</div>
	
			</div>	
		
		<?php echo Form::close(), PHP_EOL; ?>
	
		<div id="message"></div>
			
		<div id="response">
		
			<div class="tabs">
				<ul>
					<li><?php echo HTML::anchor('#response_content', __('Response')); ?></li>
					<li><?php echo HTML::anchor('#response_headers', __('Headers Received')); ?></li>
					<li><?php echo HTML::anchor('#response_headers_out', __('Headers Sent')); ?></li>
					<li><?php echo HTML::anchor('#response_cookies', __('Cookies')); ?></li>					
				</ul>
				<div id="response_content"></div>
				<div id="response_headers"></div>
				<div id="response_headers_out"></div>
				<div id="response_cookies"></div>				
			</div>
			
		</div>

	</div>

	<?php echo HTML::script($path . 'js/jquery-1.6.2.min.js'), PHP_EOL; ?>
	<?php echo HTML::script($path . 'js/jquery-ui-1.8.14.custom.min.js'), PHP_EOL; ?>
	<?php echo HTML::script($path . 'js/prettify/prettify.js'), PHP_EOL; ?>
	<?php echo HTML::script($path . 'js/global.js'), PHP_EOL; ?>
	<script>
		var restify = {
			controller: '<?php echo URL::site('restify/request') ?>',
			template: {
				data: '<?php echo View::factory('restify/row', array('prefix' => 'data')); ?>',
				header: '<?php echo View::factory('restify/row', array('prefix' => 'header')); ?>'
			}
		};		
	</script>
	
<?php echo View::factory('restify/footer'); ?>