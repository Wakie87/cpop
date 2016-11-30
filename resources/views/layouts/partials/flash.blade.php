@if(session('flash_notification.message'))
<script>
    @if(session('flash_notification.overlay'))
        swal({
            title: "{!! session('flash_notification.title') !!}",
            text: "{!! session('flash_notification.message') !!}",
            type: "{!! session('flash_notification.level') == 'danger' ? 'error' : session('flash_notification.level') !!}",
            confirmButtonText: 'Okay'
        });
    @else
        swal({
            title: "{!! session('flash_notification.title') !!}",
            text: "{!! session('flash_notification.message') !!}",
            type: "{!! session('flash_notification.level') == 'danger' ? 'error' : session('flash_notification.level') !!}",
            confirmButtonText: 'Okay'
        });
    @endif
</script>
@endif

@if(count($errors->all()) > 0)
    <script>
        swal({
            title: "Whoops!",
            text: "Please check your form entries.",
            type: "error",
            confirmButtonText: 'Okay!'
        });
    </script>
@endif