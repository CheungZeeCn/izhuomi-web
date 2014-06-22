<h1>Users list</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        <th>Created</th>
        <th>Modified</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->
    <!--id | username     | password | role  | created             | modified-->
    <!-- todo delete this function-->

    <?php foreach ($izUsers as $u):?>
    <tr>
        <td><?php echo $u['IzUser']['id']; ?></td>
        <td><?php echo $u['IzUser']['username']; ?></td>
        <td><?php echo $u['IzUser']['password']; ?></td>
        <td><?php echo $u['IzUser']['role']; ?></td>
        <td><?php echo $u['IzUser']['created']; ?></td>
        <td><?php echo $u['IzUser']['modified']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
