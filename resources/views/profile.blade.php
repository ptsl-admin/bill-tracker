@includeIf('/includes/head')
@includeIf('/includes/preloader')
@includeIf('/includes/wrapper_main_start')
@includeIf('/includes/nav_header')
@includeIf('/includes/chat_box')
@includeIf('/includes/header')
@includeIf('/includes/sidebar')

<div class="content-body">
    <div class="container-fluid">
        <h1>Welcome, {{$user['first_name']}} {{$user['last_name']}}</h1>
        <p>Your publications are:</p>        
        <ul>
            @foreach ($user['books'] as $item)
            <li>{{$item}}</li>   
            @endforeach
        </ul>                
    </div>
<div>

</div>
@includeIf('/includes/wrapper_main_end')
@includeIf('/includes/foot')