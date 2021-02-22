<?php
    // include_once __DIR__ . '/vendor/autoload.php';

    // $dotenv = new Dotenv\Dotenv(__DIR__);
    // $dotenv->load();
    
    // var_dump(getenv('PROJECT_NAME'));
    // var_dump($_ENV['PROJECT_NAME']);

    // $log = new Monolog\Logger('name');
    // $log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
    // $log->addWarning('Foo');

    require_once(realpath(dirname(__FILE__) . "./header.php"));
    require_once(realpath(dirname(__FILE__) . "./db_connect.php"));
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Name: </label> <br> 
    <input type="text" name="fname"><br>
    <label> Last Name: </label> <br>
    <input type="text" name="lname"><br>
    <label>Email: </label> <br> 
    <input type="email" name="email"><br>
    <label> Phone Number: </label> <br>
    <input type="text" name="phone"><br>
    <label> Password: </label> <br>
    <input type="password" name="password"><br>

    <input type="submit">
</form>

<?php
    $fNameErr = $lNameErr = $emailErr= $phoneErr = $passwordErr = "";
    $firstName = $lastName = $email = $phoneNumber = $password = "";
        
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // if(empty($_POST["fname"])) {
        //     $fNameErr= "First Name is required";
        // } else {
            $firstName = test_input($_POST["fname"]);
        // }

        // if(empty($_POST["lname"])) {
        //     $lNameErr= "Last Name is required";
        // } else {
            $lastName = test_input($_POST["lname"]);
        // }

        // if(empty($_POST["email"])) {
        //     $emailErr= "Email Address is required";
        // } else {
            $email = test_input($_POST["email"]);
        // }

        // if(empty($_POST["phone"])) {
        //     $phoneErr= "Phone Number is required";
        // } else {
            $phoneNumber = test_input($_POST["phone"]);
        // }

        // if(empty($_POST["password"])) {
        //     $passwordErr= "Password is required";
        // } else {
            $password = test_input($_POST["password"]);
        // }
    }

    function test_input($data) {
        $data = trim($data);
        $data= stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>



<?php
    require_once(realpath(dirname(__FILE__) . "./footer.php"));
?>