
    $(".js-qty-minus").click(function() {
        var e = parseInt($(this).parent().find("input.qty-text").val());
        e >= 1 && ($(this).parent().find("input.qty-text").val(e - 1), $(this).unbind("click"))})

    $(".js-qty-plus").click(function() {
        var e = parseInt($(this).parent().find("input.qty-text").val());
        e <= 999 && ($(this).parent().find("input.qty-text").val(e + 1), $(this).unbind("click"))})