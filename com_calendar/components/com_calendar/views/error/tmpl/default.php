<div class="com_calendar">
	<div class="error">
		<h1>Oops</h1>
		
		<p>There was an error processing your transaction.</p>
		<p><?=KRequest::get('get.message', 'string')?></p>
		<p><a href="<?=@route('view=review')?>">Go Back</a></p>
	</div>
</div>