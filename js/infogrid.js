/*$.fn.qtip.styles.atelier = { 
   background: '#666',
   color: '#fff',
   textAlign: 'center',
   border: {
      width: 3,
      radius: 5,
      color: '#666'
   },
   tip: true,  
   name: 'dark'
};*/
$(function() {

    // Set up variables
    var $el, $parentWrap, $otherWrap, 
        $allTitles = $("dt").css({
            padding: 5, // setting the padding here prevents a weird situation, where it would start animating at 0 padding instead of 5
            "cursor": "pointer" // make it seem clickable
        }),
        $allCells = $("dd").css({
            position: "relative",
            top: -1,
            left: 0,
            display: "none" // info cells are just kicked off the page with CSS (for accessibility)
        });
    
    // clicking image of inactive column just opens column, doesn't go to link   
    $("#page-wrap").delegate("dt a","click", function(e) { 
        
        if ( !$(this).parent().hasClass("curCol") ) {         
            //e.preventDefault(); 
            $(this).next().find('dt:first').click(); 
        } 
        
    });
    
    // clicking on titles does stuff
    $("#page-wrap").delegate("dt", "click", function() {
        
        // cache this, as always, is good form
        $el = $(this);
        
        // if this is already the active cell, don't do anything
        if (!$el.hasClass("current")) {
        
            $parentWrap = $el.parent().parent();
            $otherWraps = $(".info-col").not($parentWrap);
            
            // remove current cell from selection of all cells
            $allTitles = $("dt").not(this);
            
            // close all info cells
            $allCells.slideUp();
						
						$parentA = $parentWrap.find('a:first');

						$('dt a').remove();

						if($el.attr('class').indexOf(' ') != -1){
							$classes = $el.attr('class').split(' ');
							$('#images a.'+ $classes[1] +':first')
							.hide()
							.appendTo($el)
							.show('slow');
							/*.qtip({
							  content: 'Lancer le diaporama',
							  show: 'mouseover',
								hide: 'mouseout',
								style: { 
									name: 'atelier' // Inherit from preset style
								},
								position: {
							     corner: {
							        target: 'bottomLeft',
							        tooltip: 'topRight'
							     }
							  }
							});*/
							$parentA.css({'background-image': 'url(/wp-content/themes/atelier/images/illus/' + $classes[1] + '.jpg)'});
							$parentA.attr('href', $('#images a.'+ $classes[1] +':first').attr('href'));
							$parentA.removeClass();
							$parentA.addClass('image '+$classes[1]);
            }
						
						/*$('#contact img').hide().show().qtip({
						  content: 'Nous contacter',
						  show: 'mouseover',
							hide: 'mouseout',
							style: { 
								name: 'atelier', // Inherit from preset style
							},
							position: {
						     corner: {
						        target: 'leftMiddle',
						        tooltip: 'rightMiddle'
						     }
						  }
						});*/
						
            // return all titles (except current one) to normal size
            $allTitles.animate({
                fontSize: "14px",
                paddingTop: 5,
                paddingRight: 5,
                paddingBottom: 5,
                paddingLeft: 5
            });
            
            // animate current title to larger size            
            $el.animate({
                "font-size": "20px",
                paddingTop: 10,
                paddingRight: 5,
                paddingBottom: 5,
                paddingLeft: 10
            }).next().slideDown();
            
            // make the current column the large size
            $parentWrap.animate({
                width: 460
            }).addClass("curCol");
            
            // make other columns the small size
            $otherWraps.animate({
                width: 249
            }).removeClass("curCol");
            
            // make sure the correct column is current
            $allTitles.removeClass("current");
            $el.addClass("current");  
        
        }
        
    });
    

    $("#starter").trigger("click");
    
});
