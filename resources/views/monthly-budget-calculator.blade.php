@includeIf('/includes/head')
@includeIf('/includes/preloader')
@includeIf('/includes/wrapper_main_start')
@includeIf('/includes/nav_header')
@includeIf('/includes/chat_box')
@includeIf('/includes/header')
@includeIf('/includes/sidebar')

<div class="content-body">
    <div class="container-fluid">

        <!-- The header part -->
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h1>{{$title}}</h1>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="/">Home</a></li>    
                </ol>
            </div>
        </div>   


        <div class="stepper-wrapper nav nav-pills">
        @foreach ($categories as $index => $category)        
            <div 
            @if ($loop->first) class="stepper-item active" 
            @else class="stepper-item"    
            @endif >
            <a href="#{{$category['type']}}" onclick="javascript:void(0)" data-name="{{$category['name']}}">
                <div class="step-counter">{{$index + 1}}</div>
            </a>
            </div>
        @endforeach
        </div>    
        <div class="row">  
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="tab-content">
                        @foreach ($categories as $category) 
                            <div id="{{$category['type']}}" 
                            @if ($loop->first) class="tab-pane active"
                            @else class="tab-pane" @endif
                            >
                                <div class="card-header">
                                    <h4 class="card-title">{{$category['name']}}</h4>
                                </div>                            
                                <div class="card-body">
                                    @foreach($category['sub_categories'] as $sub_category)
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{$sub_category['name']}}</span>                                        
                                    </div>
                                        <input type="number" class="form-control" name="{{$sub_category['slug']}}" id="{{$sub_category['slug']}}" data-type="{{$sub_category['type']}}">
                                    </div>
                                    @endforeach                                                                       
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button id="next_category" type="button"  class="btn btn-dark ml-2 float-right">Next</button>
                        <button id="prev_category" type="button" class="btn btn-primary mr-2 float-right">Previous</button>
                    </div>
                </div>
            </div>        
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="category_pie_chart" style="position: relative; width:100hw"></canvas>
                    </div>
                </div>
            </div>
        </div>    
    
    </div>
<div>
    

@includeIf('/includes/wrapper_main_end')
@includeIf('/includes/foot')