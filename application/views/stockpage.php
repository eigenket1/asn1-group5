<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <form method="GET" id="stock-select" action="/stock/getSpecificStock" class="form-inline pull-right">
                {dropdown}
            </form>
            <div>Current:
                {curstats}
            </div>
            <div>
                Movements:
                {table}
            </div>
            <div>
                Transactions:
                {tabletransactions}
            </div>
        </div>
    </div>
</div>