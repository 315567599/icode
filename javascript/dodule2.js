If you need to make some of the things reachable to the outside, then you need to change this. In order to reach createMember() or getMemberDetails(), you need to return them to the outside world to make them properties of myApplication:

var myApplication = function(){
  var name = 'Chris';
  var age = '34';
  var status = 'single';
  return{
    createMember:function(){
      // [...]
    },
    getMemberDetails:function(){
      // [...]
    }
  }
}();
// myApplication.createMember() and 
// myApplication.getMemberDetails() now works.
This is called a module pattern or singleton. It was mentioned a lot by Douglas Crockford and is used very much in the Yahoo User Interface Library YUI. What ails me about this is that I need to switch syntaxes to make functions or variables available to the outside world. Furthermore, if I want to call one method from another, I have to call it preceded by the myApplication name. So instead, I prefer simply to return pointers to the elements that I want to make public. This even allows me to shorten the names for outside use:

var myApplication = function(){
  var name = 'Chris';
  var age = '34';
  var status = 'single';
  function createMember(){
    // [...]
  }
  function getMemberDetails(){
    // [...]
  }
  return{
    create:createMember,
    get:getMemberDetails
  }
}();

//myApplication.get() and myApplication.create() now work.
