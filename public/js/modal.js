
//ophalen actie uit formulier
    var feedString = $('#feedForm').attr("action");

//gegevens doorgeven aan popup(modal) voor aanpassen.
    $(".open-newsFeedUpdateModal").click(function () {

        var feedId = $(this).attr('id');
        $('#feedId').val(feedId);

        var feedContent = $('#' + feedId + '-content').data("field-content");
        $('#feedContent').val(feedContent);

        $('#feedForm').attr("action", function () {
            return feedString + feedId + "/update"
        });

    });

//gegevens doorgeven aan popup(modal) voor verwijderen.
    $(".open-newsFeedDeleteModal").click(function () {

        var feedId = $(this).attr('id');

        $('#feedDeleteId').val(feedId);


        $('#feedDeleteForm').attr("action", function () {
            return feedString + feedId + "/destroy"
        });

    });

    var actionString = $('#inviteDeleteForm').attr("action");

//gegevens doorgeven aan popup(modal) voor verwijderen uitnodiging.
    $(".open-inviteDeleteModal").click(function () {

        var inviteId = $(this).attr('id');


        $('#inviteDeleteId').val(inviteId);


        $('#inviteDeleteForm').attr("action", function () {
            return actionString + inviteId + "/destroy"
        });

    });


    //configuratie ja/nee slider uitnodiging
    $("#inviteCheck").bootstrapToggle({


        onstyle: 'danger',
        offstyle: 'success',
        on: 'Nee',
        off: 'Ja',
        size: 'normal'


    });


//uitlezen afbeelding url voor weergave preview (aanmaken).
    function readURL(input) {

        console.log(document.getElementById('preview').getAttribute('src'));

        document.getElementById('preview').setAttribute('src', '');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                document.getElementById('preview').setAttribute('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);

        }
    }


//uitlezen afbeelding url voor weergave preview (aanpassen).
    function readUpdateURL(input) {

        console.log(document.getElementById('previewUpdate').getAttribute('src'));

        document.getElementById('previewUpdate').setAttribute('src', '');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                document.getElementById('previewUpdate').setAttribute('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);

        }
    }

    //verwijderen afbeelding evenement
    $("#confirmDelete").click(function () {

        $("#deleted").val('true');

        document.getElementById('previewUpdate').setAttribute('src', '');

    });

