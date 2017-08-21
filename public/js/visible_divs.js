$( document ).ready(function() {
    $("#modal_somatometry").hide();
    $("#modal_habitus").hide();

    $("#btnsomatometry").click(function(event){
     $("#modal_somatometry").show("slow");
     $("#modal_habitus").hide("slow");
    });

    $("#btnhabitus").click(function(event){
      $("#modal_habitus").show("slow");
      $("#modal_somatometry").hide("slow");
    });
});
