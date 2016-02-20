<h4>{currentPlayer}</h4>
<form method="GET" id="player-select" action="/player/getSpecificPlayer" class="form-inline pull-right">
	{players}
</form>
</div>
</div>
</div>

<div class="row">
	<div class="large-6 columns">
		<div class="panel">
			<h4>Recent Activity</h4>
			{activity}
		</div>
	</div>
	<div class="large-6 columns">
		<div class="panel">
			<h4>Stock Holdings</h4>
			{holdings}
		</div>
	</div>
</div>