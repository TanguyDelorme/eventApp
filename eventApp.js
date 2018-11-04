$(document).ready(function() {
  $('#francemap').vectorMap({
    map: 'france_fr',
    hoverOpacity: 0.5,
    hoverColor: "#EC0000",
    backgroundColor: "#ffffff",
    color: "#18bc9c",
    borderColor: "#000000",
    selectedColor: "#EC0000",
    enableZoom: true,
    showTooltip: true,
      onRegionClick: function(element, code, region)
      {
          var message = 'Région : "'
              + region
              + '" || Id : "'
              + code
        + '"';

        window.location = 'eventApp.php?region='+region+'';
        /*url = window.location.href;
        $('#event').load(url,region);*/

      }
  });
});
