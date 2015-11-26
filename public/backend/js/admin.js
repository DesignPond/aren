$( function() {

    $('.redactor').redactor({
        minHeight  : 250,
        maxHeight: 450,
        focus: true,
        lang: 'fr',
        plugins: ['advanced','imagemanager','filemanager'],
        fileUpload : 'uploadFileRedactor?_token=' + $('meta[name="_token"]').attr('content'),
        imageUpload: 'uploadRedactor?_token=' + $('meta[name="_token"]').attr('content'),
        imageManagerJson: 'imageJson',
        fileManagerJson: 'fileJson',
        buttons    : ['html','|','formatting','bold','italic','|','unorderedlist','orderedlist','outdent','indent','|','image','file','link','alignment']
    });

    $('.redactorSimple').redactor({
        minHeight: 140,
        maxHeight: 200,
        focus    : true,
        lang: 'fr',
        buttons  : ['formatting','bold','italic','link','|','unorderedlist']
    });

    $.fn.datepicker.dates['fr'] = {
        days: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
        daysShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
        daysMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
        months: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
        monthsShort: ['Jan','Fév','Mar','Avr','Mai','Jun','Jul','Aoû','Sep','Oct','Nov','Déc'],
        today: "Aujourd'hui",
        clear: "Clear"
    };

    $('.datePicker').datepicker({
        format: 'yyyy-mm-dd',
        language: 'fr'
    });

    $('body').on('click','.deleteAction',function(event){

        var $this  = $(this);
        var action = $this.data('action');
        var answer = confirm('Voulez-vous vraiment supprimer : '+ action +' ?');

        if (answer){
            return true;
        }
        return false;
    });

    // The url to the application
    var base_url = location.protocol + "//" + location.host+"/";

    var params = {
        // Callback fired on rotation start.
        start: function(event, ui) {
        },
        // Callback fired during rotation.
        rotate: function(event, ui) {
        },
        // Callback fired on rotation end.
        stop: function(event, ui) {
        },
        // Set the rotation center at (25%, 75%).
        rotationCenterX: 15.0,
        rotationCenterY: 85.0
    };
    $('.target').rotatable(params);

});