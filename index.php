<html>
<head>

	<!-- Jquery... -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<title>Get the Images!</title>
	<script type="text/javascript" charset="utf-8" async defer>

		var images = <?php echo file_get_contents( 'images.json' ); ?>;

		jQuery( document ).ready( function( $ ) {

			// Handle the request to email the schedule to the presenters over ajax
			$( '.start' ).click( function( e ) {

				e.preventDefault();

				$.each( images, function( e, data ) {
					console.log( data.ID );
					console.log( data.photo );
					$.ajax({
						type: 'POST',
						dataType: 'json',
						url: 'demo.php',
						data: {
							'action' : 'get_image',
							'ID' : data.ID,
							'photo' : data.photo
						},
						success: function( results ) {
							console.log( results );
							if ( results.success ) {
								$('.results').append( '<div class="results">' + results.success + '</div>');
							} else if ( results.failed ) {
								$('.results').append( '<div class="results">' + results.failed + '</div>');
							}

						},
						error: function( jqHXR, textStatus, errorThrown ) {
							console.log( 'ERROR' );
							console.log( textStatus );
							console.log( errorThrown );
						}
					});
				});
			});
		});

	</script>
</head>
<body>
	<div class="container">
		<button class="start" type="submit">Start...</button>
	</div>

	<div class="results"></div>

</body>
<html>