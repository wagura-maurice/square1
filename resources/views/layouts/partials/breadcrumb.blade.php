<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>{!! ucwords($data->page_title) !!}</h3>
        <p class="text-subtitle text-muted">{!! ucwords($data->page_description) !!}</p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!! route('home') !!}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! ucwords($data->page_route_name) !!}</li>
            </ol>
        </nav>
    </div>
</div>