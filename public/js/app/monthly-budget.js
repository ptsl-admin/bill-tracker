category = [];
pie_data = {};
pie_data['labels'] = [];
pie_data['values'] = [];

jQuery(document).ready(()=>{        
    jQuery(".stepper-wrapper > .stepper-item > a").each(function(index){
        href = jQuery(this);

        cat_key = href[0].hash;
        cat_key = cat_key.replace("#","");
        cat_name = href[0].dataset.name;
        category[cat_key] = {'name':cat_name, 'total': 0};

        // extract labels for pie chart
        pie_data['labels'].push(cat_name);
        pie_data['values'].push(0); // default value is zero
    });    

    // initialize pie chart
    var chart = new Chart(document.getElementById("category_pie_chart"), {
        type: 'pie',
        data: {
            labels: pie_data['labels'],
            datasets: [{
            label: "Population (millions)",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#ff00ff"],
            data: pie_data['values']
            }]
        },
        options: {
            legend: {
                position: 'left',
                align: 'center'
            },         
            title: {
                display: true,
                text: 'Monthly Budget Estimates'
            }
        }
    }); 
    
    
        
    
    /* Detect change on input */
    jQuery(".tab-content input[type=number]").on('change', function(e){
        data_type = e.target.dataset.type;
        if (data_type in category){                                    
            new_value = Number(e.target.value);
            // get previous content of the category
            cat_content = category[data_type]; 

            // get id of the input field 
            id = e.target.id;            
            
            // update corresponding input field value for the give data_type (category)
            cat_content[id] = new_value; 

            // update total for each category            
            total = 0;
            for (const [key, value] of Object.entries(cat_content)) {
                if (!(key == "name" || key == "total")){
                    total = total + value;
                }                
            }

            // update total key
            cat_content["total"] = total;

            // Finally update category
            category[data_type] = cat_content ;                       

            // trigger pie chart update
            new_data = [];
            new_labels = [];
            for (const [key, value] of Object.entries(category)) {
                new_data.push(value.total);
                if (value.total>0) {
                    new_labels.push(value.name + '( '+ value.total.toString() + ' )');
                }else{
                    new_labels.push(value.name);
                }
            }
            chart.data.datasets[0].data = new_data;
            chart.data.labels = new_labels;
            chart.update();
        }
        

    });    
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