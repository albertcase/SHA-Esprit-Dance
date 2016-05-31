require.config({
    baseUrl:'../js/lib',
    paths:{
        "a":"../model/a",
        "b":"../model/b",
        "c":"../model/c"
    }
});

require(['jquery'], function( ) {
    console.log( $ ) // UNDEFINED!
});

require(['b','c'],function(b,c){
    b.hello();
    c.hello();
});