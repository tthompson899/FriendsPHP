<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Login and Register Users">
    <title>Login or Register</title>
  </head>

  <body>
    <h2>Login Or Register</h2>
    <form action="/Users/register" method="post">
      <?php echo $this->session->flashdata('errors');   ?>
      <fieldset>
        <legend>Register</legend>
        Name: <input type="text" name="name" placeholder="Name">
        Alias: <input type="text" name="alias" placeholder="Alias">
        Email: <input type="text" name="email" placeholder="Email">
        Password: <input type="password" name="password" placeholder="Password">
        Confirm Password: <input type="password" name="confirm_password" placeholder="confirm_password">
        Date of Birth: <input type="date" name="dob" placeholder="Date of Birth">

        <input type="submit" value="Register">
      </fieldset>
    </form>

    <form action="/Users/login" method="post">
      <?php echo $this->session->flashdata('lerrors');  ?>
      <fieldset>
        <legend>Login</legend>
        Email: <input type="text" name="email" placeholder="Email">
        Password: <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
      </fieldset>
    </form>
  </body>
</html>
