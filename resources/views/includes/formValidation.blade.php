<script>
    $('document').ready(function() {
        $('.addressckb').on('click', function() {
            if ($('.addressckb').is(':checked')) {
                $('.mailing_address').prop("disabled", true);
                if ($('.address').val().length > 0) {
                    $('.mailing_address').val($('.address').val());
                }
            } else {
                $('.mailing_address').prop("disabled", false);
            }
        });

        let email = 1;
        let phone = 1;
        $('#add-btn-email').on('click', function() {
            var html = '';
            html += '<div class="form-group required emails">';
            html += '<label for="email" class="control-label">Email:</label>'
            html += '<input type="text" class="form-control" name="email[' + email + ']" required />';
            html += '<input type="button" class="btn btn-primary" id="rmv-btn-email" value="Remove"/></div>';
            $(this).closest('.emails').after(html);
            email++;
        })
        $('#add-btn-phone').on('click', function() {
            var html = '';
            html += '<div class="form-group phones">';
            html += '<label for="phone">Phone:</label>';
            html += '<input type="text" class="form-control" name="phone[' + phone + ']" />';
            html += '<input type="button" class="btn btn-primary" id="rmv-btn-phone" value="Remove"/></div>';
            $(this).closest('.phones').after(html);
            phone++;
        })
    });
    $(document).on('click', '#rmv-btn-email', function() {
        $(this).closest('.emails').remove();
    });
    $(document).on('click', '#rmv-btn-phone', function() {
        $(this).closest('.phones').remove();
    })
</script>