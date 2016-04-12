<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <h4>{currentPlayer}</h4>

            <form method="GET" id="player-select" action="/player/getSpecificPlayer" class="form-inline pull-right">
                <select name="playerChoice" onchange="this.form.submit()">
                    <option value="">Select a Player</option>
                    {playerList}
                    <option value='{Player}'>{Player}</option>
                    {/playerList}
                </select>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        <div class="panel">
            <h4>Recent Activity</h4>
            <table style="width:100%;">
                <tr>
                    <th>Date/Time</th>
                    <th>Stock</th>
                    <th>Transaction</th>
                    <th>Quantity</th>
                </tr>
                {playerActivities}
                <tr>
                    <td>{DateTime}</td>
                    <td>{Stock}</td>
                    <td>{Trans}</td>
                    <td>{Quantity}</td>
                </tr>
                {/playerActivities}
            </table>
        </div>
    </div>
    <div class="large-6 columns">
        <div class="panel">
            <h4>Stock Holdings</h4>
            <table style="width:100%;">
                <tr>
                    <th>Date/Time</th>
                    <th>Stock</th>
                </tr>
                {playerHoldings}
                <tr>
                    <td>{Stock}</td>
                    <td>{Quantity}</td>
                </tr>
                {/playerHoldings}
            </table>
        </div>
    </div>
</div>