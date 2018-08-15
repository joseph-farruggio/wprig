/* Place this on a template where a customer initially is identified
or after authentication. (Important: Update these values) */

document.addEventListener( 'wpcf7submit', function( event ) {
  var inputs = event.detail.inputs;

  for ( var i = 0; i < inputs.length; i++ ) {
    if ( 'your-name' == inputs[i].name ) {
      woopra.identify({
        name: inputs[i].value,
      });
      console.log('Name', inputs[i].value) 
    }
    if ( 'your-email' == inputs[i].name ) {
      woopra.identify({
        email: inputs[i].value,
      });
      console.log('Email', inputs[i].value)
      break;
    }
    
    // The identify code should be added before the "track()" function
  }
  woopra.track();
  console.log('Form submitted!');
}, false );


/* Below is an example of a custom "payment" event that is sent when 
    you process a payment for a customer. */

// woopra.track("payment", {
//   amount: "49.95",
//   currency: "USD"
// });