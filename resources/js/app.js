require('./bootstrap');
import $ from 'jquery';


$(document).ready(function() {
    // bind delete buttons to the delete modal window
    const deleteButtons = $('.delete-button');
    const deleteForm = $('#deleteForm');
    deleteButtons.on('click', function(){
        deleteForm.attr('action', $(this).data('route'));
    });


    // dropdown to select many categories
    const selectTrigger = $('#selectTrigger');
    let emptyText = selectTrigger.text();
    selectTrigger.on('click', function(){
        $(this).next().slideToggle();
    });

    const categoryItems = $('.categoryItem');
    categoryItems.on('click', function(){
        changeSelectTriggerText(this);
    });
    categoryItems.each(function(){
        changeSelectTriggerText(this);
    });

    function changeSelectTriggerText(context){
        if($(context).is(':checked')) {
            if (selectTrigger.text().includes(emptyText)) {
                selectTrigger.text('');
            }
            selectTrigger.text(selectTrigger.text() + ", " + $(context).next().text());
        } else {
            if (selectTrigger.text().indexOf($(context).next().text()) !== 0) {
                selectTrigger.text(selectTrigger.text().replace(", " + $(context).next().text(), ''));
            } else {
                selectTrigger.text(selectTrigger.text().replace($(context).next().text(), ''));
            }
        }
        if (selectTrigger.text()[0] === ',') { // if added item is first, we should remove preceding comma
            selectTrigger.text(selectTrigger.text().slice(2));
        }
        if(selectTrigger.text() === '') {
            selectTrigger.text(emptyText);
        }
    }

    $('#correctSolutionButton').click(function () {
        $('#correctSolution').slideToggle();
    });

    $('#lastSolutionButton').click(function () {
        $('#lastSolution').slideToggle();
    });

    $('.profile-photo-container').click(function() {
        $('.upload-photo-modal').css('display', 'block');
    })

    $('.close-modal').click(function () {
        $('.upload-photo-modal').css('display', 'none');
    })

    $(document).on('keydown', function(event) {
        if (event.key == "Escape") {
            $('.upload-photo-modal').css('display', 'none');
        }
    });

    $('#profile-photo-input').on('change', function (e) {
        let input = e.target;
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-profile-photo')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    });

    let initialType = $('input[name=type]:checked', '#types');
    if(initialType.val() !== 'select') {
        addSelectQueryInputs();
    }


    $('#types input').on('change', function() {
        let selectedType = $('input[name=type]:checked', '#types');
        if (selectedType.val() !== 'select') {
            if($('#mysql_select').length === 0) {
                addSelectQueryInputs();
            }
        } else {
            $('#mysql_select').remove();
            $('#postgre_select').remove();
            $('#mssql_select').remove();
        }
    });

    function addSelectQueryInputs() {
        $('#mysql').after(`<div class="form-group" id="mysql_select">
                <label for="mysql_select">MySQL Select</label>
                <textarea name="mysql_select" id="mysql_select" class="form-control"
                          required rows="5">${oldSelectValues.mysql}</textarea>
                </div>`);
        $('#postgre').after(`<div class="form-group" id="postgre_select">
                <label for="postgre_select">Postgre Sql Select</label>
                <textarea name="postgre_select" id="postgre_select" class="form-control"
                          required rows="5">${oldSelectValues.postgre}</textarea>
                </div>`);

        $('#mssql').after(`<div class="form-group" id="mssql_select">
                <label for="mssql_select">Sql Server Select</label>
                <textarea name="mssql_select" id="mssql_select" class="form-control"
                          required rows="5">${oldSelectValues.mssql}</textarea>
                </div>`);
    }

});


