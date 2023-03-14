<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting system</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="main">
        <h1>VOTING SYSTEM</h1>
        <div class="login">
            <h2>LOGIN</h2>
            <form action="login.php" method="POST">
                <div>
                    <input type="text" name="username" placeholder="Enter your username" required="required">
                    <input type="text" name="regno" placeholder="Enter your Regestration number" required="required">
                    <input type="password" name="pass" placeholder="Enter your Password" required="required">
                </div>
                <div>
                    <select name="std">
                        <option value="Group">Group</option>
                        <option value="Voter">Voter</option>
                    </select>
                </div>
                <button type="submit" name="login">Login</button>
                <p>Don't have account? Please contact Admin for Registration</p>
                
            </form>
        </div>
    </div>
</body>
</html>