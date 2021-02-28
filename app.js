var com;
(function (com) {
    var zimhq;
    (function (zimhq) {
        var addressForm;
        (function (addressForm) {
            function run(options) {
                $('#address').addressForm({
                    url: 'http://address-form.zimhq.com',
                    price: $('#address')
                });
            }
            addressForm.run = run;
        })(addressForm = zimhq.addressForm || (zimhq.addressForm = {}));
    })(zimhq = com.zimhq || (com.zimhq = {}));
})(com || (com = {}));
$.fn.addressForm = function (options) {
    $(this).each(function (i, e) {
        $(e).change(function () {
            var address = $(this).val();
            $.get(options.url + '/api.php', { address: address }, function (data) {
                console.log(data);
                $('#city').val(data.city);
                $('#country').val(data.country);
                $('#house-number').val(data.house_number);
                $('#postcode').val(data.postcode);
                $('#road').val(data.road);
                $('#state').val(data.state);
                $('#state-code').val(data.state_code);
                $('#town').val(data.town);
            });
        });
    });
};
