<?php
require_once('UKM/innslag.class.php');

if( !isset( $_POST['innslag'] ) ) {
	$AJAX_DATA = array( 'success' => false,
						'message' => 'Mangler innslags-ID'
					  );
} else {
	$innslag = new innslag( $_POST['innslag'] );
	$related = $innslag->related_items();
	
	foreach($related['tv'] as $key => $tv) {
		$tv->embed = $tv->embedcode(500);
	}
	
	$AJAX_DATA = array( 'success' => true,	
						'id' => $_POST['innslag'],
						'related' => $related['tv']
					  );
}