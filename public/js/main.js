$(document).ready( function () {
    amountFormat();
    $('#myTable').DataTable({
        responsive: true
    });
});

let modalcount = 0;

$('.modal').on('shown.bs.modal', function() {
    if (modalcount==0){
        table = $('.table-detail').DataTable({
            responsive: true
        })
    }
    modalcount++;
    table.columns.adjust().responsive.recalc();
 });

$('.btn').on('click', function(e) {
    if ($(this).hasClass('disable')) {
        e.preventDefault();
    }
});

function amountFormat(){
    
    let amount;
    const element = $(".amount");
    
    for(i=0; i<element.length; i++){
    
        let a = element[i].innerHTML / 12;
        
        if(Number.isInteger(a) == false){
            let b = a - Math.floor(a);
            let c = Math.round(b * 12);
            amount = Math.floor(a) + " dz " + c + " ps";
        }else{
            amount = a + " dz";
        }
    
        element[i].innerHTML = amount;
    }
}

$(function() {

  'use strict';

  $('.js-menu-toggle').click(function(e) {

  	var $this = $(this);

  	

  	if ( $('body').hasClass('show-sidebar') ) {
  		$('body').removeClass('show-sidebar');
  		$this.removeClass('active');
  	} else {
  		$('body').addClass('show-sidebar');	
  		$this.addClass('active');
  	}

  	e.preventDefault();

  });

  // click outisde offcanvas
	$(document).mouseup(function(e) {
    var container = $(".sidebar");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      if ( $('body').hasClass('show-sidebar') ) {
				$('body').removeClass('show-sidebar');
				$('body').find('.js-menu-toggle').removeClass('active');
			}
    }
	}); 

});