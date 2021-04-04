<!DOCTYPE html>
<html>
<body>
	<h1>Database Lookup</h1>
	<img src="https://image.noelshack.com/fichiers/2021/13/7/1617495812-original.gif" />
	<br /><br />
	<form method="POST">
		<input type="text" name="pseudo" />
		<br />
		<input type="submit" name="submit" />
	</form>
	<br />
	<?php
	if (!empty(isset($_POST["submit"])))
	{
		if (isset($_POST["pseudo"]))
		{
			$matches = array();
			$pseudo = $_POST["pseudo"];
			foreach (glob("databases/*") as $file) 
			{
				$handle = @fopen($file, "r");
				if ($handle)
				{
				    while (!feof($handle))
				    {
				        $buffer = fgets($handle);
				        if (strpos($buffer, $pseudo) !== FALSE)
				            $matches[] = $buffer;
				    }
				    fclose($handle);
				}
			}
			$result = array_unique($matches, SORT_REGULAR);
			foreach ($result as $key => $value) 
			{
				echo $key . $value;
			}
		}
	}
	?>
</body>
<style>
	body
	{
		background-color:black;
		color:red;
		font-family: Arial;
		text-align:center;
	}
</style>
</html>
