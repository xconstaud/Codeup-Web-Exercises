(function(){
    "use strict";

    // TODO: Create an array of 4 people's names using literal array notation, in a variable called 'names'.

    // TODO: Create a log statement that will log the number of elements in the names array.

    // TODO: Create log statements that will print each of the names array elements individually.

    var names = ["William", "Cory", "Brandon", "Madison"];

    console.log(names.length);

    for (var i = 0; i < names.length; i++) {
    	console.log(names[i]);
    }

    names.forEach(function (element, index, array) {
    	console.log(element);
    });


})();


