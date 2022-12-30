<?php $this->layout('master', ['title' => $title]) ?>
<h2>Users</h2>

<ul id="users-home">
  <?php foreach ($users as $user) : ?>
    <li><?php echo $user->firstName; ?> | <a href="/user/<?php echo $user->id; ?>">detalhes</a></li>
  <?php endforeach; ?>
</ul>

<?php $this->start('scripts') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js" integrity="sha512-QTnb9BQkG4fBYIt9JGvYmxPpd6TBeKp6lsUrtiVQsrJ9sb33Bn9s0wMQO9qVBFbPX3xHRAsBHvXlcsrnJjExjg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  axios.defaults.headers = {
    "Content-type": "application/json",
   HTTP_X_REQUESTED_WITH: "XMLHttpRequest",
  }
  async function loadUsers() {
    try {
      const {
        data
      } = await axios.get('/users');
      console.log(data);
    } catch (error) {
      console.log(error);
    }
  }
  loadUsers();
</script>

<?php $this->stop() ?>