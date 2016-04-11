<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <form method="GET" id="stock-select" action="/stock/getSpecificStock" class="form-inline pull-right">
                <select name="stockChoice" onchange="this.form.submit()">
                    <option value="">Select a Stock</option>
                    {dropdownCodes}
                    <option>{Code}</option>
                    {/dropdownCodes}
                </select>
            </form>
            <div>
                <h4>{currentStock}Current Value of {Code}: {Value}{/currentStock}</h4>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-6 columns">
        <div class="panel">
            <div>
                <h4>Movements</h4>
                <table style="width:100%">
                    <tr>
                        <th>Code</th>
                        <th>Time</th>
                        <th>Action</th>
                        <th>Value</th>
                    </tr>
                    {currentMovements}
                    <tr>
                        <td>{Code}</td>
                        <td>{Datetime}</td>
                        <td>{Action}</td>
                        <td>{Amount}</td>
                    </tr>
                    {/currentMovements}
                </table>
            </div>
        </div>
    </div>
    <div class="large-6 columns">
        <div class="panel">
            <div>
                <h4>Transactions</h4>
                <table style="width:100%">
                    <tr>
                        <th>Code</th>
                        <th>Time</th>
                        <th>Player</th>
                        <th>Action</th>
                        <th>Value</th>
                    </tr>
                    {currentTransactions}
                    <tr>
                        <td>{Stock}</td>
                        <td>{DateTime}</td>
                        <td>{Player}</td>
                        <td>{Trans}</td>
                        <td>{Quantity}</td>
                    </tr>
                    {/currentTransactions}
                </table>
            </div>
        </div>
    </div>
</div>