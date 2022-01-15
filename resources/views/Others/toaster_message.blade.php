@if (session()->has('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            // notify('{{ session()->get('success') }}','success');
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ Session::get('success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        });
    </script>

@endif
@if (session()->has('messege'))
    @if (session()->has('type'))
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                position: 'center',
                icon: session()->has('type'),
                title: '{{ Session::get('messege') }}',
                showConfirmButton: false,
                timer: 1500
            })
        });
    </script>
    @endif
@endif

@if (session()->has('danger'))
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                position: 'top-end',
                icon: danger,
                title: '{{ Session::get('danger') }}',
                showConfirmButton: false,
                timer: 1500
            })
        });
    </script>
@endif

@if (session()->has('loginValidationError'))
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: '{{ Session::get('loginValidationError') }}',
                showConfirmButton: true,
                // timer: 1500
            })
        });
    </script>
@endif

@if ($errors->any())
    <script type="text/javascript">
        $(document).ready(function() {
            var errors = <?php echo json_encode($errors->all()); ?>;
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: errors,
                showConfirmButton: false,
                timer: 1500
            })
        });
    </script>
@endif
