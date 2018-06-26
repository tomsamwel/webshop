<?php
	require '../boot.php';

	$errors = [];

	if($_SERVER['REQUEST_METHOD'] === 'POST') {

		$variables = [
			'email' => ['required', 'email', 'min:7', 'max:155'],
			'password' => ['required', 'min:8', 'max:100', 'confirmed'],
			'first_name' => ['required', 'name', 'min:2', 'max:50'],
			'suffix_name' => ['min:1', 'max:15', 'name'],
			'last_name' => ['required', 'name', 'min:2', 'max:50'],
			'country' => ['min:2', 'max:15', 'name'],
			'city' => ['required', 'min:2', 'max:55', 'name'],
			'street' => ['required', 'min:2', 'max:85', 'name'],
			'street_number' => ['required', 'min:1', 'max:5'],
			'street_suffix' => ['min:1', 'max:25'],
			'zipcode' => ['required', 'postcode', 'min:6', 'max:7'],
		];

		require '../app/validation/validations.php';

		if(count($errors) == 0) {
			require '../app/payment/new.php';

			dd(include 'partials/succes.php');
		}

	}
	// dd($_POST);

	function value($key)
	{
		return @$_POST[$key];
	}




?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="webshop" content="">
  	<meta name="Tom's webshop" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<title>Webshop - register</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
	<?php require 'partials/navbar.php'; ?>
	<section class="content cont">
		<h1>Sign up</h1>

		<?php if(@$errors) { ?>
			<div class="alert alert-danger">
				Oops, not everything is filled in correctly!
			</div>
		<?php } ?>

		<form class="form-horizontal" action="" method="POST">

			<div class="form-group">
				<label class="col-sm-3 control-label">
					Voornaam
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="first_name" placeholder="Voornaam" value="<?php echo value('first_name'); ?>">
					<?php echo (@$errors['first_name']) ? '<p class="text-danger">'.$errors['first_name'][0].'</p>' : ''; ?>
				</div>
				<label class="col-sm-3 control-label">
					Tussenvoegsel
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="suffix_name" placeholder="Tussenvoegsel" value="<?php echo value('suffix_name'); ?>">
					<?php echo (@$errors['suffix_name']) ? '<p class="text-danger">'.$errors['suffix_name'][0].'</p>' : ''; ?>
				</div>
				<label class="col-sm-3 control-label">
					Achternaam
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="last_name" placeholder="Achternaam" value="<?php echo value('last_name'); ?>">
					<?php echo (@$errors['last_name']) ? '<p class="text-danger">'.$errors['last_name'][0].'</p>' : ''; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">
					Land
				</label>
				<div class="col-sm-2">
					<select class="form-control" name="country" placeholder="Kies een land">
						<?php foreach([
							'NL' => 'Nederland',
							'BE' => 'België',
							'DE' => 'Deutschland'
						] as $iso => $country) { ?>
						<option value="<?php echo $iso; ?>" <?php echo (value('country')) ? 'selected="selected"' : ''; ?>><?php echo $country; ?></option>
						<?php } ?>
					</select>
					<?php echo (@$errors['country']) ? '<p class="text-danger">'.$errors['country'][0].'</p>' : ''; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">
					Stad
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="city" placeholder="Stad" value="<?php echo value('city'); ?>">
					<?php echo (@$errors['city']) ? '<p class="text-danger">'.$errors['city'][0].'</p>' : ''; ?>
				</div>
				<label class="col-sm-1 control-label">
					Postcode
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="zipcode" placeholder="Postcode" value="<?php echo value('zipcode'); ?>">
					<?php echo (@$errors['zipcode']) ? '<p class="text-danger">'.$errors['zipcode'][0].'</p>' : ''; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">
					Straat
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="street" placeholder="Straat" value="<?php echo value('street'); ?>">
					<?php echo (@$errors['street']) ? '<p class="text-danger">'.$errors['street'][0].'</p>' : ''; ?>
				</div>
				<label class="col-sm-3 control-label">
					Huisnummer
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="street_number" placeholder="Huisnummer" value="<?php echo value('street_number'); ?>">
					<?php echo (@$errors['street_number']) ? '<p class="text-danger">'.$errors['street_number'][0].'</p>' : ''; ?>
				</div>
				<label class="col-sm-3 control-label">
					Toevoeging
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="street_suffix" placeholder="Toevoeging" value="<?php echo value('street_suffix'); ?>">
					<?php echo (@$errors['street_suffix']) ? '<p class="text-danger">'.$errors['street_suffix'][0].'</p>' : ''; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">
					E-mail adres
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="text" name="email" placeholder="E-mail adres" value="<?php echo value('email'); ?>">
					<?php echo (@$errors['email']) ? '<p class="text-danger">'.$errors['email'][0].'</p>' : ''; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">
					Wachtwoord
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="password" name="password" placeholder="Wachtwoord" value="">
					<?php echo (@$errors['password']) ? '<p class="text-danger">'.$errors['password'][0].'</p>' : ''; ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">
					Herhaal wachtwoord
				</label>
				<div class="col-sm-2">
					<input class="form-control" type="password" name="password_confirmed" placeholder="Wachtwoord bevestigen" value="">
					<?php echo (@$errors['password_confirmed']) ? '<p class="text-danger">'.$errors['password_confirmed'][0].'</p>' : ''; ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					<button type="submit" class="btn btn-primary">Verstuur</button>
				</div>
			</div>

		</form>
	</section>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
