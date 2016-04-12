<div class="row">
    <div class="large-6 columns">
        <div class="panel">
            <h4>Existing User Login</h4>

            <form role="form" action="/login/login" method="post">
                <div class="form-group">
                    <label for="player">Username:</label>
                    <input type="text" name="player" class="form-control" id="player">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="rememberMe" id="rememberMe">
                    <label for="rememberMe">Remember Me?</label>
                </div>
                <button type="submit" class="btn btn-default expand">Login</button>
            </form>
        </div>
    </div>
    <div class="large-6 columns">
        <div class="panel">
            <h4>Register New Account</h4>

            <form role="form" action="/login/register" method="post">
                <div class="form-group">
                    <label for="team">Team:</label>
                    <input type="text" name="team" class="form-control" id="team" value="O00">
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="rememberMe" id="rememberMe">
                    <label for="rememberMe">Remember Me?</label>
                </div>
                <button type="submit" class="btn btn-default expand">Register</button>
            </form>
        </div>
    </div>
</div>