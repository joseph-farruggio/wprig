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
});