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

});


