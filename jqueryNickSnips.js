$(document).ready(function(){

	//adds active class to the 1st child for banner slider
	$('.carousel-inner').find('.item:first').addClass('active');

	//checks an element for a class. 
	var $classChecker = $('nav').hasClass('navbar');
  	if($classChecker == true){
  		$('.navbar-brand').css('border', '1px solid red');
  	}
  	else{
    	return false;
  	}

  //copy and paste an element  
  var $copy = $('.navbar').find('ul li:nth-child(2)').clone();
  $('body').prepend($copy);

  //add css on click with anonymous function
  $('.navbar-brand').on('click',function(){
    var $this = $(this);
    $this.css('border', '1px solid red');
  });
  
  //add css on click
  $('.navbar-brand').on('click', theClick);
  function theClick(){
    var $this = $(this);
    $this.css('border', '1px solid red');
  }
  
  //hover css
  $('.navbar-brand').hover(func1, func2);
  function func1(){
    var $this = $(this);
    $this.css('border', '1px solid red');
  }
  function func2(){
    var $this = $(this);
    $this.css('border', '1px solid blue');
  }

  //hover toggle class
  $('.navbar-brand').hover(doThis, doThis);
  function doThis(){
    var $this = $(this);
    $('.navbar-brand').toggleClass('test');
  }

  //toggle
  $('a').toggle(func1,func2);
  function func1(){
    var $this = $(this);
    $this.addClass('myClass');
  }
  function func2(){
    var $this = $(this);
    $this.removeClass('myClass');
  }

  //add css on click with multiple attributes
  $('li').on('click', function(){
    var $this = $(this);
    $this.css({border: "1px solid red", cursor: "auto" });
  });

  //add class on click to a different element
  $('.navbar-brand').on('click', function(){
    var $add = $('ul li:last');
    $add.addClass('newClass');
  });
  
  //add an html element/text to an element
  var $new = '<h1>hi</h1>';
  $('.container').html($new);

  //changes the attribute of an element
  $('.navbar-brand').attr('href','#meow');

  removeAttr('');//remove

  //prevents the use of a function in this case, button not submitting 
  $('.navbar-brand').on('click', function(e){
    e.preventDefault();
  });

  //add a style to an element
  $('.navbar-brand').css('border', '1px solid red');

  //add a class to an element
  $('.navbar-brand').addClass('newClass');


  /*basic filters*/
  :first
  :last
  :even
  :odd
  :eq(numberGoesHere)
  :gt(numberGoesHere)
  :lt(numberGoesHere)
  :not


  /*attributes class,href,ID,etc..*/
  $('p[class = className]');

  $('p[class^ = class]');//starts with

  $('p[class$ = Name]');//ends with

  $('p[class* = Name]');//contains

  $('p[class = className][id = idName]');//with multiple attribute selector


  /*content and visibility*/
  :contains(text)
  :empty
  :has()
  :parent
  :visible
  :hidden


  /*child*/
  :nth-child(numberGoesHere)
  :first-child
  :last-child
  :only-child


  /*form*/
  :input
  :text
  :password
  :radio
  :checkbox
  :submit
  :reset
  :image
  :button
  :file
  :enabled
  :disabled
  :checked
  :selected

  /*others*/
  .val('')
  .attrt('')
  .closest('')
  .find('')
  .length('')
  .before('')
  .after('')

  /*creating, setting, and getting content*/
  .html('<tag>Hi There</Tag>');
  .text('hi there');


  /*manipulating attributes*/
  .attr('target','_blank');
  .attr({src:'images/image.jpg',alt:'spring'});
  .removeAttr('href');

  /*inserting content*/
  .append('hi');
  .prepend('hi');
  $('p:last').prependTo('p:first');
  $('p:first').appendTo('p:last');
  .after('hi');
  .before('hi');
  $('<h1>Hi</h1>').insertAfter('p');
  $('<h1>Hi</h1>').insertBefore('p');

  /*wrapping, replacing, removing content*/
  $('p:first').wrap('<div style="color: red"></div>');
  $('p').wrapAll('<div style="color: red"></div>');
  $('p:first').replaceWith('<p>hello there</p>');
  $('p').replaceAll('<p>hello there</p>');
  .empty();
  .remove();
  .clone();

  /*events*/
  .click(fnc);
  .hover(fnc1,fnc2);
  .toggle(fnc1,fnc2,fnc3);

  
  /*Ajax*/
  
  /*JQuery's ajax method helpers*/
  $.ajax
  $.load
  $.get
  $.post
  $.getJSON
  $.getScript
  
  /* $.ajax post data to be processed and displayed*/
  $.ajax({
    url: "createProcess.php",
    method: "post",
    data: $('form').serialize(),
    dataType: "text",
    success: function(funcMessage){
      $('#jsMessage').html(funcMessage);
    }
  });


  /*$.load, simple example*/
  $("#load").click(function(){
    $(".update").load("demo.txt");
  });

  /*$.load, load more every click*/
  var loadCounter = 5;
  $('#load').click(function(){
    loadCounter = loadCounter + 5;
    $('table').load('loadMore.php', { loadCounterNew: loadCounter });
  });

  /*$.getJSON, gets jason file and display*/
  $.getJSON('data.json', function(data){
    
    var output = '<ul>';
    
    $.each(data, function(key, val){
      output += '<li>' + val.name + '</li>';
    });
    
    output += '</ul>';

    $('.content').html(output);
  });


  /*$.getJSON, ajax search thru jason file*/
  $.getJSON('data.json', function(data){
  
  var output = '<ul>';
  
  $.each(data, function(key, val){
    if(((val.name.search(myRegExp) != -1) || (val.bio.search(myRegExp) != -1)) && (searchValue != ""))  {/*search query regular expression*/
      output += '<li>';
      output += '<h2>' + val.name + '</h2>';
      output += '<p>' + val.bio + '</p>';
      output += '</li>';
    }
  });
  
  output += '</ul>';

  $('.update').html(output);

  











































});