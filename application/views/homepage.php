<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <h4>Game Status: {gameStatus}Round #{round}, State: {state} ({desc}){/gameStatus}</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="large-6 columns">
        <div class="panel">
            <h4>Stock List</h4>
            <table style="width:100%">
                <tr>
                    <th>Stock</th>
                    <th>Value</th>
                </tr>
                {stockCodes}
                <tr>
                    <td>{Code}</td>
                    <td>{Value}</td>
                </tr>
                {/stockCodes}
            </table>
        </div>
    </div>
    <div class="large-6 columns">
        <div class="panel">
            <h4>Player List</h4>
            <table style="width:100%">
                <tr>
                    <th>Player</th>
                    <th>Cash</th>
                    <th>Equity</th>
                </tr>
                {playerList}
                <tr>
                    <td>{Player}</td>
                    <td>{Cash}</td>
                    <td>{Equity}</td>
                </tr>
                {/playerList}
            </table>
        </div>
    </div>
</div>