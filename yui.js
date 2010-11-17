(function() { 
    var loader = new YAHOO.util.YUILoader({ 
        base: "", 
        require: ["base","fonts","grids","reset"], 
        loadOptional: false, 
        combine: true, 
        filter: "MIN", 
        allowRollup: true, 
        onSuccess: function() { 
        } 
    }); 
loader.insert(); 
})();
