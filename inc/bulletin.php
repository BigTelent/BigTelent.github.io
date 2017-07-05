<div id="scrolldiv">
	<div class="scrolltext">
		<ul>
			<?php echo md_get_option('bulletin_text')?>
		</ul>
	</div>
</div>
<script type="text/javascript">$(document).ready(function() {$("#scrolldiv").textSlider({line: 1, speed: 800, timer: 8000});})</script>