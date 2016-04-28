<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Dashboard users go to after the registration/login process">
    <title>User Dashboard</title>
  </head>
  <body>
    <h2>Hello <?php
    echo $this->session->userdata['user_data']['name'];?>!</h2>
    <a href="/Details/logoff">Log off</a>
    <h3>Here is a list of your friends:</h3>
    <h5><?php echo $this->session->flashdata('no_friends');  ?></h5>
    <table border="1">
      <tr>
        <th>Alias</th>
        <th>Action</th>
      </tr>
      <?php foreach ($my_friends as $friend): ?>
      <tr>
        <td><?= $friend['alias']?></td>
        <td><a href="/Details/user/<?= $friend['added_friend_id']?>">View Profile</a>         <a href="/Details/remove/<?=$friend['added_friend_id']  ?>">Remove as a friend</a></td>
      </tr>
    <?php endforeach; ?>
    </table>

    <h3>Other Users not on your friend's list</h3>
    <table border="1">
      <tr>
        <th>Alias</th>
        <th>Action</th>
      </tr>
        <?php foreach ($other_users as $value): ?>
      <tr>
          <td><a href="/Details/user/<?= $value['id']?>"><?= $value['alias']; ?></a></td>
          <td><form action="/Details/add/<?= $value['id']?>" method="post">
            <input type="submit" value="Add as Friend">
          </form>
          </td>
        <?php endforeach; ?>
      </tr>
    </table>
  </body>
</html>
