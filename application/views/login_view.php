<!-- application/views/login_view.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php echo validation_errors('<div class="error">', '</div>'); ?>
    <?php echo form_open('login/process_login'); ?>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
