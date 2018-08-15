jQuery( document ).ready( function( $ ) {
  MicroModal.init();

  $('.modal-launch').on('click', function(){
    var subject = $(this).data('subject');
    $('#modal-contact').find('input[name=your-subject]').val(subject);
  })
});
