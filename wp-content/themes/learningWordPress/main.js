// alert("Hello World");

// // document.getElementById('thisID');
// jQuery('#thisID');

// document.getElementByClass('thisClass');
// jQuery('.thisClass');

// var classes = document.getElementByClass('thisClass');
// for( i=1; classes.length < i; i++){
// 	classes[i].addStyle('display:block');
// }
jQuery(document).ready(function(){ 
	jQuery('#showSimilar').on( "click", function(){
		jQuery(".similar-container").addClass("show-all");
	}); 

	jQuery('#castButton').on( "click", function(){
		jQuery(".cast-info-panel").addClass("show-all");
	}); 

	jQuery('#otherShows').on( "click", function(){
		jQuery(".similar-container").addClass("show-all");
	}); 

	jQuery('#photos').on( "click", function(){
		jQuery(".photo-container").addClass("show-all");
	}); 

	jQuery('#showReviews').on( "click", function(){
		jQuery(".rate-info-panel").addClass("show-all");
	});

	jQuery('#tonightMore').on( "click", function(){
		jQuery(".tonight-container").addClass("show-all");
	});

	jQuery('#popularMore').on( "click", function(){
		jQuery(".popular-container").addClass("show-all");
	});

	jQuery('#myPopup').on( "click", function(){
		jQuery(".myPopup").show();
	});

	jQuery('#test').on( "click", function(){
		var num = jQuery(this).data('num');
		num++;
		jQuery(this).data('num', num);
		alert(num); 
	});
});