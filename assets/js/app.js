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

    createCollection();
    searchCollection();

    let currentStep = 1;
    $("#opret-mindeindsamling-form .next").click({ direction: "next" }, changeFormSlide);
    $("#opret-mindeindsamling-form .prev").click({ direction: "prev" }, changeFormSlide);

    $("#with-greeting").click({ type: "with" }, showMindegaveForm);
    $("#without-greeting").click({ type: "without" }, showMindegaveForm);

    $("#ins_goal").keyup(updateGoalPreview);
    $("#ins_own_donation").keyup(updateOwnDonationPreview);
    $("#ins_end_date").change(updateEndDate);
    $("#ins_images").change(function() {
      readURL(this);
    });

    $("form").submit(function(e) {
      e.preventDefault();
    })


    function showMindegaveForm(e) {
      $(".intro-card").addClass("hide-step");

      $(".intro-card").one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
          $(this).css('display', 'none');
          $("#giv-mindegave-form-" + e.data.type).css("display", "block");
          $("#giv-mindegave-form-" + e.data.type).addClass("show-step");
      });
    }


    const steps = $(".step").toArray().length;

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('.ins-images-preview').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
  
    function updateEndDate() {
      $(".end-date-preview").text("Slutter d. " + formatDate($("#ins_end_date").val()));
    }

    function updateGoalPreview() {
      $(".ins-goal-preview").text("kr. " + $("#ins_goal").val().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ",-");

      updateBarWidth();
    }

    function updateOwnDonationPreview() {
      $(".own-donation-preview").text("kr. " + $("#ins_own_donation").val().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ",-" );

      updateBarWidth();
    }

    function updateBarWidth() {
      let barWidth = ($("#ins_own_donation").val() / $("#ins_goal").val()) * 100;
      $(".donation-progress").css("width", barWidth + "%");
    }

    function changeFormSlide(e) {
      let direction = e.data.direction;
      console.log(currentStep);
 
      $("#opret-mindeindsamling-form .step-" + currentStep).addClass("hide-step");
      $("#opret-mindeindsamling-form .step-" + currentStep).one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
        $(this).removeClass("step-active");
        $(this).removeClass("hide-step");          
        $(this).removeClass("show-step");          
        $(this).addClass("remove-step");

        if (direction == "next") {
          console.log("next");
          currentStep++;
        } else {
          console.log("prev");
          currentStep--;
        }

        $("#opret-mindeindsamling-form .step-" + currentStep).removeClass("remove-step");
        $("#opret-mindeindsamling-form .step-" + currentStep).addClass("show-step");

        $("#opret-mindeindsamling-form .step-" + currentStep).one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
          $(this).removeClass("show-step");
          $(this).addClass("step-active");
        });

        if (currentStep == 1) {
          $("#opret-mindeindsamling-form .prev").addClass("hide-btn");
        } else if(currentStep == 4) {
          $(".preview-title").text($("#ins_title").val());
          $(".preview-name").text("Til minde om " + $("#ins_name").val());
          $(".preview-desc").text($("#ins_desc").val());
        } else {
          $("#opret-mindeindsamling-form .prev").removeClass("hide-btn");
          $("#opret-mindeindsamling-form .next").removeClass("hide-btn");
          $("#opret-mindeindsamling-form .submit-btn").addClass("remove-btn");
        }

        if(currentStep == steps) {
          $("#opret-mindeindsamling-form .next").addClass("hide-btn");
          $("#opret-mindeindsamling-form .submit-btn").removeClass("remove-btn");
        }

        $(".dots .dot-1").removeClass("dot-filled");
        $(".dots .dot-2").removeClass("dot-filled");
        $(".dots .dot-3").removeClass("dot-filled");
        $(".dots .dot-4").removeClass("dot-filled");

        let dotStep = currentStep;
        while (dotStep > 0) {
          $(".dots .dot-" + dotStep).addClass("dot-filled");
          dotStep--;
        }

        console.log(currentStep);
      });
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

    function searchCollection() {
      let data = '';
      let loading = false;
      $("body").removeClass("form-loading");

      let validator = $("[data-search-collection]").validate({
        messages: {
          search_input: 'Skriv venligst et søgeord'
        },
        // errorPlacement: function(error, element) {
        //   error.appendTo(".error-container");
        // },
        submitHandler: function(form) {
          data = $(form).serialize();
          console.log(data);
          do_ajax(data, loading, function(res) {
            if(res.status == "success") {
              //Handle success
              $(".collections-wrapper").html("");
              $(".collections-wrapper").html(res.html);

              
            } else if(res.status == "error") {
              //Handle error

            }
          })
        }
      })
    }

    function createCollection() {
      let data = '';
      let loading = false;
      $("body").removeClass("form-loading");

      let validator = $("[data-create-collection]").validate({
        messages: {
          ins_title: 'Giv venligst indsamlingen et navn (step 1).',
          ins_name: 'Angiv venligst hvem indsamlingen er til minde om (step 1).',
          ins_desc: 'Skriv venligst et par linjer om, hvorfor du samler ind til Kræftens Bekæmpelse (step 1).',
          ins_goal: 'Sæt venligst et mål for indsamlingen i kr (step 2).',
          ins_end_date: 'Sæt venligst en slutdato for indsamlingen (step 2).'
        },
        errorPlacement: function(error, element) {
          error.appendTo(".error-container");
        },
        submitHandler: function(form) {
          data = $(form).serialize();
          var uploadData = new FormData(form);
          $("#opret-mindeindsamling-form .step-4").removeClass("step-active");
          $("#opret-mindeindsamling-form .step-4").addClass("remove-step");
          
          uploadImage(uploadData, function(res) {
            console.log(res);
            data = data + "&img_id=" + res;
            console.log(data);
            do_ajax(data, loading, function(res) {
              console.log(res);
              if(res.status == "success") {
                //Handle success
                $(".collection-header").remove();
                $(".collection-text").remove();
                $(".button-container").remove();
                $(".dots").remove();
                $(".collection-link").attr("href", res.permalink);
                $(".thank-you-step").removeClass("remove-step");
                $(".thank-you-step").addClass("step-active");
              } else if(res.status == "error") {
                //Handle error
              }
            })
          });
        }
      })

    }

    function do_ajax(data, loading, cb) {
      if(!loading) {
        $.ajax({
          url: site_vars.ajax_url,
          method: 'POST',
          dataType: 'json',
          data: data,
          beforeSend: function() {
            loading = true;
            $("body").addClass("form-loading");
            $("#opret-mindeindsamling-form [type=submit]").attr("disabled", "true");

            console.log("beforeSend");
          },
          success: function(res) {
            loading = false;
            $("body").removeClass("form-loading");
            cb(res);
          },
          error: function(err) {
            loading = false;
            $("body").removeClass("form-loading");
            console.log(err);
          }
        })
      }
    }

    function uploadImage(uploadData, cb) {
      $.ajax({
        url : site_vars.process_upload_url,
        type: "POST",
        data : uploadData,
        processData: false,
        contentType: false,
        beforeSend:function() {
          $("body").addClass("form-loading");
          $("#opret-mindeindsamling-form [type=submit]").attr("disabled", "true");
        },
        success:function(data, textStatus, jqXHR){
           console.log("upload success");
           cb(data);
        },
        error: function(jqXHR, textStatus, errorThrown){
            //if fails     
        }
    });
    }
  });
})(jQuery);
