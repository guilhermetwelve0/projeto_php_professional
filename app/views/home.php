<h2>Users</h2>

<ul>
    <?php foreach ($users as $user): ?>
       <li><?php print_r($user->first_name); ?></li>
    <?php endforeach; ?>
</ul>

