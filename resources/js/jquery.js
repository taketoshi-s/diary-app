$(function() {
    $('#extension').on('input', function(e) {
        let value = $(e.currentTarget).val();
        value = value
            .replace(/[０-９]/g, function(s) {
                return String.fromCharCode(s.charCodeAt(0) - 65248);
            })
            .replace(/[^0-9]/g, '');
      	$(e.currentTarget).val(value);
    });
});





