function setPaddingHeight(element) {
  var windowHeight = window.innerHeight;
  var navHeight = jQuery('.header').outerHeight(true);
  var setHeight = windowHeight - navHeight;
  var theElement = document.querySelector(element);
  theElement.style.paddingBottom = setHeight + "px";
}

function setHeight(element) {
  var windowHeight = window.innerHeight;
  var navHeight = jQuery('.header').outerHeight(true);
  var setHeight = windowHeight - navHeight;
  var theElement = document.querySelector(element);
  theElement.style.minHeight = setHeight + "px";
}

function setMaxHeight(element) {
  var windowHeight = window.innerHeight;
  var navHeight = jQuery('.header').outerHeight(true);
  var setHeight = windowHeight - navHeight - 120;
  var theElement = document.querySelector(element);
  theElement.style.maxHeight = setHeight + "px";
}

function paraScroll(element, percentage) {
  var thisElement = document.querySelector(element);
  var topOf = thisElement.offsetTop;
  var windowScroll = window.pageYOffset;
  var scrollAmount = topOf - windowScroll;
  var scrollPosition = Math.floor(percentage * scrollAmount);
  thisElement.style.backgroundPosition = "center " + scrollPosition + "px";
}

function scrollFadeOut(element) {
  var thisElement = document.querySelector(element);
  var windowScroll = window.pageYOffset;
  var topOf = thisElement.offsetTop;
  var percentageScrolled = (windowScroll/topOf);
  var reversePercentage = 1 - percentageScrolled;
  thisElement.style.opacity = reversePercentage;
}

function scrollFadeIn(element) {
  var thisElement = document.querySelector(element);
  var windowScroll = window.pageYOffset;
  var topOf = thisElement.offsetTop;
  var percentageScrolled = (windowScroll/topOf);
  var reversePercentage = percentageScrolled;
  thisElement.style.opacity = reversePercentage;
}

function portfolioDetailToggle() {
  var portfolio = document.getElementsByClassName('portfolio')[0];
  var portfolioItems = portfolio.getElementsByClassName('item');
  var listView = portfolio.getElementsByClassName('list-view')[0];
  var detailView = portfolio.getElementsByClassName('detail-view')[0];
  for ( var index = 0; index < portfolioItems.length; ++index ) {
    portfolioItems[index].onclick = function() {
      var portfolioImage = this.getElementsByTagName('img')[0].src;
      if ( listView.classList.contains('open') ) {
        detailView.style.backgroundImage = "url('"+portfolioImage+"')";
      } else {
        listView.classList.add('open');
        detailView.classList.add('open'); 
        detailView.style.backgroundImage = "url('"+portfolioImage+"')";
      }
    }
  } // end foreach
}

function headerAdjustment() {
  var navHeight = jQuery('.header').outerHeight(true);
  var mainElement = document.querySelector('.main');
  mainElement.style.paddingTop = navHeight + "px";
}

function setHeaderFixedLocation() {
  var thisElement = document.querySelector('.header');
  window.scrollToFixedAmount = thisElement.offsetTop;
}

function scrollToFixed(element) {
  var thisElement = document.querySelector(element);
  var topOf = thisElement.offsetTop;
  var windowScroll = window.pageYOffset;
  var scrollAbsolute = window.scrollToFixedAmount;
  if ( windowScroll >= scrollAbsolute ) {
    thisElement.classList.add('scroll-fixed');
  } else {
    thisElement.classList.remove('scroll-fixed');
  }
}

function portfolioView() {
  var portfolio = document.getElementsByClassName('portfolio')[0];
  var inView = portfolio.querySelector('.image img');
  if (!window.inViewID) { window.inViewID = parseInt(inView.getAttribute('current')); }
  var prevView = portfolio.getElementsByClassName('view-nav-left')[0];
  var nextView = portfolio.getElementsByClassName('view-nav-right')[0];
  var images = portfolio.querySelector('.images');
  var portfolioImage = images.getElementsByTagName('img');
  inView.src = portfolioImage[0].src;
  prevView.onclick = function() {
    var switchTo = window.inViewID - 1;
    if ( switchTo < 0 ) { switchTo = portfolioImage.length - 1 }
    inView.src = portfolioImage[switchTo].src;
    window.inViewID = switchTo;
  }
  nextView.onclick = function() {
    var switchTo = window.inViewID + 1;
    if ( switchTo > (portfolioImage.length - 1) ) { switchTo = 0 }
    inView.src = portfolioImage[switchTo].src;
    window.inViewID = switchTo;
  }
}

function portfolioPopup() {
  var $portfolioImage = jQuery(".portfolio .item img");
  var $popup = jQuery(".popup-view");
  $portfolioImage.click(function() {
    $this = jQuery(this);
    var imageSource = $this.attr("src");
    var screenWidth = jQuery(window).width();
    if ( screenWidth > 768 ) {
      $popup.find("img").attr("src", imageSource);
      $popup.fadeIn("slow", function() {
        $popup.click(function() {
          $popup.fadeOut("slow");
        });
      });
    }
  });
}

function menuToggle() {
  var menu = document.getElementsByClassName('navigation')[0];
  var menuButton = menu.getElementsByClassName('menu-button')[0];
  var menuItems = menu.getElementsByClassName('nav')[0];
  menuButton.onclick = function() {
    if ( menuItems.classList.contains("open") ) {
      menuItems.classList.remove("open"); 
    } else {
      menuItems.classList.add("open");
      menu
    }
  }
}

/*
 * AJAX Email Class
 *
**/
function Email(formElement) {
  this.formElement = formElement;
  console.log(formElement);
  this.init();
}
Email.prototype.init = function() {
  var thisObj = this;
  this.processor = this.formElement.action;
  console.log(this.processor);
  this.formElement.onsubmit = function(e) {
    e.preventDefault();
    var submitButton = thisObj.formElement.getElementsByClassName("kosaya-submit")[0];
    submitButton.disabled = true;
    thisObj.sendEmail();
  }
}
Email.prototype.sendEmail = function() {
  var thisObj = this;
  var postData = jQuery(this.formElement).serialize();
  console.log(postData);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", this.processor, true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState != 4 || xhr.status != 200) { return; }
    var data = JSON.parse(xhr.responseText);
    console.log(data);
    thisObj.respond(data);
  }
  xhr.send(postData);
}
Email.prototype.respond = function(data) {
  var success = data.success;
  if ( success == true ) {
    var response = "<p class='success'>" + data.message + "</p>";
    this.formElement.innerHTML = response;
  } else {
    var response = document.createElement("p");
    response.classList.add("failure");
    response.innerHTML = data.message;
    this.formElement.appendChild(response);
  }
}

function emailForms() {
  var forms = document.querySelectorAll(".kosaya-contact");
  var index;
  var thisForm = [];
  for ( index = 0; index < forms.length; ++index ) {
    thisForm[index] = new Email( forms[index] );
  }
}

// Run the page
(function ($) {
  setPaddingHeight('.intro');
  //setHeight('.portfolio');
  //setMaxHeight('.portfolio img');
  paraScroll('.intro', 0.5);
  //portfolioView();
  menuToggle();
  emailForms();
  portfolioPopup();
  
  window.onload = function() {
    setHeaderFixedLocation();
    headerAdjustment();
    jQuery('#masonry').masonry({
      columnWidth: '.grid-sizer',
      itemSelector: '.item',
      gutter: ".gutter-sizer"
    });
  }
  
  window.onresize = function () {
    var screensize = jQuery(window).width();
    if ( screensize > 768 ) {
      setHeaderFixedLocation();
      setPaddingHeight('.intro');
      //setHeight('.portfolio');
      //setMaxHeight('.portfolio img');
      headerAdjustment();
    }
  }
  
  window.onscroll = function () {
    var screensize = jQuery(window).width();
    if ( screensize > 768 ) {
      paraScroll('.intro', 0.5);
      scrollFadeOut('.logotype');
      //scrollFadeIn('.portfolio');
      scrollToFixed('.header');
    }
  }
  
  $(function() {
    $('a[href*=#]:not([href=#])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top - 40
          }, 400);
          return false;
        }
      }
    });
  });
  
})(jQuery);