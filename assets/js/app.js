import $ from "jquery";
import "what-input";

// Foundation JS relies on a global varaible. In ES6, all imports are hoisted
// to the top of the file so if we used`import` to import Foundation,
// it would execute earlier than we have assigned the global variable.
// This is why we have to use CommonJS require() here since it doesn't
// have the hoisting behavior.
//window.jQuery = $;
//require('foundation-sites');

(function ($) {
  $(document).ready(function () {
    // Loaded when DOM is ready
    console.log("Running jQuery");

    let currentStep = 1;
    $("#opret-mindeindsamling-form .next").click({ direction: "next" }, changeFormSlide);
    $("#opret-mindeindsamling-form .prev").click({ direction: "prev" }, changeFormSlide);

    $("#ins-goal").keyup(updateGoalPreview);
    $("#ins-own-donation").keyup(updateOwnDonationPreview);
    $("#ins-end-date").change(updateEndDate);

    function updateEndDate() {
      $(".end-date-preview").text("Slutter d. " + formatDate($("#ins-end-date").val()));
    }

    function updateGoalPreview() {
      $(".ins-goal-preview").text("kr. " + $("#ins-goal").val().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ",-");

      updateBarWidth();
    }

    function updateOwnDonationPreview() {
      $(".own-donation-preview").text("kr. " + $("#ins-own-donation").val().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ",-" );

      updateBarWidth();
    }

    function updateBarWidth() {
      let barWidth = ($("#ins-own-donation").val() / $("#ins-goal").val()) * 100;
      $(".donation-progress").css("width", barWidth + "%");
    }

    function changeFormSlide(e) {
      console.log(e.data.direction);
      $("#opret-mindeindsamling-form .step-1").removeClass("step-active");
      $("#opret-mindeindsamling-form .step-2").removeClass("step-active");
      $("#opret-mindeindsamling-form .step-3").removeClass("step-active");
      $("#opret-mindeindsamling-form .step-4").removeClass("step-active");

      if (e.data.direction == "next") {
        currentStep++;
      } else {
        currentStep--;
      }

      if (currentStep == 1) {
        $("#opret-mindeindsamling-form .prev").addClass("remove-btn");
      } else if(currentStep == 4) {
        $(".preview-title").text($("#ins-name").val());
        $(".preview-for-who").text("Til minde om " + $("#ins-for-who").val());
        $(".preview-why").text($("#ins-why").val());
      } else {
        $("#opret-mindeindsamling-form .prev").removeClass("remove-btn");
      }

      $("#opret-mindeindsamling-form .step-" + currentStep).addClass("step-active");

      console.log(currentStep);
    }

    function formatDate(date) {
      var d = new Date(date),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();
 
      if (month.length < 2) month = '0' + month;
      if (day.length < 2) day = '0' + day;
 
      return [day, month, year].join('/');
  }
  });
})(jQuery);
