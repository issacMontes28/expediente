$( document ).ready(function() {
    $("#modal_somatometry").hide();
    $("#modal_habitus").hide();

    $("#btnsomatometry").click(function(event){
     $("#modal_somatometry").show("slow");
     $("#modal_habitus").hide("slow");
     $("#modal_medicaments").hide("slow");
     $("#modal_actuals").hide("slow");
    });

    $("#btnhabitus").click(function(event){
      $("#modal_habitus").show("slow");
      $("#modal_somatometry").hide("slow");
      $("#modal_medicaments").hide("slow");
      $("#modal_actuals").hide("slow");
    });

    $("#btnmedicaments").click(function(event){
      $("#modal_medicaments").show("slow");
      $("#modal_habitus").hide("slow");
      $("#modal_somatometry").hide("slow");
      $("#modal_actuals").hide("slow");
    });

    $("#btnactuals").click(function(event){
      $("#modal_actuals").show("slow");
      $("#modal_medicaments").hide("slow");
      $("#modal_habitus").hide("slow");
      $("#modal_somatometry").hide("slow");
    });
});
