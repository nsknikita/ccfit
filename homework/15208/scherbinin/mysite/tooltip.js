jQuery(document).ready(function ($) {
  function l_tooltip(target_items, name) {
    $(target_items).each(function (i) {šššššššš
      $("body").append("<div class='" + name + "' id='" + name + i + "'><p>" + $(this).attr('title') + "</p></div>");šššššššš
      var tooltip = $("#" + name + i);šššššššš
      if ($(this).attr("title") != "" && $(this).attr("title") != "undefined") {šššššššš
        $(this).removeAttr("title").mouseover(function () {šššššššššššššššš
          tooltip.css({
            opacity: 0.9,
            display: "none"
          }).fadeIn(30);šššššššš
        }).mousemove(function (kmouse) {šššššššššššššššš
          tooltip.css({
            left: kmouse.pageX + 15,
            top: kmouse.pageY + 15
          });šššššššš
        }).mouseout(function () {šššššššššššššššš
          tooltip.fadeOut(10);šššššššš
        });šššššššš
      }šššš
    });
  }
  l_tooltip(".ttp_lnk a", "tooltip");
});
