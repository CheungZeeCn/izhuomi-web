<h1>User Profile</h1>
<table>
    <tr>
	<th> Id </th>
	<th> User_Id </th>
	<th> Reading Time </th>
	<th> Reading Paper </th>
	<th> Level Information </th>
    </tr>

    <?php foreach ($izProfiles as $u):?>
    <tr>
	<td> <?php echo $u['IzProfile']['id']; ?> </td>
	<td> <?php echo $u['IzProfile']['user_id']; ?> </td>
	<td> <?php echo $u['IzProfile']['total_reading_time']; ?> </td>
	<td> <?php echo $u['IzProfile']['total_reading_paper']; ?> </td>
	<td> <?php echo $u['IzProfile']['level_info']; ?> </td>
    </tr>
    <?php endforeach; ?>
</table>
