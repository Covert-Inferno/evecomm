<div class="dialog">
	<div class="dialogtitle"><?php echo($this->base->language->getString("Please login")); ?></div>
	<div class="dialogcontent">
	<form method="post" action="index.php?page=check">
	<table>
		<tr>
			<td><?php echo($this->base->language->getString("Username")); ?>: </td>
			<td><input type="text" name="username" /></td>
		</tr>
		<tr>
			<td><?php echo($this->base->language->getString("Password")); ?>: </td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td><a href="index.php?page=register"><?php echo($this->base->language->getString("Register")); ?></a></td>
			<td><input type="submit" value="<?php echo($this->base->language->getString("Login")); ?>" /></td>
		</tr>
	</table>
	</form>
	</div>
</div>