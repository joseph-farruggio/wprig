jQuery( document ).ready( function( $ ) {

  // Toggle Menu Text State
  $(".menu-toggle").on("click", function() {
    var el = $(this);
    if (el.text() == el.data("text-swap")) {
      el.text(el.data("text-original"));
    } else {
      el.data("text-original", el.text());
      el.text(el.data("text-swap"));
    }
  });

  // Reveal Mobile Submenus
  $('.menu-item-has-children ul a').on('click', function(e){
    e.stopPropagation();
  });

  $(document).on('click', '.main-navigation.toggled-on .menu-item-has-children', function(e){
    e.preventDefault();
    $('ul.menu').toggleClass('sub-menu-open');
    $(this).toggleClass('sub-menu-open');
  });

  // Add Arrow to Items with Children
  $('.menu-item-has-children > a').append(` <span>→</span>`);

  // Add Back Link to End of Submenu List
  $('.sub-menu').append(`
    <li class="menu-item close-sub-menu">
      <a href="#">← Back</a>
    </li>  
  `);

  // Close Submenu
  $('.close-sub-menu').on('click', function(e){
    e.stopPropagation();
    $('.sub-menu-open').removeClass('sub-menu-open');
  });

  // Select all links with hashes
   $( 'a[href*="#"]' )

   // Remove links that don't actually link to anything
   .not( '[href="#"]' )
   .not( '[href="#0"]' )
   .click( function( event ) {
    var target = $( this.hash );

    // On-page links
     if (
       location.pathname.replace( /^\//, '' ) == this.pathname.replace( /^\//, '' ) && location.hostname == this.hostname
     ) {

      // Figure out element to scroll to
      target = target.length ? target : $( '[name=' + this.hash.slice( 1 ) + ']' );

       // Does a scroll target exist?
       if ( target.length ) {

        // Only prevent default if animation is actually gonna happen
         event.preventDefault();
         $( 'html, body' ).animate({
           scrollTop: target.offset().top
         }, 1000, function() {

          // Callback after animation
           // Must change focus!
           var $target = $( target );
           $target.focus();
           if ( $target.is ( ':focus' ) ) { // Checking if the target was focused
             return false;
           } else {
             $target.attr( 'tabindex', '-1' ); // Adding tabindex for elements not focusable
             $target.focus(); // Set focus again
           };
         });
       }
     }
   });
});
