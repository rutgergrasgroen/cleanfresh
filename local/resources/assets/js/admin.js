/*
Exemples : 
<a href="posts/2" data-method="delete" data-token="{{csrf_token()}}"> 
- Or, request confirmation in the process -
<a href="posts/2" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
*/


$(document).ready(function(){

    var siteurl = $('meta[name="_siteurl"]').attr('content');
    var token = $('meta[name="_token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    $('ol.sortable').nestedSortable({
        forcePlaceholderSize: true,
        handle: '.handle',
        helper: 'clone',
        items: 'li',
        opacity: .6,
        placeholder: 'placeholder',
        revert: 250,
        tabSize: 35,
        tolerance: 'pointer',
        toleranceElement: '> div',
        maxLevels: 6,
        isTree: true,
        expandOnHover: 700,
        startCollapsed: true,
        update: function () {
            order = $(this).nestedSortable('toArray', {startDepthCount: 0});

            $.ajax({

                type: 'POST',
                url: siteurl +'/cfadmin/Pages/SaveOrder',
                data: {
                    'order': order
                },
                dataType: 'json',
                success: fixFolderIcons()

            });
        }

    }).disableSelection(); 

    $('.disclose').on('click', function() {
        $(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
        $(this).children().toggleClass('fa-folder-open').toggleClass('fa-folder');
    });

    $('.list-item .status').on('click', function() {

        var id = $(this).closest('li').attr("data-id");
        var item = $(this);

        $.ajax({

            type: 'POST',
            url: siteurl +'/cfadmin/Pages/SaveStatus',
            data: {
                'id': id
            },
            dataType: 'json',
            success: function(data) {

                if(data == 1) {
                    item.removeClass('btn-default').addClass('btn-info');
                } else {
                    item.removeClass('btn-info').addClass('btn-default');
                }
                
            }

        });

    });

    $('.list-item .delete').on('click', function() {

        var item = $(this).closest('li');

        bootbox.dialog({
            message: "Weet je zeker dat je deze pagina wilt verwijderen?",
            title: "Pagina verwijderen",
            buttons: {
                main: {
                    label: "Annuleren",
                    className: "btn-default"
                },
                danger: {
                    label: "Verwijderen",
                    className: "btn-danger",
                    callback: function() {

                        $.ajax({

                            type: 'POST',
                            url: siteurl +'/cfadmin/Pages/Delete',
                            data: {
                                'id': item.attr("data-id")
                            },
                            dataType: 'json',
                            success: function(data) {

                                item.remove();
                                
                            }

                        });
                    }
                }
            }
        }); 

    });

    $('.templates .holder').on('click', function() {

        var id = $(this).children('.template').attr("id");
        $('input#template').val(id);
        $('.templates .holder').removeClass('active');
        $(this).addClass('active');

    });

    $('#fileupload').fileupload({
        url: siteurl +'/cfadmin/Media/FileUpload',
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
 
});

function fixFolderIcons(){

    setTimeout(function(){

        $("ol.sortable .mjs-nestedSortable-leaf").children('div').children('.icon').removeClass('disclose').attr("disabled", true).children().removeClass('fa-folder-open').removeClass('fa-folder').addClass('fa-file-text-o');
        $("ol.sortable .mjs-nestedSortable-branch").children('div').children('.icon').addClass('disclose').removeAttr('disabled').children().removeClass('fa-file-text-o').not('.fa-folder').addClass('fa-folder-open');

    }, 500);

}
