@if(Session::has('welcome'))
    @script(jquery-confirm/jquery-confirm.js)
    @style(jquery-confirm/jquery-confirm.css)
    @push('scripts')
        <script>
            $(function () {
                $.alert({
                    buttons: {
                        ok: {
                            btnClass: 'btn-primary',
                            text: 'باشه'
                        }
                    },
                    icon: 'fa fa-check-circle text-success',
                    title: 'خوش آمدید',
                    content: '{!! Session::get("welcome") !!}'
                });
            });
        </script>
    @endpush
@endif