@extends('layouts.app')

@push('styles')
<!-- styles -->
@endpush

@section('content')
<!-- content -->
<!-- React root DOM -->
<div id="home-component" data-user_id="{!! auth()->user()->id !!}" data-action_url="{!! route('posts.store') !!}"></div>
@endsection

@push('scripts')
<script type="text/javascript">
    // scripts
</script>
@endpush