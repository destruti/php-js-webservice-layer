$( document ).ready(function() {


    $.Class("Monster",
        {
            count: 0
        },
        {
            init: function (name) {
                //save the name
                this.name = name;

                this.energy = 10;

                //increment the static count
                this.Class.count++;

                console.log(this)
            }
        }
    );

    var dragon = new Monster('dragon');

});


// Hello World
var MyClass = Class.create();
var mc = new MyClass();

// And now, a static class. Anytime the last argument passed to Class.create is boolean, it’ll serve as the static switch (defaults to false).

var MyClass = Class.create(true);
MyClass.namespace('foo');

// Add constructor and methods

var method = {
    someFunc: function(){}
}

var MyClass = Class.create({
    init: function(){
        console.log('You instantiated a Class!');
    },
    myFunc: function(){},
    myProp: 'foo'
}, method);

var foo = new MyClass();
foo.someFunc();

// Namespaces

var MyClass = Class.create(true);

//this...
MyClass.namespace('bar');

//...is the same as this
$.extend(MyClass, {
    bar: Class.create(true);
});