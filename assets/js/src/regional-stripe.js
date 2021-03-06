/**
 * Regional Stripe
 * https://github.com/technosailor/regional-stripe
 *
 * Copyright (c) 2016 Aaron Brazell
 * Licensed under the GPL-2.0+ license.
 */

( function( window, undefined ) {
	'use strict';

	var regional = {

		// Basic Vars
		atan2 : Math.atan2,
		cos : Math.cos,
		sin : Math.sin,
		sqrt : Math.sqrt,
		pi : Math.PI,
		earthRadius : 6378137,

		// Location info for center point
		originLat : regstr.originLat,
		originLon : regstr.originLon,

		success : function( position ) {
			var origin = {
				originLat : regional.originLat,
				originLon : regional.originLon
			};

			var distance = regional.haversine( origin, position.coords );
			console.debug(position);
			if( regstr.maxRange <= regional.metersToMiles( distance ) ) {
				regional.stripeButtonHide();
			}
		},
		failure : function( error ) {
			regional.stripeButtonHide();
		},
		squared : function( number ) {
			return number * number;
		},
		toRad : function( number ) {
			return number * location.pi / 180.0;
		},
		haversine : function( origin, destination ) {
			var distanceLat = regional.toRad( origin.originLat - destination.latitude );
			var distanceLon = regional.toRad( origin.originLon - destination.longitude );
			var f = regional.squared( regional.sin( distanceLat / 2.0 ) ) + regional.cos( regional.toRad( origin.originLat ) ) * regional.squared( regional.sin( distanceLon / 2.0 ) );
			var c = 2 * regional.atan2( regional.sqrt( f ), regional.sqrt( 1 - f ) );

			return regional.earthRadius * c;
		},
		metersToMiles : function( meters ) {
			return meters * 0.000621371192;
		},
		stripeButtonHide : function() {
			var stripe_button = document.getElementsByClassName( 'stripe-container' );
			stripe_button.innerHTML = '<p><em>' + regstr.outOfRangeMsg + '</em></p>';
		}
	};

	if( navigator.geolocation ) {
		navigator.geolocation.getCurrentPosition(
			regional.success,
			regional.failure,
			{
				enableHighAccuracy: true
			}
		)
	} else {
		regional.stripeButtonHide();
	}

} )( this, $ );
