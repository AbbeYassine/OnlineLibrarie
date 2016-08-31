changed = false;

function resetForm(e) {

    e.find('form').each(function () {
        $(this)[0].reset();
    });

    e.find('input').each(function () {
        $(this).removeClass('wrong');
        $(this).parent().children('input').removeClass('wrong');
    });

    e.find('select').each(function () {
        $(this).removeClass('wrong');
        $(this).parent().children('input').removeClass('wrong');
    });

    e.find('textarea').each(function () {
        $(this).removeClass('wrong');
        $(this).parent().children('input').removeClass('wrong');
    });

    e.find('.titre').children().each(function () {
        if ($(this).attr('id') != 'titre1') {
            $(this).remove();
            console.log($(this))
        }
    });

    e.find('.titre-item').children().each(function () {
        if ($(this).attr('id') != 'item1') {
            $(this).remove();
            console.log($(this))
        }
    });

    e.find('.auteurs').find('.auteur-form').each(function () {
        if ($(this).parent().attr('id') != 'auteur1') {
            $(this).remove();
            console.log($(this))
        }
    });

}


function addItem(e) {

    var parent = $(e).parent().parent().children('.titre-item');

    var item = parent.find('#item1').clone();
    item.find('.item-form').attr('action', 'add');
    item.attr('id', 'item' + (parent.children().length + 1));
    item.find('.item_comp').remove();
    var delete_btn = item.find('.delete-item');
    delete_btn.remove();
    item.find('.item-form').append(itemToAdd());
    item.find('.item-form').append(delete_btn);
    item.find('#label').val('');
    item.find('#valeur').val('');
    item.appendTo(parent);

    // initialize select
    item.find('select').material_select('destroy');

    // initialize select
    item.find('select').material_select();

    return item;

}

function addFile(e) {

    var parent = $(e).parent().parent().children('.files');

    var item = parent.find('#file1').clone();
    item.find('.file-form').attr('action', 'add');
    item.attr('id', 'file' + (parent.children().length + 1));
    item.find('#file').val('');
    item.find('#file-name').val('');
    item.appendTo(parent);

    return item;

}

function deleteFile(e, del) {

    var parent = $(e).parent().parent().parent();
    if (del) {
        $.get(parent.find('.file-form').attr('action').replace('edit', 'delete'));
    }
    if (parent.attr("id") == 'file1') {
        parent.find('.file-form')[0].reset();
    } else {
        parent.remove();
    }
}

function deleteItem(e, del) {
    var parent = $(e).parent().parent().parent();
    if (del) {
        $.get(parent.find('.item-form').attr('action').replace('edit', 'delete'));
    }
    if (parent.attr("id") == 'item1') {
        parent.find('#label').val('');
        parent.find('#valeur').val('');
    } else {
        parent.remove();
    }

}

function deleteTitre(e, del) {
    var parent = $(e).parent().parent().parent();

    if (parent.attr("id") == 'titre1') {
        parent.find('#nom').val('');
        parent.find('#ponderation').val('');
        parent.find('.titre-item').children().each(function () {

            if (del) {
                $.get($(this).find('.item-form').attr('action').replace('edit', 'delete'));
            }

            if ($(this).attr('id') == 'item1') {
                $(this).find('#label').val('');
                $(this).find('#valeur').val('');
            } else {
                $(this).remove();
            }
        });
    } else {
        parent.remove();
    }

}

function deleteAuteur(e, del) {

    var parent = $(e).parent().parent().parent();

    if (del) {
        $.get(parent.find('.auteur-form').attr('action').replace('edit', 'delete'));
    }

    if (parent.attr('id') != 'auteur1') {
        parent.remove();
    } else {
        parent.find('form')[0].reset();

        // initialize select
        parent.find('select').material_select();
    }

}

function addAuteur(e) {
    var parent = $(e).parent().parent();

    var auteur = parent.find('#auteur1').clone();

    auteur.attr('id', 'auteur' + (parent.children().length - 1));

    auteur.find('.auteur-form').attr('action', 'add');

    var id_enseignant = auteur.find('#id_Enseignant');

    auteur.find('.select-wrapper').remove();

    auteur.find('.banque_auteur').append(id_enseignant);

    var add_auteur = parent.find('.add-auteur');

    add_auteur.remove();

    auteur.appendTo(parent);

    add_auteur.appendTo(parent);

    // initialize select
    parent.find('select').material_select();

    return auteur;

}

function addTitre(e) {

    var parent = $(e).parent().parent().children('.titre');

    var item = parent.find('#titre1').clone();
    item.attr('id', 'titre' + (parent.children().length + 1));
    item.find('#nom').val('');
    item.find('#ponderation').val('');
    item.find('.titre-item').children().each(function () {
        if ($(this).attr('id') != 'item1') {
            $(this).remove();
        } else {

            $(this).find('.item_comp').remove();
            var delete_btn = $(this).find('.delete-item');
            delete_btn.remove();
            $(this).find('.item-form').append(itemToAdd());
            $(this).find('.item-form').append(delete_btn);
            $(this).find('#label').val('');
            $(this).find('#valeur').val('');

        }
    });

    item.appendTo(parent);

    // initialize select
    item.find('select').material_select('destroy');

    // initialize select
    item.find('select').material_select();

    return item;

}

function notEmptyInputs(e) {
    var valid = true;

    e.find('input').not('#id_TitreGItem, #file-name, #file').each(function () {
        if ($(this).closest('.container').length != 0) {
            if ($(this).val() == null || $(this).val().length == 0) {
                valid = false;
                $(this).addClass('wrong');
                console.log($(this));
            } else {
                $(this).removeClass('wrong');
            }
        }
    });


    e.find('textarea').each(function () {
        if ($(this).closest('.container').length != 0) {
            if ($(this).val() == null || $(this).val().length == 0) {
                valid = false;
                $(this).addClass('wrong');
                console.log($(this).attr('id'));
            } else {
                $(this).removeClass('wrong');
            }
        }
    });

    e.find('select').each(function () {
        if ($(this).closest('.container').length != 0) {
            if ($(this).val() == null || $(this).val().length == 0) {
                valid = false;
                $(this).addClass('wrong');
                $(this).parent().children('input').addClass('wrong');
                console.log($(this).attr('id'));
            } else {
                $(this).removeClass('wrong');
                $(this).parent().children('input').removeClass('wrong');
            }
        }
    });


    return valid;

}

function banqueAddSuccess(resp) {
    hide(progress);

    addBanqueCard.find('.titre-form').each(function () {
        var titre = $(this);
        titre.ajaxSubmit(function (resultat) {
            titre.parent().find('.item-form').each(function () {
                $(this).find('#id_TitreGItem').val(resultat['id_TitreGItem']);
                $(this).ajaxSubmit({url: '/banque/' + resp['id_Banque'] + '/item/add'});
            });
        });
    });

    addBanqueCard.find('.auteur-form').each(function () {
        var auteur = $(this);
        auteur.ajaxSubmit({url: '/banque/' + resp['id_Banque'] + '/auteur/add'});
        console.log($(this));
    });

    addBanqueCard.find('.file-form').each(function () {
        var file = $(this);
        file.ajaxSubmit({url: '/banque/' + resp['id_Banque'] + '/file/add'});
    });

    hide(header_title);
    hide(failed);
    show(passed);

    changed = true;
}

function banqueEditSuccess(resp) {

    hide(progress);

    editBanqueCard.find('.titre-form').each(function () {
        var titre = $(this);
        titre.ajaxSubmit(function (resultat) {
            titre.parent().find('.item-form').each(function () {
                if ($(this).attr('action') == 'add') {
                    $(this).ajaxSubmit({url: '/banque/' + resp[0]['id_Banque'] + '/item/add'});
                } else {
                    $(this).ajaxSubmit();
                }
            });
        });
    });

    editBanqueCard.find('.auteur-form').each(function () {
        var auteur = $(this);
        if (auteur.attr('action') == 'add') {
            auteur.ajaxSubmit({url: '/banque/' + resp[0]['id_Banque'] + '/auteur/add'});
        } else {
            auteur.ajaxSubmit();
        }
    });

    editBanqueCard.find('.file-form').each(function () {
        if ($(this).attr('action') == 'add') {
            $(this).ajaxSubmit({url: '/banque/' + resp[0]['id_Banque'] + '/file/add'});
        } else {
            $(this).ajaxSubmit();
        }
    });

    hide(header_title);
    hide(failed);
    show(passed);

    changed = true;

}

function banqueAddFail(resp) {
    hide(progress);

    hide(header_title);
    show(failed);
    hide(passed);
}

function show(item) {
    item.removeClass('hide');
    item.addClass('show');
}

function hide(item) {
    item.removeClass('show');
    item.addClass('hide');
}

$(function () {
    var nano = $('.nano');
    var addBanqueBtn = $('#addBanqueBtn');
    addBanqueCard = $('#addBanqueCard');
    editBanqueCard = $('#editBanqueCard');
    var filterGhost = $('.filter-ghost');
    var add_itemBtn = $('.add-item');
    var titreItem = $('.titre-item');
    var items = $('.items');
    var add_titreBtn = $('.add-titre');
    var banqueItem = $('.banque-item');
    header_title = $('.header-title');
    failed = $('.failed');
    passed = $('.passed');
    progress = $('.progress');

    // show insert popup when button click
    addBanqueBtn.on('click', function (event) {


        if (!addBanqueCard.hasClass('show') && !editBanqueCard.hasClass('show')) {
            show(addBanqueCard);
            // display ghost shaddow
            filterGhost.removeClass('close');
            filterGhost.addClass('open');

            // initialize nano scroller
            nano.nanoScroller();

            addBanqueBtn.find('.material-icons').html('settings_backup_restore');

            window.scrollTo(0, 0);

            $('body').addClass('stop-scrolling');

        } else {

            hide(addBanqueCard);
            hide(editBanqueCard);
            // display ghost shaddow
            filterGhost.removeClass('open');
            filterGhost.addClass('close');

            hide(failed);
            hide(passed);
            show(header_title);

            resetForm(addBanqueCard);
            resetForm(editBanqueCard);
            addBanqueBtn.find('.material-icons').html('add');

            $('body').removeClass('stop-scrolling');

            if (changed) {
                location.reload();
            }


        }
    });

    // show edit popup
    banqueItem.on('click', function (event) {

        var banqueId = $(this).next().val();

        console.log(banqueId);

        $.ajax({
            url: '/banque/' + parseInt(banqueId),
            success: function (data) {
                // filling forms

                editBanqueCard.find('.banque-form').attr('action', '/banque/' + banqueId + '/edit');

                editBanqueCard.find('#id_Contexte').val(data['id_Contexte']);

                editBanqueCard.find('#id_Contexte').material_select();

                editBanqueCard.find('#id_Systeme').val(data['id_Systeme']);

                editBanqueCard.find('#id_Systeme').material_select();

                editBanqueCard.find('#id_Domaine').val(data['id_Domaine']);

                editBanqueCard.find('#id_Domaine').material_select();

                editBanqueCard.find('#id_Critere').val(data['id_Critere']);

                editBanqueCard.find('#id_Critere').material_select();

                editBanqueCard.find('#label').first().val(data['label']);

                editBanqueCard.find('#situation_Clinique').val(data['situation_Clinique']);

                editBanqueCard.find('#situation_Clinique').trigger('autoresize');

                editBanqueCard.find('#instruction_Etudiant').val(data['instruction_Etudiant']);

                editBanqueCard.find('#instruction_Etudiant').trigger('autoresize');

                editBanqueCard.find('#instruction_MedObservateur').val(data['instruction_MedObservateur']);

                editBanqueCard.find('#instruction_MedObservateur').trigger('autoresize');

                editBanqueCard.find('#scenarios_Patient').val(data['scenarios_Patient']);

                editBanqueCard.find('#scenarios_Patient').trigger('autoresize');

                var titre1 = editBanqueCard.find('#titre1');

                if (data['items'].length > 0) {

                    titre1.find('#nom').val(data['items'][0]['nom']);

                    titre1.find('#ponderation').val(data['items'][0]['ponderation']);

                    titre1.find('#item1').find('#label').val(data['items'][0]['label']);

                    titre1.find('#item1').find('#valeur').val(data['items'][0]['valeur']);

                    titre1.find('#item1').find('#id_Competence').val(data['items'][0]['id_Competence']);

                    titre1.find('#item1').find('#id_TitreGItem').val(data['items'][0]['id_TitreGItem']);

                    titre1.find('#item1').find('#id_Competence').material_select();

                    titre1.find('#item1').find('.item-form').attr('action', '/banque/' + data['id_Banque'] + '/item/' + data['items'][0]['id_Item'] + '/edit');

                    titre1.find('.titre-form').attr('action', '/titre/' + data['items'][0]['id_TitreGItem'] + '/edit');


                    for (var i = 1; i < data['items'].length; i++) {

                        var item;

                        if (data['items'][i - 1]['id_TitreGItem'] != data['items'][i]['id_TitreGItem']) {
                            titre1 = addTitre(editBanqueCard.find('.add-titre'));

                            titre1.find('#nom').val(data['items'][i]['nom']);

                            titre1.find('#ponderation').val(data['items'][i]['ponderation']);

                            item = titre1.find('#item1');

                        } else {
                            item = addItem(titre1.find('.add-item')[0]);
                        }

                        item.find('#label').val(data['items'][i]['label']);

                        item.find('#valeur').val(data['items'][i]['valeur']);

                        item.find('#id_Competence').val(data['items'][i]['id_Competence']);

                        item.find('#id_TitreGItem').val(data['items'][i]['id_TitreGItem']);

                        item.find('#id_Competence').material_select();

                        item.find('.item-form').attr('action', '/banque/' + data['id_Banque'] + '/item/' + data['items'][i]['id_Item'] + '/edit');

                    }
                }

                var auteur = editBanqueCard.find('#auteur1');

                if (data['auteurs'].length > 0) {

                    auteur.find('#id_Enseignant').val(data['auteurs'][0]['id_Enseignant']);

                    auteur.find('#id_Enseignant').material_select();

                    auteur.find('.auteur-form').attr('action', '/banque/' + data['id_Banque'] + '/auteur/' + data['auteurs'][0]['id_Banque_Enseignant'] + '/edit');


                    for (var i = 1; i < data['auteurs'].length; i++) {

                        var item = auteur.parent().find('.add-auteur').children()[0];

                        auteur = addAuteur(item);

                        auteur.find('#id_Enseignant').val(data['auteurs'][i]['id_Enseignant']);

                        auteur.find('#id_Enseignant').material_select();

                        auteur.find('.auteur-form').attr('action', '/banque/' + data['id_Banque'] + '/auteur/' + data['auteurs'][i]['id_Banque_Enseignant'] + '/edit');

                    }
                }


                var file = editBanqueCard.find('#file1');

                if (data['files'].length > 0) {

                    file.find('#file-name').val(data['files'][0]['chemin']);

                    file.find('.file-form').attr('action', '/banque/' + data['id_Banque'] + '/file/' + data['files'][0]['id_File'] + '/edit');

                    for (var i = 1; i < data['files'].length; i++) {

                        var item = file.parent().parent().find('.add-file');

                        console.log(item);

                        file = addFile(item);

                        file.find('#file-name').val(data['files'][i]['chemin']);

                        file.find('.file-form').attr('action', '/banque/' + data['id_Banque'] + '/file/' + data['files'][i]['id_File'] + '/edit');

                    }
                }

                window.scrollTo(0, 0);

                $('body').addClass('stop-scrolling');

                show(editBanqueCard);
                // display ghost shaddow
                filterGhost.removeClass('close');
                filterGhost.addClass('open');

                // initialize nano scroller
                nano.nanoScroller();

            },
            dataType: 'json'
        });

        addBanqueBtn.find('.material-icons').html('settings_backup_restore');

    });


   

    // submit banque
    $('.banque-submit-add').on('click', function (event) {

        // verify inputs not empty
        if (notEmptyInputs(addBanqueCard)) {
            show(progress);
            addBanqueCard.find('.banque-form').ajaxSubmit({
                dataType: 'json',
                success: banqueAddSuccess,
                error: banqueAddFail
            });

            //$('.titre-form').ajaxSubmit();

        }
    });

    $('.banque-reset-add').on('click', function (event) {
        resetForm(addBanqueCard);
    });

    // edit banque
    $('.banque-submit-edit').on('click', function (event) {

        // verify inputs not empty
        if (notEmptyInputs(editBanqueCard)) {
            show(progress);
            editBanqueCard.find('.banque-form').ajaxSubmit({
                dataType: 'json',
                success: banqueEditSuccess,
                error: banqueAddFail
            });

        }
    });

    $('.banque-reset-edit').on('click', function (event) {
        resetForm(editBanqueCard);
    });

});

function itemToAdd() {

    var item_copetence = "<div class='input-field col m1 item_comp'><select id='id_Competence' name='id_Competence'>";

    for (var i = 0; i < competences.length; i++) {
        var select_opt = "<option value="
            + competences[i].id_Competence +
            ">"
            + competences[i].prefix +
            "</option> ";
        item_copetence += select_opt;
    }

    item_copetence += "</select></div>"

    return item_copetence;

}
