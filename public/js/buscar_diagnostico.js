jQuery(document).ready(function($) {

    // Set the Options for "Bloodhound" suggestion engine
    var engine = new Bloodhound({
        remote: {
            url: '/find?q=%QUERY%',
            wildcard: '%QUERY%',
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('dinicial'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });


    $('#dinicial').typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    }, {
        source: engine.ttAdapter(),

        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'diagnosticList',
        limit: 10,
        displayKey: function (data) {
            return data.nombre;
        },

        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">No se hallaron coincidencias.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<label class="list-group-item">' + data.nombre + '</label>'
              }
        },
    });



    // Set the Options for "Bloodhound" suggestion engine
    var engine2 = new Bloodhound({
        remote: {
            url: '/find?q=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('difinal'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $("#difinal").typeahead({
        hint: true,
        highlight: true,
        minLength: 3
    }, {
        source: engine2.ttAdapter(),

        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'diagnosticList',
        limit: 10,
        value: function (data) {
            return data.id;
        },
        displayKey: function (data) {
            return data.nombre;
        },

        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">No se hallaron coincidencias.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                return '<label class="list-group-item">' + data.nombre + '</label>'
      }
        }
    });
});
