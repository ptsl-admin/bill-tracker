jQuery(document).ready(()=>{
    category_names = [];
    console.log(jQuery(".tab-content>div").length);

});


jQuery(".stepper-wrapper>.stepper-item > a").on('click', function(e) {
    ahref = jQuery(this);
    //ahref.parents().addClass("completed");

    // change class of all previous and next siblings
    ahref.parent().prevAll().addClass("completed");
    ahref.parent().nextAll().removeClass("completed");

    // change "active" class of all prev and next siblings
    ahref.parent().prevAll().removeClass("active");
    ahref.parent().nextAll().removeClass("active");

    ahref.parent().addClass("active");
    ahref.parent().removeClass("completed");
    
    // get the tab id
    tabId = ahref[0].hash;    

    // get tabs containers
    container = jQuery(".tab-content");

    // remove "active" class from all first child of container
    container.children().removeClass("active");
    jQuery(tabId).addClass("active");

});

jQuery("#next_category").on('click',()=>{
    
    current_cateogry = jQuery(".stepper-wrapper .stepper-item.active");
    
    // get next category
    next_category = current_cateogry.next();

    if (next_category.length == 0) {
        console.log("End of categories...", "display result");
        return;
    }

    // change class of all previous and next siblings
    next_category.prevAll().addClass("completed");
    next_category.nextAll().removeClass("completed");

    // change "active" class of all prev and next siblings
    next_category.prevAll().removeClass("active");
    next_category.nextAll().removeClass("active");

    next_category.addClass("active");
    next_category.removeClass("completed");

    // find next_category tabId
    nextId = next_category.children()[0].hash;
    
    // get tabs containers
    container = jQuery(".tab-content");    

    // remove "active" class from all first child of container
    container.children().removeClass("active");
    jQuery(nextId).addClass("active");    
});

jQuery("#prev_category").on("click", () => {
    current_cateogry = jQuery(".stepper-wrapper .stepper-item.active");

    // get prev category
    prev_category = current_cateogry.prev();
    
    if (prev_category.length == 0) {
        console.log("This is the first category");
        return;
    }

    // change class of all previous and next siblings
    prev_category.prevAll().addClass("completed");
    prev_category.nextAll().removeClass("completed");

    // change "active" class of all prev and next siblings
    prev_category.prevAll().removeClass("active");
    prev_category.nextAll().removeClass("active");

    prev_category.addClass("active");
    prev_category.removeClass("completed");

    // find prev_category tabId
    prevId = prev_category.children()[0].hash;

    // get tabs containers
    container = jQuery(".tab-content");    

    // remove "active" class from all first child of container
    container.children().removeClass("active");
    jQuery(prevId).addClass("active");

});