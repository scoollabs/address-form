<h3>Address Form</h3>
<p>Address<br>
  <input type="text" id="address">
</p>
<p>Components<br>
  <pre id="components">&nbsp;</pre>
</p>
<p>
  <button type="button" id="get-components">Get Address Components</button>
</p>

<style>
  #components {
    border: #ccc;
    background: #efefef;
    font-family: 'Courier New';
  }
  </style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="app.js"></script>
<script>
  $(function() {
    $('#get-components').click(function() {
      var address = $('#address').val();
      Address.getComponents(address, function(response) {
        console.log(response);
        $('#components').text(JSON.stringify(response, null, 4));
      }, function() {});
    });
  });
</script>
