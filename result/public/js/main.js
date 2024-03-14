
$(document).ready(function () {

    $('.next').click(function () {
        var nextTab = $(this).closest('.tab-pane').next('.tab-pane');
        var link = $(this).closest('.tab-pane').attr('aria-labelledby');
        var link_active = nextTab.attr('aria-labelledby');
        $('#' + link).removeClass('active');
        $('#' + link_active).addClass('active');
        $(this).closest('.tab-pane').removeClass('show active');
        nextTab.addClass('show active');
    });
    $('.prev').click(function () {
        var prevTab = $(this).closest('.tab-pane').prev('.tab-pane');
        var link = $(this).closest('.tab-pane').attr('aria-labelledby');
        var link_active = prevTab.attr('aria-labelledby');
        $('#' + link).removeClass('active');
        $('#' + link_active).addClass('active');
        $(this).closest('.tab-pane').removeClass('show active');
        prevTab.addClass('show active');
    });

    $('.submit').click(function () {
        var result_meal = $('.result_meal').text();
        var result_people = $('.result_people').text();
        var restaurant = $('.result_restaurant').text();
        $.ajax({
            url: '/result',
            type: 'GET',
            data: {},
            success: function (response) {
                console.log('Result:\nMeal: ' + result_meal + '\nNo. of. People: ' + result_people +
                    '\nRestaurant: ' + restaurant + '\nDishes:\n');
                $.each(response, function (dishes, qty) {
                    console.log(dishes + ' - ' + qty);
                });
            },
            error: function (response) {

            }
        });

    });
    $('#meal').change(function () {
        var text_meal = $("#meal option:selected").text();
        $('.result_meal').text(text_meal);
        var meal = $(this).val();
        if ($(this).val() !== '') {
            $('.next-tab1').prop('disabled', false);
        } else {
            $('.next-tab1').prop('disabled', true);
        }
        $.ajax({
            url: '/get-restaurants',
            type: 'GET',
            data: { meal: meal },
            success: function (response) {
                $('#restaurants').empty();
                $('#restaurants').append('<option value="">Select a restaurant</option>');
                $.each(response, function (index, restaurant) {
                    $('#restaurants').append('<option value="' + restaurant + '">' + restaurant + '</option>');
                });
            },
            error: function (response) {

            }
        });
    });
    $('#people').change(function () {
        $('.result_people').text($(this).val());
        $('#servings').attr({ "min": $(this).val() });
        $('#servings').val($(this).val());
    });
    $('#restaurants').change(function () {
        $('.pre-order').empty();
        $('.result_restaurant').text($(this).val());
        var meal = $('#meal').val();
        var restaurant = $(this).val();
        $('.next-tab3').prop('disabled', true);
        if ($(this).val() !== '') {
            $('.next-tab2').prop('disabled', false);
        } else {
            $('.next-tab2').prop('disabled', true);
        }
        $.ajax({
            url: '/get-dishes',
            type: 'GET',
            data: { meal: meal, restaurant: restaurant },
            success: function (response) {
                $('#dishes').empty();
                $('#dishes').append('<option value="">Select a dishes</option>');
                $.each(response, function (index, dishes) {
                    $('#dishes').append('<option value="' + dishes + '">' + dishes + '</option>');
                });
            },
            error: function (response) {

            }
        });
    });

});
function addDishes() {
    var dishes = $('#dishes').val();
    var qty = $('#servings').val();
    if (dishes !== '') {
        $('.next-tab3').prop('disabled', false);
        $.ajax({
            url: '/add-dishes',
            type: 'GET',
            data: { dishes: dishes, qty: qty },
            success: function (response) {
                $('.pre-order').empty();
                $.each(response, function (dishes, qty) {
                    $('.pre-order').append('<p>' + dishes + ' - <span>' + qty + '</span></p>');
                });
                console.log(response);
            },
            error: function (response) {

            }
        });
    } else {
        $('.error_dish').text('Please select a Dish').css('color', 'red');
        setTimeout(function () {
            $('.error_dish').text('');
        }, 3000);

    }

}