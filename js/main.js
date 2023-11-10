$(document).ready(function () {
    // Search functionality
    $('.searchbar').on('input', function () {
        var keyword = $(this).val().toLowerCase();
        $('.apartment').each(function () {
            var name = $(this).find('.card-title small').text().toLowerCase();
            var address = $(this).find('.card-text').text().toLowerCase();
            if (name.includes(keyword) || address.includes(keyword)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Apartment type checkbox functionality
    $('input[type="checkbox"][name="apartmentTypes[]"]').on('change', function () {
        var selectedTypes = $('input[type="checkbox"][name="apartmentTypes[]"]:checked')
            .map(function() {
                return this.value;
            })
            .get();

        filterApartmentsByType(selectedTypes);
    });

    // Price range functionality with slider
    $(function () {
        var minVal = parseInt($('.min').val()) || 0;
        var maxVal = parseInt($('.max').val()) || 1000; // Set your max value

        $('.slider-range').slider({
            range: true,
            min: 0, // Set your min value
            max: 10000, // Set your max value
            values: [minVal, maxVal],
            slide: function (event, ui) {
                $('#minPrice').val(ui.values[0]);
                $('#maxPrice').val(ui.values[1]);

                $('.apartment').each(function () {
                    var price = parseInt($(this).find('.card-p').text().match(/\d+/)[0]);
                    if (price >= ui.values[0] && price <= ui.values[1]) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });

        $('#minPrice').val($('.slider-range').slider('values', 0));
        $('#maxPrice').val($('.slider-range').slider('values', 1));
    });


    // Reset button functionality
    $('.reset-btn').on('click', function () {
        $('.searchbar').val('');
        $('.min, .max').val('');
        $('.apartment').show();
    });

    // Function to filter apartments by selected apartment types
    function filterApartmentsByType(selectedTypes) {
        if (selectedTypes.length === 0) {
            $('.apartment').show();
        } else {
            $('.apartment').each(function () {
                var type = $(this).find('.card-p b').text().toLowerCase();
                if (selectedTypes.includes(type)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    }
});