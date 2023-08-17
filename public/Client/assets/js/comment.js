$(function () {

    var $range = $(".js-range-rate"),
        $inputFrom = $(".js-input-from"),
        $inputTo = 0,
        instance,
        min = 0,
        max = 5,
        from = 1,
        to = 5;

    $range.ionRangeSlider({
        type: "int",
        min: min,
        max: max,
        from: 1,
        to: 5,
        prefix: '',
        onStart: updateInputs,
        onChange: updateInputs,
        step: 1,
        prettify_enabled: false,
        prettify_separator: ".",
        values_separator: " - ",
        force_edges: true


    });

    instance = $range.data("ionRangeSlider");

    function updateInputs(data) {
        from = data.from;
        to = data.to;

        $inputFrom.prop("value", from);
        $inputTo.prop("value", to);
    }

    $inputFrom.on("input", function () {
        var val = $(this).prop("value");

        // validate
        if (val < min) {
            val = min;
        } else if (val > to) {
            val = to;
        }

        instance.update({
            from: val
        });
    });

    $inputTo.on("input", function () {
        var val = $(this).prop("value");

        // validate
        if (val < from) {
            val = from;
        } else if (val > max) {
            val = max;
        }

        instance.update({
            to: val
        });
    });

});
