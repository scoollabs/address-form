class Address {
  static getComponents(address, success, error) {
    var data = { address: address };
    Address.get('api.php', data, success, error);
  }
  static get(url, data, success, error) {
    $.ajax({
      url: url,
      type: 'GET',
      data: data,
      success: function (data, textStatus, jqXHR) {
        success(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        error(jqXHR);
      }
    });
  }
  static post(url, data, success, error) {
    $.ajax({
      url: url,
      type: 'POST',
      data: data,
      success: function (data, textStatus, jqXHR) {
        success(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        error(jqXHR);
      }
    });
  }
}