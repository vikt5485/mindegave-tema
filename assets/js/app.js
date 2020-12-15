import $ from "jquery";

(function ($) {
  $(document).ready(function () {
    let currentURL = window.location;
    if(currentURL.hostname != "localhost") {
      console.log = function () {};
    }

    // Loaded when DOM is ready
    console.log("Running jQuery"); 

    let steps = $(".step").toArray().length;
    let currentStep = 1;

    $(".explainer").click(toggleVideoPlayState);
    $(".square-video .play-btn").click(toggleVideoPlayState);

    $("form").submit(function(e) {
      e.preventDefault();
    });

    createCollection();
    searchCollection();
    makeDonation();
    burgerMenu();
    videoPopup();  
    createStatistics();
    givMindegave();

    function toggleVideoPlayState() {
      if(document.querySelector(".explainer").paused) {
        document.querySelector(".explainer").play();
        $(".square-video .play-btn").css("display", "none");
      } else {
        document.querySelector(".explainer").pause();
        $(".square-video .play-btn").css("display", "block");
      }
    }

    function videoPopup() {
      $(".video-placeholder").click(toggleVideoPopup);
      $(".video-popup").click(toggleVideoPopup);
      $(".video-popup iframe").click(function(e) {
        e.stopPropagation();
      });
    }

    function toggleVideoPopup() {
      $(".video-popup").toggleClass("popup-open");
      $("body").toggleClass("body-popup-open");
    }

    function toggleDonatePopup() {
      $(".donate-popup").toggleClass("popup-open");
      $("body").toggleClass("body-popup-open");
    }

    function givMindegave() {
      $("#with-greeting").click({ type: "with" }, showMindegaveForm);
      $("#without-greeting").click({ type: "without" }, showMindegaveForm);

      let data = '';
      let loading = false;
      $("body").removeClass("form-loading");
      
      let validatorWith = $("[data-create-mindegave-with]").validate({
        messages: {
          mindegave_name: 'Angiv venligst navnet på afdøde.',
          mindegave_greeting: 'Skriv venligst en hilsen.',
          mindegave_from: 'Angiv venligst hvem gaven er fra.',
          mindegave_first_name: 'Angiv venligst dit fornavn.',
          mindegave_last_name: 'Angiv venligst dit efternavn.',
          mindegave_email: 'Angiv venligst din e-mail.',
          mindegave_phone: 'Angiv venligst dit telefonnr.',
          mindegave_address: 'Angiv venligst din adresse.',
          mindegave_zip: 'Angiv venligst dit postnr.',
          mindegave_city: 'Angiv venligst din by.',
          mindegave_donation: 'Skriv venligst hvor meget du vil donere.',
          mindegave_name_dead: 'Angiv venligst navnet på afdøde.',
          mindegave_name_relative: 'Angiv venligst navnet på nærmeste pårørende.',
          mindegave_relative_address: 'Angiv venligst adressen på nærmeste pårørende',
          mindegave_relative_zip: 'Angiv venligst postnr. på nærmeste pårørende',
          mindegave_relative_city: 'Angiv venligst by på nærmeste pårørende',
          mindegave_consent: 'Accepter venligst vilkår og betingelser samt privatlivspolitik.'
        },
        errorPlacement: function(error, element) {
          error.appendTo(".error-container");
        },
        submitHandler: function(form) {
          data = $(form).serialize();

          $("#giv-mindegave-form-with .step-3").removeClass("step-active");
          $("#giv-mindegave-form-with .step-3").addClass("remove-step"); 
          $("#giv-mindegave-form-with .prev").attr("disabled", "true");  
 
          do_ajax(data, loading, function(res) {
            console.log(res);
            if(res.status == "success") {
              //Handle success
              $(".collection-header").remove();
              $(".collection-text").remove();
              $("#giv-mindegave-form-without").remove();
              $("#giv-mindegave-form-with").remove();
              $(".button-container").remove();
              $(".thank-you-step").removeClass("remove-step");
              $(".thank-you-step").addClass("step-active");
            } else if(res.status == "error") {
              //Handle error
              console.log("Error. Try again.");
            }
          })
        }
      })

      let validatorWithout = $("[data-create-mindegave-without]").validate({
        messages: {
          mindegave_first_name: 'Angiv venligst dit fornavn.',
          mindegave_last_name: 'Angiv venligst dit efternavn.',
          mindegave_email: 'Angiv venligst din e-mail.',
          mindegave_phone: 'Angiv venligst dit telefonnr.',
          mindegave_address: 'Angiv venligst din adresse.',
          mindegave_zip: 'Angiv venligst dit postnr.',
          mindegave_city: 'Angiv venligst din by.',
          mindegave_donation: 'Skriv venligst hvor meget du vil donere.',
          mindegave_name_dead: 'Angiv venligst navnet på afdøde.',
          mindegave_name_relative: 'Angiv venligst navnet på nærmeste pårørende.',
          mindegave_relative_address: 'Angiv venligst adressen på nærmeste pårørende',
          mindegave_relative_zip: 'Angiv venligst postnr. på nærmeste pårørende',
          mindegave_relative_city: 'Angiv venligst by på nærmeste pårørende',
          mindegave_consent: 'Accepter venligst vilkår og betingelser samt privatlivspolitik.'
        },
        errorPlacement: function(error, element) {
          error.appendTo(".error-container");
        },
        submitHandler: function(form) {
          data = $(form).serialize();

          $("#giv-mindegave-form-without .step-2").removeClass("step-active");
          $("#giv-mindegave-form-without .step-2").addClass("remove-step");
          $("#giv-mindegave-form-without .prev").attr("disabled", "true");
 
          do_ajax(data, loading, function(res) {
            console.log(res);
            if(res.status == "success") {
              //Handle success
              $(".collection-header").remove();
              $(".collection-text").remove();
              $("#giv-mindegave-form-without").remove();
              $("#giv-mindegave-form-with").remove();
              $(".button-container").remove();
              $(".thank-you-step").removeClass("remove-step");
              $(".thank-you-step").addClass("step-active");
            } else if(res.status == "error") {
              console.log("Error. Try again.");
            }
          })
        }
      })
    }

    function isScrolledIntoView(elem) {
      var docViewTop = $(window).scrollTop();
      var docViewBottom = docViewTop + $(window).height();

      var elemTop = $(elem).offset().top;
      var elemBottom = elemTop + $(elem).height();

      return ((elemTop <= docViewBottom) && (elemBottom >= docViewTop));
    }
  
    function createStatistics() {
      let inView = false;
      if($('.statistics-container').length != 0) {
        $(window).scroll(function() {
          if (isScrolledIntoView('.statistics-container')) {
              if (inView) { return; }
              inView = true;
  
              $( ".stat-data" ).each(function( index ) {
                var ctx = $('#myChart-' + index);
                let chartData = $(this).data();
                console.log(chartData);
        
                var options = {
                  legend: false,
                  tooltips: false,
                  aspectRatio: 1,
                  hover: false,
                  layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 10,
                        bottom: 10
                    }
                  },
                  animation: {
                    duration: 1500,
                    easing: "easeInOutQuad"
                  }
                };
        
                var myDoughnutChart = new Chart(ctx, {
                  type: 'doughnut',
                  data: {
                    datasets:[{
                      data: [chartData.percentage, 100 - chartData.percentage],
                      backgroundColor: [chartData.color, chartData.secondcolor],
                      borderWidth: 0 
                    }],
                    labels: [chartData.label],
                    backgroundColor: '#f00',
                  },
                  options: options
                });
              });
              
          } else {
              inView = false;  
          }
        });
      }
    }

    function showMindegaveForm(e) {
      $(".intro-card").addClass("hide-step");
      console.log(e.data.type);

      if(e.data.type == "with") {
        steps = $(".mindegave-with-container .step").toArray().length;
      } else if(e.data.type == "without") {
        steps = $(".mindegave-without-container .step").toArray().length;
      }

      $(".intro-card").one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
          $(this).css('display', 'none');
          $(".mindegave-" + e.data.type + "-container").css("display", "block");
          $(".mindegave-" + e.data.type + "-container").addClass("show-step");

          $(".mindegave-" + e.data.type + "-container form .next").click({ direction: "next", selector: '.mindegave-' + e.data.type + '-container form' }, changeFormSlide);
          $(".mindegave-" + e.data.type + "-container form .prev").click({ direction: "prev", selector: '.mindegave-' + e.data.type + '-container form'  }, changeFormSlide);
          $(".card-option").click({ direction: "next", selector: '.mindegave-' + e.data.type + '-container form' }, changeFormSlide);
          $(".card-option").click(getSelectedImage);

          $("#giv-mindegave-form-with input").on("input", function() {
            $(".flip-card").css("display", "block");
          })

          $("#giv-mindegave-form-with textarea").on("input", function() {
            $(".flip-card").css("display", "block");
          })

          $(".flip-card").click(function() {
            $(".flip-card-toggle").toggleClass("flip-card-inactive flip-card-active");

            if($(".card-preview").hasClass("flip-card-active")) {
              $(".flip-card p").text("Ret kort");
              $(".ret-kort-btn").css("display", "block");
              $(".se-kort-btn").css("display", "none");
            } else {
              $(".flip-card p").text("Se kort");
              $(".se-kort-btn").css("display", "block");
              $(".ret-kort-btn").css("display", "none");
            }

            $(".name-preview").text($("#mindegave_name").val());
            $(".greeting-preview").text($("#mindegave_greeting").val());
            $(".from-preview").text($("#mindegave_from").val());
            if(!$("#mindegave_hide_donation").is(":checked")) {
              $(".donation-preview").text("kr. " + $("#mindegave_donation").val() + ",-");
              $(".colledted-text").text("indsamlet til Kræftens Bekæmpelse.");
            } else {
              $(".donation-preview").text("");
              $(".colledted-text").text("Har med denne mindegave støttet Kræftens Bekæmpelse.");
            }
          })



      });
    }

    function getSelectedImage(e) {
      let imageID = parseInt(e.target.getAttribute("data-image-id"));

      console.log(imageID);

      $.ajax({
        url: site_vars.ajax_url,
        type: "POST",
        data: {
          action: 'get_selected_image',
          image_id: imageID
        },
        dataType: 'json',
        beforeSend:function() {
         console.log("getting selected image");
        },
        success:function(data, textStatus, jqXHR){
           console.log("success");
           console.log(data);
           $(".selected-image").attr('src',data.image_url);
        },
        error: function(jqXHR, textStatus, errorThrown){
            //if fails     
        }
      });
    }

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
      $(".ins-goal-preview").text("kr. " + formatNumber($("#ins_goal").val()) + ",-");

      updateBarWidth();
    }

    function formatNumber(number) {
      return number.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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
      let selector = e.data.selector;
      console.log(currentStep);
 
      $(selector + " .step-" + currentStep).addClass("hide-step");
      $(selector + " .step-" + currentStep).one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
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

        $(selector + " .step-" + currentStep).removeClass("remove-step");
        $(selector + " .step-" + currentStep).addClass("show-step");

        $(selector + " .step-" + currentStep).one("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function(){
          $(this).removeClass("show-step");
          $(this).addClass("step-active");
        });

        if (currentStep == 1) {
          $(selector + " .prev").addClass("hide-btn");
        } else if(currentStep == 4) {
          $(".preview-name").text($("#ins_name").val());
          $(".preview-desc").text($("#ins_desc").val());
        } else {
          $(selector + " .prev").removeClass("hide-btn");
          $(selector + " .next").removeClass("hide-btn");
          $(selector + " .submit-btn").addClass("remove-btn");
        }

        if(currentStep == steps) {
          $(selector + " .next").addClass("hide-btn");
          $(selector + " .submit-btn").removeClass("remove-btn");
        } else {
          $(selector + " .next").removeClass("hide-btn");
          $(selector + " .submit-btn").addClass("remove-btn");
        }

        $(".dots .dot-1").removeClass("dot-filled");
        $(".dots .dot-2").removeClass("dot-filled");
        $(".dots .dot-3").removeClass("dot-filled");
        $(".dots .dot-4").removeClass("dot-filled");
        $(".dots .dot-5").removeClass("dot-filled");

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
      $("#opret-mindeindsamling-form .next").click({ direction: "next", selector: "#opret-mindeindsamling-form" }, changeFormSlide);
      $("#opret-mindeindsamling-form .prev").click({ direction: "prev", selector: "#opret-mindeindsamling-form" }, changeFormSlide);
      $("#ins_goal").keyup(updateGoalPreview);
      $("#ins_own_donation").keyup(updateOwnDonationPreview);
      $("#ins_end_date").change(updateEndDate);
      $("#ins_images").change(function() {
        readURL(this);
      });

      let data = '';
      let loading = false;
      $("body").removeClass("form-loading");

      let validator = $("[data-create-collection]").validate({
        messages: {
          ins_title: 'Giv venligst indsamlingen et navn (step 1).',
          ins_name: 'Angiv venligst hvem indsamlingen er til minde om (step 1).',
          ins_desc: 'Skriv venligst et par linjer om, hvorfor du samler ind til Kræftens Bekæmpelse (step 1).',
          ins_goal: 'Sæt venligst et mål for indsamlingen i kr (step 2).',
          ins_end_date: 'Sæt venligst en slutdato for indsamlingen (step 2).',
          ins_images: 'Upload venligst et billede til indsamlingen (step 3).',
          personal_first_name: 'Skriv venligst dit fornavn (step 5).',
          personal_last_name: 'Skriv venligst dit efternavn (step 5).',
          personal_email: 'Skriv venligst din e-mail (step 5).',
          personal_phone: 'Skriv venligst dit telefonnr. (step 5).',
          personal_address: 'Skriv venligst din adresse (step 5).',
          personal_zip: 'Skriv venligst dit postnr. (step 5).',
          personal_city: 'Skriv venligst din by (step 5).',
          personal_consent: 'Accepter venligst vilkår og betingelser samt privatlivspolitik (step 5).'
        },
        errorPlacement: function(error, element) {
          error.appendTo(".error-container");
        },
        submitHandler: function(form) {
          data = $(form).serialize();
          console.log(data);
          var uploadData = new FormData(form);
          $("#opret-mindeindsamling-form .step-5").removeClass("step-active");
          $("#opret-mindeindsamling-form .step-5").addClass("remove-step");
          $("#opret-mindeindsamling-form .prev").attr("disabled", "true");

          if($("#ins_images").val()) {
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
          } else {
            data = data + "&img_id=249";
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
          }
          
        }
      })

    }

    function makeDonation() {
      $(".donate-btn").click(toggleDonatePopup);
      $(".donate-popup").click(toggleDonatePopup);
      $(".donate-content").click(function(e) {
        e.stopPropagation();
      });

      $("#donation_range").on("input", function() {
        $(".donation_preview").text("kr. " + formatNumber($("#donation_range").val()) + ",-");
        $("#custom_donation").val("");
      });

      $("#custom_donation").on("input", function() {
        $(".donation_preview").text("kr. " + formatNumber($("#custom_donation").val()) + ",-");
        $("#donation_range").val(50);
      });

      $("[name=donation_type]").on("input", function() {
        if($("#personal_donation").is(":checked")) {
          console.log("personlig");
          $("[for='donation_name']").css("display", "block");
          $("[for='donation_message']").css("display", "block");
        } else if($("#anonymous_donation").is(":checked")) {
          console.log("anonym");
          $("[for='donation_name']").css("display", "none");
          $("[for='donation_message']").css("display", "none");
        }
      })

      
      let data = '';
      let loading = false;
      $("body").removeClass("form-loading");

      let validator = $("[data-make-donation]").validate({
        messages: {
          donation_name: "Skriv venligst dit navn.",
          donation_message: "Skriv venligst en besked til donation."
        },
        submitHandler: function(form) {
          data = $(form).serialize();
          console.log(data);
          $(".donation-form-main").addClass("remove-step");

          do_ajax(data, loading, function(res) {
            console.log(res);
            if(res.status == "success") {
              //Handle success
              $("#make-donation-form .form-thank-you").removeClass("remove-step");

            } else if(res.status == "error") {
              //Handle error
            }
          })
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
      console.log("UPLOAD DATA:");
      console.log(uploadData);

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

    //BURGER MENU
    function burgerMenu() {
      $(".burger").click(function() {
        $("#masthead").toggleClass("menu-active");
      })

      $(".burger-menu-overlay").click(function() {
        $("#masthead").toggleClass("menu-active");
      })
    }
  });
})(jQuery);
