<!DOCTYPE html>
<html>
<head>
    <title>Confirm Delete</title>
    <script>
        function confirmDelete() {
            var confirmed = confirm("Are you sure you want to delete this client?");

            if (confirmed) {
                // Redirect to the delete route
                window.location.href = "{{ route('delete.client', $data->id) }}";
            } else {
                // Redirect back
                window.location.href = "{{ route('back') }}";
            }
        }
    </script>
</head>
<body>
    <h4>Confirm Delete</h4>
    <p>Are you sure you want to delete this client?</p>
    <button onclick="confirmDelete()">Delete</button>
    <button onclick="window.location.href = '{{ route('back') }}'">Cancel</button>
</body>
</html>
