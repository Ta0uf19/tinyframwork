$(function() {

    getJeu();

    $('select').on('change', function() {
        let filters = intFilters();
        getJeu(filters);
        //alert( this.value );
    });

    $('input[name=\'search\']').keypress(function() {
        let filters = intFilters();
        getJeu(filters);
        //alert( this.value );
    });


});

function intFilters() {
    let params = {}
    params.category = $(".select-cat option:selected").val();
    params.age = $(".select-age option:selected").val();
    params.search = $("[name='search']").val();
    return params;
}

function getJeu(params = null) {

    console.log(params);

    $.ajax({
        type: 'GET',
        url: 'api/jeux/get',
        timeout: 3000,
        data: params,
        success: function(data) {
            //alert(data);

            //console.log(data);
            let html = "";
            for(let j = 0; j<data.length; j++) {
                //console.log(data[j]);

                let images = data[j].images.split(',');

                html += `<div class="box">
                   <img src="views/assets/images/cover/${images[0]}.jpg"/>
                       <div class="titre">${ data[j].nom }</div>
                    <div class="desc">${ data[j].desc }</div>
                    <div class="info"><i class="fas fa-users"></i> De ${ data[j].player_from } à ${ data[j].player_to } joueurs </div>
                    <div class="info"><i class="fas fa-users"></i> Dès ${ data[j].age_from }  ans </div>
                    <a href="jeudetails?id=${ data[j].id }"><span class="btn">Je m\'abonne</span></a>
                </div>`;
                //html += "<div id='fl'"
            }
            $(".flexbox").html(html);

        },
        error: function() {
            alert('La requête n\'a pas abouti'); }
    });

}